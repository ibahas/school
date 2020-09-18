<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class rolesseeder  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [

            ['id' => 1, 'title_en' => 'Administrator', 'title_ar' => 'مدير'],
            ['id' => 2, 'title_en' => 'Admin', 'title_ar' => 'مشرف'],
            ['id' => 3, 'title_en' => 'Teacher', 'title_ar' => 'معلم'],
            ['id' => 4, 'title_en' => 'Parents', 'title_ar' => 'أب'],

        ];

        foreach ($roles as $item) {
            \App\models\roles::create($item);
        }

        $users = [
            ['id'=> 11, 'name' => 'Administrator','email'=>'admin1@admin.com','role' =>'1','bod'=>'1971-10-31','photo'=>'','address'=>'GAZA','phone'=>'0599999999','email_verified_at'=> now(),'password'=>'$2y$10$sE2HaNSL1lHmIWZp2bt7ee.tAsPY5/99I0gQiHi.j4Z5LhS0WqxL2','remember_token' => Str::random(10)],
            ['id'=> 12, 'name' => 'Admin','email'=>'admin@admin.com','role' =>'2','bod'=>'1971-10-31','photo'=>'','address'=>'GAZA','phone'=>'0599999999','email_verified_at'=> now(),'password'=>'$2y$10$sE2HaNSL1lHmIWZp2bt7ee.tAsPY5/99I0gQiHi.j4Z5LhS0WqxL2','remember_token' => Str::random(10)],
            ['id'=> 13, 'name' => 'Moh','email'=>'moh@moh.com','role' =>'3','bod'=>'1971-10-31','photo'=>'','address'=>'GAZA','phone'=>'0599999999','email_verified_at'=> now(),'password'=>'$2y$10$sE2HaNSL1lHmIWZp2bt7ee.tAsPY5/99I0gQiHi.j4Z5LhS0WqxL2','remember_token' => Str::random(10)],
            ['id'=> 14, 'name' => 'Parent','email'=>'par@par.com','role' =>'4','bod'=>'1971-10-31','photo'=>'','address'=>'GAZA','phone'=>'0599999999','email_verified_at'=> now(),'password'=>'$2y$10$sE2HaNSL1lHmIWZp2bt7ee.tAsPY5/99I0gQiHi.j4Z5LhS0WqxL2','remember_token' => Str::random(10)],
        
        ];


        factory(\App\User::class, 10)->create();
        factory(\App\stafftime::class, 10)->create();
        factory(\App\students::class, 10)->create();
        factory(\App\programs::class, 10)->create();
        factory(\App\dateworkprograms::class, 10)->create();
        factory(\App\presencestudents::class, 10)->create();
        factory(\App\presenceusers::class, 10)->create();
        factory(\App\courses::class, 10)->create();
        factory(\App\coursestudents::class, 10)->create();
        factory(\App\presencecourses::class, 10)->create();
        factory(\App\coursetesting::class, 10)->create();
        factory(\App\TeacherStudents::class, 10)->create();

        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}
