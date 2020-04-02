<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'Visualizar telefones', 'created_at' => new Carbon(), 'updated_at' => new Carbon()],
            ['name' => 'Editar/Excluir telefones', 'created_at' => new Carbon(), 'updated_at' => new Carbon()],
            ['name' => 'Visualizar Log de Atividades (todos os usuários)', 'created_at' => new Carbon(), 'updated_at' => new Carbon()],
        ]);
    }
}
