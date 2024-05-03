<?php
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
  
class AdminUserSeeder extends Seeder
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function run()
    {
       /* Create an admin user */
       $user = User::create([
           'name' => 'Admin1',
           'email' => 'payusov.95@mail.ru',
           'password' => Hash::make('admins12309'),
       ]);
       
       $user->assignRole('admin');

       $user = User::create([
            'name' => 'Admin',
            'email' => 'milok_1994@mail.ru',
            'password' => Hash::make('admins12309'),
        ]);

        $user->assignRole('admin');
    }
}