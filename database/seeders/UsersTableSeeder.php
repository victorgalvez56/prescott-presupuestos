<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ARLETTE RONDÓN',
            'email' => 'arondon@prescott.edu.pe',
            'password' => Hash::make('arondon'),
        ]);

        User::create([
            'name' => 'ANA IRENE TALAVERA',
            'email' => 'italavera@prescott.edu.pe',
            'password' => Hash::make('italavera'),
        ]);

        User::create([
            'name' => 'PATRICIA MEDINA',
            'email' => 'kmedina@prescott.edu.pe',
            'password' => Hash::make('kmedina'),
        ]);

        User::create([
            'name' => 'FLORITA SARMIENTO',
            'email' => 'fsarmiento@prescott.edu.pe',
            'password' => Hash::make('fsarmiento'),
        ]);

        User::create([
            'name' => 'ANDREA ZEGARRA',
            'email' => 'azegarra@prescott.edu.pe ',
            'password' => Hash::make('azegarra'),
        ]);

        User::create([
            'name' => 'SUSANA BUSTAMANTE',
            'email' => 'sbustamante@prescott.edu.pe',
            'password' => Hash::make('sbustamante'),
        ]);

        User::create([
            'name' => 'PAOLA ORTIZ',
            'email' => 'portizdezevallos@prescott.edu.pe',
            'password' => Hash::make('portizdezevallos'),
        ]);

        User::create([
            'name' => 'CARMEN GARCIA',
            'email' => 'cgarciacalderon@prescott.edu.pe',
            'password' => Hash::make('cgarciacalderon'),
        ]);

        User::create([
            'name' => 'VANIA LOPEZ',
            'email' => 'vlopez@prescott.edu.pe',
            'password' => Hash::make('vlopez'),
        ]);

        User::create([
            'name' => 'ANA PAOLA MOSCOSO',
            'email' => 'ana.moscosog@prescott.edu.pe',
            'password' => Hash::make('ana.moscosog'),
        ]);

        User::create([
            'name' => 'PAOLA CARDENAS',
            'email' => 'pcardenas@prescott.edu.pe',
            'password' => Hash::make('pcardenas'),
        ]);

        User::create([
            'name' => 'FERNANDO AZALGARA',
            'email' => 'fazalgara@prescott.edu.pe',
            'password' => Hash::make('fazalgara'),
        ]);

        User::create([
            'name' => 'JAVIER BUTRÓN',
            'email' => 'jbutron@prescott.edu.pe',
            'password' => Hash::make('jbutron'),
        ]);


    }
}
