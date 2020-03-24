<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@mail.com',
                'password'       => bcrypt('admin'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);

            User::create([
                'name'           => 'andresmauro17',
                'email'          => 'andresmauro17@hotmail.com',
                'password'       => bcrypt('thebest1'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);

            User::create([
                'name'           => 'aletop',
                'email'          => 'aletop@hotmail.com',
                'password'       => bcrypt('admin'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);

            User::create([
                'name'           => 'luzmarina',
                'email'          => 'luzmarina@mail.com',
                'password'       => bcrypt('admin'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);

        }
    }
}
