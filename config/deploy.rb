require 'mina/git'

# Basic settings:
#   domain       - The hostname to SSH to.
#   deploy_to    - Path to deploy into.
#   repository   - Git repo to clone from. (needed by mina/git)
#   branch       - Branch name to deploy. (needed by mina/git)
set :term_mode, nil
set :domain, 'volcenter.ru'
set :deploy_to, '/www/volcenter'
set :repository, 'git@gitlab.com:team174/volcenter.git'
set :branch, 'master'

# They will be linked in the 'deploy:link_shared_paths' step.
set :shared_paths, ['.env', 'storage']

# Put any custom mkdir's in here for when `mina setup` is ran.
# For Rails apps, we'll make some of the shared paths that are shared between
# all releases.
task :setup => :environment do
  queue! %[mkdir -p "#{deploy_to}/#{shared_path}/storage/app"]
  queue! %[mkdir -p "#{deploy_to}/#{shared_path}/storage/framework"]
  queue! %[mkdir -p "#{deploy_to}/#{shared_path}/storage/logs"]
  queue! %[mkdir -p "#{deploy_to}/#{shared_path}/storage/framework/cache"]
  queue! %[mkdir -p "#{deploy_to}/#{shared_path}/storage/framework/sessions"]
  queue! %[mkdir -p "#{deploy_to}/#{shared_path}/storage/framework/views"]
  queue! %[chmod -R 0777 "#{deploy_to}/#{shared_path}/storage"]

  queue! %[touch "#{deploy_to}/#{shared_path}/.env"]
  queue  %[echo "-----> Be sure to edit '#{shared_path}/.env'"]
end

task :deploy => :environment do
  deploy do
    invoke :'git:clone'
    queue! "curl -s https://getcomposer.org/installer | php"
    invoke :'deploy:link_shared_paths'
	in_directory "#{deploy_to}" do
		queue "php artisan migrate --force"
	end
    #queue! "php artisan migrate --force"

    to :launch do
      invoke :clear_caches
      invoke :optimize
      invoke :restart
      invoke :'deploy:cleanup'
    end
  end
end

task :clear_caches do
  in_directory "#{deploy_to}" do
    queue! "php artisan cache:clear"
  end
end

task :optimize do
  in_directory "#{deploy_to}" do
    queue! "php artisan config:cache"
    queue! "php artisan route:cache"
    queue! "php artisan optimize --force"
  end
end

task :restart do
  queue! "service nginx reload"
end