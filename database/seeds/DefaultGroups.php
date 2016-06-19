<?php

use Illuminate\Database\Seeder;
use App\Permissions\Models\Permission_group;

class DefaultGroups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['guest','user','moderator','admin'];
        foreach ($groups as $group) {
            Permission_group::where('name', $group)->firstOrCreate(['name'=>$group]);
        }
        $rules = Pex::groupRules('admin');
        $rules->addRule('*');
    }
}
