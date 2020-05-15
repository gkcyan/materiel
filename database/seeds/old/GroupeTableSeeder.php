<?php

use Illuminate\Database\Seeder;
use App\Groupe;

class GroupeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Groupe::truncate();
        Groupe::create(['name' => 'directeur']);
        Groupe::create(['name' => 'cardre']);
        Groupe::create(['name' => 'stagiaire']);
    }
}
