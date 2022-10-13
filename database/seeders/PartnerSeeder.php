<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'name' => 'Acme',
            'address' => 'K.Valdemāra iela 110 Riga, LV-1464'
        ]);

        Partner::create([
            'name' => 'Blackwater Worldwide',
            'address' => '4509 Goldleaf Lane Union City 07087'
        ]);

        Partner::create([
            'name' => 'Japan Asia Airways',
            'address' => '4671 Colony Street Connecticut 06901'
        ]);
    }
}
