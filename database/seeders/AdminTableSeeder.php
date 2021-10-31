<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Role;
use App\Models\Backend\Permissions;
use App\Models\Backend\User;

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
        User::create(['name'=>'管理者','account'=>'admin','password'=>bcrypt(123456),'email'=>'thisisbirdhead@gmail.com','role_id'=>0]);

        Role::create(['name'=>'預設','discription'=>'預設','id'=>1]);
        Permissions::create(['role_id'=>1,'permissions_id'=>11]);
        Permissions::create(['role_id'=>1,'permissions_id'=>12]);
        Permissions::create(['role_id'=>1,'permissions_id'=>13]);
    }
}
