<?php


use Illuminate\Database\Seeder;
use Faker\Provider\UserAgent;
use illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Hash;
use App\User;
use App\Groupe;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

       $directeur = User::Create([
            'name'=>'Sabeh',
            'email'=>'sabeh@gmail.com',
            'password'=>'admin2020',
        ]);
        $cardre = User::Create([
            'name'=>'Yannick',
            'email'=>'ygouede@gmail.com',
            'password'=>'admin2021',
        ]);
       
       $stagiaire = User::Create([
            'name'=>'Marc',
            'email'=>'marc@gmail.com',
            'password'=>'admin2022',
        ]);
            
        
        $directeurGroupe = Groupe::where('name','directeur')->first();
        $cardreGroupe = Groupe::where('name','cardre')->first();
        $stagiaireGroupe = Groupe::where('name','stagiaire')->first();


        $directeur->groupes()->attach($directeurGroupe);
        $cardre->groupes()->attach($cardreGroupe);
        $stagiaire->groupes()->attach($stagiaireGroupe);

    }
}
