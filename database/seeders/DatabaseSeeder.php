<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artikel;
use App\Models\CertainFactor;
use App\Models\Identifikasi;
use App\Models\Keputusan;
use App\Models\KondisiUser;
use App\Models\TingkatPasal;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\New_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(3)->create();
        // Artikel::factory(4)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $keputusan = new Keputusan();
        $identifikasi = new Identifikasi();
        $pasal = new TingkatPasal();
        $kondisi = new KondisiUser();

        $artikel = new Artikel();

        Keputusan::insert($keputusan->fillTable());
        Identifikasi::insert($identifikasi->fillTable());
        TingkatPasal::insert($pasal->fillTable());
        KondisiUser::insert($kondisi->fillTable());
        Artikel::insert($artikel->fillTabel());
    }
}
