<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[

            'Primário',
            'Secundário',
            'Outros',
        ];

        foreach($data as $type){

            \App\Models\UserType::create([
                'types' => $type
            ]);

        }
    }
}
