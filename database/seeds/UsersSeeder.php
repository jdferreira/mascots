<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $male = DB::table('genders')->where('name', '=', 'Male')->value('id');
        $portugal = DB::table('countries')->where('name', '=', 'Portugal')->value('id');
        $now = \Carbon\Carbon::now()->toDateTimeString();
        
        $user_id = DB::table('users')->insertGetId([
            'name'       => 'João D. Ferreira',
            'email'      => 'jotomicron@gmail.com',
            'password'   => bcrypt('test'),
            'gender_id'  => $male,
            'country_id' => $portugal,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        $admin_role_id = DB::table('roles')->insertGetId([
            'name' => 'Admin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        $user_role_id = DB::table('roles')->insertGetId([
            'name' => 'User',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        DB::table('roles_users')->insert([
            [
                'role_id' => $admin_role_id,
                'user_id' => $user_id,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'role_id' => $user_role_id,
                'user_id' => $user_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
