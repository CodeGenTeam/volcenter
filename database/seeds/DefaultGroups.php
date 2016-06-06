<?php

use Illuminate\Database\Seeder;
use App\Permissions\Models\Group;

class DefaultGroups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['guest','user','moder','admin'];
        foreach ($groups as $group) {
            Group::where('name', $group)->firstOrCreate(['name'=>$group]);
        }
        $rules = Pex::groupRules('admin');
        $rules->addRule('*');
    }
}
