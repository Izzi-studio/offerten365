<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserAdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'=>'Admin',
                'lastname'=>'Admin',
                'email'=>'admin@admin.com',
                'role_id'=>0,
                'password'=>'$2y$10$tOhN3eLsUBX.oQeJk90Q6edtF.Ej7NmRU4rByVyl5EDjj1uJYixzG' //adminadmin

            ]
        ]);
    }
}
