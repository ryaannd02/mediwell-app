<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DokterProfile;
use App\Models\Product;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Dokter ---
        $dokter = User::create([
            'name' => 'Dr. Andi',
            'email' => 'drandi@mail.com',
            'password' => Hash::make('123456'),
            'role' => 'dokter',
        ]);

        DokterProfile::create([
            'user_id'   => $dokter->id,
            'specialty' => 'Umum',
            'price'     => 50000,
            'schedule'  => 'Senin - Jumat 09:00 - 15:00',
        ]);

        // --- Toko ---
        $toko = User::create([
            'name' => 'Apotek Sehat',
            'email' => 'toko@mail.com',
            'password' => Hash::make('123456'),
            'role' => 'toko',
        ]);

        Product::create([
            'toko_user_id' => $toko->id,
            'name'  => 'Paracetamol',
            'price' => 15000,
            'stock' => 100,
        ]);

        Product::create([
            'toko_user_id' => $toko->id,
            'name'  => 'Vitamin C',
            'price' => 25000,
            'stock' => 50,
        ]);

        // --- Masyarakat ---
        User::create([
            'name' => 'Budi',
            'email' => 'budi@mail.com',
            'password' => Hash::make('123456'),
            'role' => 'masyarakat',
        ]);
    }
}