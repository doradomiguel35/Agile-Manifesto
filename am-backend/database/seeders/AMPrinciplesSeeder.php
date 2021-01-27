<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AMPrinciplesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('am_principles')->updateOrInsert([
            'id' => 1,
            'principle' => "Customer satisfaction through early and continuous software delivery"
        ]);
        
        DB::table('am_principles')->updateOrInsert([
            'id' => 2,
            'principle' => "Accommodate changing requirements throughout the development process"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 3,
            'principle' => "Frequent delivery of working software"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 4,
            'principle' => "Collaboration between the business stakeholders and developers throughout the project"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 5,
            'principle' => "Support, trust, and motivate the people involved"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 6,
            'principle' => "Enable face-to-face interactions "
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 7,
            'principle' => "Working software is the primary measure of progress"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 8,
            'principle' => "Agile processes to support a consistent development pace"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 9,
            'principle' => "Attention to technical detail and design enhances agility"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 10,
            'principle' => "Simplicity"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 11,
            'principle' => "Self-organizing teams encourage great architectures, requirements, and designs"
        ]);

        DB::table('am_principles')->updateOrInsert([
            'id' => 12,
            'principle' => "Regular reflections on how to become more effective"
        ]);

    }
}
