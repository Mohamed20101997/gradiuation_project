<?php

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Student;
use App\Models\Semester;
use App\Models\College;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'password' => bcrypt('112233'),
        ]);

        Doctor::create([
            'name' => 'Doctor',
            'email' =>'doctor@doctor.com',
            'password' => bcrypt('112233'),
        ]);


        $colleges = ['Information Technology','Engineering','pharmacy','Dentistry','Commerce'];

        foreach ($colleges as $college){
            College::create([
                'name' => $college,
            ]);
        }

       Student::create([
            'name' => 'Student',
            'email' =>'student@student.com',
            'password' => bcrypt('112233'),
           'college_id' => 1
        ]);


       $terms = ['First Term', 'Second Term', 'Summer Term', 'Mid Term'];

       foreach ($terms as $term){
           Semester::create([
               'name' => $term,
           ]);
       }



    }
}
