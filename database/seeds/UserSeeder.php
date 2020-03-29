<?php

use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@privatecode.com',
            'password' => Hash::make('123456'),
            'user_role_id' => UserRole::OWNER,
            'group_id' => 1, 
            'created_at' => new Carbon(), 
            'updated_at' => new Carbon()
        ]);
    }
}
