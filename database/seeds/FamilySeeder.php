<?php

use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('family_description')->insert([
            'id' => 1,
            'title' => 'Frate',
        ]);
        DB::table('family_description')->insert([
            'id' => 2,
            'title' => 'Sora',
        ]);
        DB::table('family_description')->insert([
            'id' => 3,
            'title' => 'Mama',
        ]);
        DB::table('family_description')->insert([
            'id' => 4,
            'title' => 'Tata',
        ]);
        DB::table('family_description')->insert([
            'id' => 5,
            'title' => 'Fiu',
        ]);
        DB::table('family_description')->insert([
            'id' => 6,
            'title' => 'Fiica',
        ]);
        DB::table('family_description')->insert([
            'id' => 7,
            'title' => 'Bunic',
        ]);
        DB::table('family_description')->insert([
            'id' => 8,
            'title' => 'Bunica',
        ]);
        DB::table('family_description')->insert([
            'id' => 9,
            'title' => 'Unchi',
        ]);
        DB::table('family_description')->insert([
            'id' => 10,
            'title' => 'Matusa',
        ]);
        DB::table('family_description')->insert([
            'id' => 11,
            'title' => 'Nepot (din partea bunicilor)',
        ]);
        DB::table('family_description')->insert([
            'id' => 12,
            'title' => 'Nepoata (din partea bunicilor)',
        ]);
        DB::table('family_description')->insert([
            'id' => 13,
            'title' => 'Nepot (din partea unchilor/matusilor)',
        ]);
        DB::table('family_description')->insert([
            'id' => 14,
            'title' => 'Nepoata (din partea unchilor/matusilor)',
        ]);
        DB::table('family_description')->insert([
            'id' => 15,
            'title' => 'Sot',
        ]);
        DB::table('family_description')->insert([
            'id' => 16,
            'title' => 'Sotie',
        ]);
        DB::table('family_description')->insert([
            'id' => 17,
            'title' => 'Var',
        ]);
        DB::table('family_description')->insert([
            'id' => 18,
            'title' => 'Vara',
        ]);
    }
}
