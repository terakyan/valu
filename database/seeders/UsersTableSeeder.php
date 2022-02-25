<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'valu@gmail.com',
            'password' => bcrypt('valu1234'),
            'email_verified_at'=>date('Y-m-d H:i:s', now()->getTimestamp()),
        ]);
    }
}
