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
            ['name' => 'Landelijk', 'description' => 'Nationale parlementaire verkiezingen'],
            ['name' => 'Provinciaal', 'description' => 'Verkiezingen per provincie'],
            ['name' => 'Waterschap', 'description' => 'Beheer van wateren en dijken'],
            ['name' => 'Gemeentelijk', 'description' => 'Lokale gemeenteraadsverkiezingen'],
            ['name' => 'Referendum', 'description' => 'Stemming over specifieke kwestie'],
        ]);
    }
}
