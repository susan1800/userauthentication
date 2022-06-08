<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auth;
use App\Models\User;
class UserTableStatusSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auth = Auth::where('title' , 'admin')->get();


        User::create([
            'roll_no'    => '0',
            'phone' => '0',
            'name'      =>  'admin',
            'email'     =>  'admin@admin.com',
            'password'  =>  bcrypt('cosmos@miniproject'),
            'auth_id'    => $auth[0]->id,
        ]);




    }
}
