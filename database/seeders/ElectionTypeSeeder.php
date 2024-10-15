<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('election_types')->insert([
            ['name' => 'Provinciaal', 'description' => 'Provincial elections'],
            ['name' => 'Tweede Kamer', 'description' => 'National parliamentary elections'],
            ['name' => 'Waterschap', 'description' => 'Water management elections'],
            ['name' => 'Gemeente', 'description' => 'Municipal elections'],
            ['name' => 'Referendum', 'description' => 'Referendum on specific issues'],
        ]);
    }
}
