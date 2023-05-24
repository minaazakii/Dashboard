<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            //Users Permisssion
            ['name'=>'User_Index','display_name'=>'User Index','category'=>'user','description'=>''],
            ['name'=>'User_update','display_name'=>'User Update','category'=>'user','description'=>''],
            ['name'=>'User_show','display_name'=>'User Show','category'=>'user','description'=>''],
            ['name'=>'User_delete','display_name'=>'User Delete','category'=>'user','description'=>''],
        ];

        foreach($permissions as $permission)
        {
            Permission::firstOrCreate(
                ['name'=>$permission['name']],
                [
                    'name'=>$permission['name'],
                    'display_name'=>$permission['display_name'],
                    'category'=>$permission['category'],
                    'description'=>$permission['description']
                ]);
        }

        $allPermissions = Permission::all();
        $admin = Role::first();
        $admin->syncPermissions($allPermissions);
    }
}
