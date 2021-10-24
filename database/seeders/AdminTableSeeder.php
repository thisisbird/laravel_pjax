<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Role;
use App\Models\Backend\Permissions;
class AdminTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Role::create(['name'=>'預設','discription'=>'預設','id'=>1]);
        Permissions::create(['role_id'=>1,'permissions_id'=>11]);
        Permissions::create(['role_id'=>1,'permissions_id'=>12]);
        Permissions::create(['role_id'=>1,'permissions_id'=>13]);
    }
}
