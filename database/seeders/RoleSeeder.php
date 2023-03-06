<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'level' => '1',
                'name' => 'God',
            ],
            [
                'level' => '2',
                'name' => 'Admin',
            ],
            [
                'level' => '3',
                'name' => 'Moderator',
            ],
            [
                'level' => '4',
                'name' => 'Editor',
            ],
            [
                'level' => '5',
                'name' => 'Publisher',
            ],
            [
                'level' => '6',
                'name' => 'User',
            ],
        ];

        foreach ($roles as $roleName){
            $newRole = new Role();
            $newRole->level = $roleName['level'];
            $newRole->name = $roleName['name'];
            $newRole->save();
        }
    }
}
