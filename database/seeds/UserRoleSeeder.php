<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            ['name' => 'owner', 'created_at' => new Carbon(), 'updated_at' => new Carbon()],
            ['name' => 'user', 'created_at' => new Carbon(), 'updated_at' => new Carbon()]
        ]);
    }
}
