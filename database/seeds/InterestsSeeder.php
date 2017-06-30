<?php

use Illuminate\Database\Seeder;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        
        $admin_role_id = DB::table('roles')->where('name', '=', 'Admin')->value('id');
        $admin_user = DB::table('role_user')->where('role_id', '=', $admin_role_id)->value('id');
        
        $interests = include 'data/interests.php';
        foreach ($interests as &$interest) {
            $interest['created_at'] = $now;
            $interest['updated_at'] = $now;
            $interest['added_by'] = $admin_user;
        }
        
        DB::table('interests')->insert($interests);
    }
}
