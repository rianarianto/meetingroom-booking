<?php

namespace Database\Seeders;

use App\Models\JenisRuangan;
use Illuminate\Database\Seeder;

class JenisRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisRuangan::create(['jenisRuangan' => 'Meeting Room']);
        JenisRuangan::create(['jenisRuangan' => 'Paintree Room']);
    }
}
