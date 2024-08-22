<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $admin = User::create([
            'nama' => 'Yoas Hutapea',
            'nik' => '1212021711020002',
            'no_telp'=> '081373030589',
            'alamat' => 'Jln Tugu Raja Hutapea',
            'tempat_lahir' => 'Jakarta',
            'kk' => '1212021711020000',
            'password' => Hash::make('yoas12345'),
        ]);

        $admin->assignRole('admin');

        User::create([
            'nama' => 'Julianti Sitorus',
            'nik' => '1212021711020003',
            'no_telp'=> '081373030589',
            'alamat' => 'Jln Tugu Raja Hutapea',
            'tempat_lahir' => 'Jakarta',
            'password' => Hash::make('juli12345'),
        ]);

        User::create([
            'nama' => 'Rahel Sianipar',
            'nik' => '1212021711020004',
            'no_telp'=> '081373030589',
            'alamat' => 'Jln Tugu Raja Hutapea',
            'tempat_lahir' => 'Parapat',
            'password' => Hash::make('rahel12345'),
        ]);
    }
}
