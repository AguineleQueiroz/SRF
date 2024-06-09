<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[

            'Editar',
            'Deletar',
            'Visualizar',
        ];

        foreach($data as $permission){

            \App\Models\UserPermission::create([
                'permissions' => $permission
            ]);

        }
    }
}
