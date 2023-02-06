<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Guide;
use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Fasilitas::factory(10)->create();
        \App\Models\Guide::factory(10)->create();
        \App\Models\Itenerary::factory(10)->create();
        \App\Models\Kota::factory(10)->create();
        \App\Models\Pemesanan::factory(10)->create();
        \App\Models\Testi::factory(10)->create();
        \App\Models\Wisata::factory(10)->create();
        \App\Models\Supir::factory(10)->create();
        \App\Models\Kendaraan::factory(10)->create();
        \App\Models\Jemput::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
