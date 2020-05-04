<?php

use Illuminate\Database\Seeder;

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
        factory(\App\User::class, 10)->create();
        factory(\App\students::class, 10)->create();
        factory(\App\programs::class, 10)->create();
        factory(\App\dateworkprograms::class, 10)->create();
        factory(\App\presencestudents::class, 10)->create();
        factory(\App\presenceusers::class, 10)->create();
        factory(\App\courses::class, 10)->create();
        factory(\App\coursestudents::class, 10)->create();
        factory(\App\presencecourses::class, 10)->create();
        factory(\App\coursetesting::class, 10)->create();
    }
}
