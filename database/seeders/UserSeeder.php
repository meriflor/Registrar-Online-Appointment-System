<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->firstName = 'Admin';
        $user->lastName = 'Admin';
        $user->middleName = '';
        $user->suffix = '';
        $user->address = 'Tubod Lanao del Norte';
        $user->school_id = '100949';
        $user->cell_no = '09357257056';
        $user->civil_status = 'Single';
        $user->email = 'admin@gmail.com';
        $user->birthdate = '2000-08-17';
        $user->status = 'Admin';
        $user->gender = 'Male';
        $user->course = '';
        $user->password = Hash::make('admin123');
        $user->acadYear = '2022-2023';
        $user->gradYear = '';
        $user->role = 1;
        $user->save();  

        $user = new User();
        $user->firstName = 'Olympio';
        $user->lastName = 'Sumbilon';
        $user->middleName = 'B';
        $user->suffix = 'Jr.';
        $user->address = 'Tubod Lanao del Norte';
        $user->school_id = '100949';
        $user->cell_no = '09357258656';
        $user->civil_status = 'Single';
        $user->email = 'olympio@gmail.com';
        $user->birthdate = '2000-08-17';
        $user->status = 'Undergraduate college';
        $user->gender = 'Male';
        $user->course = 'Bachelor of Science in Computer Science';
        $user->password = Hash::make('password123');
        $user->acadYear = '2022-2023';
        $user->gradYear = '';
        $user->role = 0;
        $user->save();  

        $user = new User();
        $user->firstName = 'Meriflor';
        $user->lastName = 'Gonoy';
        $user->middleName = 'N';
        $user->suffix = '';
        $user->address = 'Libertad Kolambugan Lanao del Norte';
        $user->school_id = '100950';
        $user->cell_no = '09357258681';
        $user->civil_status = 'Single';
        $user->email = 'meriflor@gmail.com';
        $user->birthdate = '2000-10-21';
        $user->status = 'Undergraduate college';
        $user->gender = 'Female';
        $user->course = 'Bachelor of Science in Hospitality Management';
        $user->password = Hash::make('password123');
        $user->acadYear = '2022-2023';
        $user->gradYear = '';
        $user->role = 0;
        $user->save();  

        $user = new User();
        $user->firstName = 'Bryan';
        $user->lastName = 'Ladion';
        $user->middleName = '';
        $user->suffix = '';
        $user->address = 'Kauswagan Lanao del Norte';
        $user->school_id = '100951';
        $user->cell_no = '09357258601';
        $user->civil_status = 'Single';
        $user->email = 'bryan@gmail.com';
        $user->birthdate = '2000-07-18';
        $user->status = 'Undergraduate college';
        $user->gender = 'Male';
        $user->course = 'Bachelor of Technology and Livelihood Education';
        $user->password = Hash::make('password123');
        $user->acadYear = '2022-2023';
        $user->gradYear = '';
        $user->role = 0;
        $user->save(); 
    }
}
