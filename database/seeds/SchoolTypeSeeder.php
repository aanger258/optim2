<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_types')->insert([
            'id' => '1',
            'title' => 'Scoala Primara (1-4)',
        ]);
        DB::table('school_types')->insert([
            'id' => '2',
            'title' => 'Scoala Gimnaziala (5-8)',
        ]);
        DB::table('school_types')->insert([
            'id' => '3',
            'title' => 'Scoala generala (1-8)',
        ]);
        DB::table('school_types')->insert([
            'id' => '4',
            'title' => 'Liceu (9-12)',
        ]);
        DB::table('school_types')->insert([
            'id' => '5',
            'title' => 'Colegiu (5-12)',
        ]);
        DB::table('school_types')->insert([
            'id' => '6',
            'title' => 'Colegiu (1-12)',
        ]);
        DB::table('school_types')->insert([
            'id' => '7',
            'title' => 'Facultate',
        ]);
    }
}
