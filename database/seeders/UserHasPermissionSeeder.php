<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [6, 3],
            [4, 1],
            [4, 2],
            [4, 3],
            [5, 1],
            [5, 2],
            [5, 3]
        ];

        foreach($data as $line){

            \App\Models\UserHasPermission::create([
                'user_type_id'=>$line[0], 'user_permission_id'=>$line[1]
            ]);

        }
    }
}
