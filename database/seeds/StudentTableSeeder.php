<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use \Illuminate\Support\Facades\Hash;
    use App\model\Student;
    use \Carbon\Carbon;


    class StudentTableSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

            $student           = new Student();
            $student->mobile   = '09386721318';
            $student->password = Hash::make('123456789');
            $student->wallet   = 200000;
            $student->save();
        }

    }
