<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AMValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('am_values')->updateOrInsert([
            'id' => 1,
            'value' => "Individuals and Interactions Over Processes and Tools"
        ]);

        DB::table('am_values')->updateOrInsert([
            'id' => 2,
            'value' => "Working Software Over Comprehensive Documentation"
        ]);

        DB::table('am_values')->updateOrInsert([
            'id' => 3,
            'value' => "Customer Collaboration Over Contract Negotiation"
        ]);

        DB::table('am_values')->updateOrInsert([
            'id' => 4,
            'value' => "Responding to Change Over Following a Plan"
        ]);
    }
}
