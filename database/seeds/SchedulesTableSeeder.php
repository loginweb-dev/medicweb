<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('schedules')->delete();

        \DB::table('schedules')->insert(array (
            0 =>
            array (
                'id' => 1,
                'day' => 1,
                'start' => '08:00:00',
                'end' => '10:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:11:49',
                'updated_at' => '2020-09-23 15:11:49',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'day' => 1,
                'start' => '10:00:00',
                'end' => '12:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:23',
                'updated_at' => '2020-09-23 15:12:23',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'day' => 1,
                'start' => '12:00:00',
                'end' => '14:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:49',
                'updated_at' => '2020-09-23 15:12:49',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'day' => 1,
                'start' => '14:00:00',
                'end' => '16:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:02',
                'updated_at' => '2020-09-23 15:13:02',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'day' => 1,
                'start' => '16:00:00',
                'end' => '18:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:18',
                'updated_at' => '2020-09-23 15:13:18',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'day' => 1,
                'start' => '18:00:00',
                'end' => '20:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:47',
                'updated_at' => '2020-09-23 15:13:47',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'day' => 1,
                'start' => '20:00:00',
                'end' => '22:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:14:58',
                'updated_at' => '2020-09-23 15:14:58',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'day' => 1,
                'start' => '22:00:00',
                'end' => '23:59:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:15:30',
                'updated_at' => '2020-09-23 15:15:30',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'day' => 2,
                'start' => '08:00:00',
                'end' => '10:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:11:49',
                'updated_at' => '2020-09-23 15:11:49',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'day' => 2,
                'start' => '10:00:00',
                'end' => '12:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:23',
                'updated_at' => '2020-09-23 15:12:23',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'day' => 2,
                'start' => '12:00:00',
                'end' => '14:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:49',
                'updated_at' => '2020-09-23 15:12:49',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'day' => 2,
                'start' => '14:00:00',
                'end' => '16:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:02',
                'updated_at' => '2020-09-23 15:13:02',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'day' => 2,
                'start' => '16:00:00',
                'end' => '18:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:18',
                'updated_at' => '2020-09-23 15:13:18',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'day' => 2,
                'start' => '18:00:00',
                'end' => '20:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:47',
                'updated_at' => '2020-09-23 15:13:47',
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'day' => 2,
                'start' => '20:00:00',
                'end' => '22:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:14:58',
                'updated_at' => '2020-09-23 15:14:58',
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'day' => 2,
                'start' => '22:00:00',
                'end' => '23:59:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:15:30',
                'updated_at' => '2020-09-23 15:15:30',
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'day' => 3,
                'start' => '08:00:00',
                'end' => '10:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:11:49',
                'updated_at' => '2020-09-23 15:11:49',
                'deleted_at' => NULL,
            ),
            17 =>
            array (
                'id' => 18,
                'day' => 3,
                'start' => '10:00:00',
                'end' => '12:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:23',
                'updated_at' => '2020-09-23 15:12:23',
                'deleted_at' => NULL,
            ),
            18 =>
            array (
                'id' => 19,
                'day' => 3,
                'start' => '12:00:00',
                'end' => '14:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:49',
                'updated_at' => '2020-09-23 15:12:49',
                'deleted_at' => NULL,
            ),
            19 =>
            array (
                'id' => 20,
                'day' => 3,
                'start' => '14:00:00',
                'end' => '16:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:02',
                'updated_at' => '2020-09-23 15:13:02',
                'deleted_at' => NULL,
            ),
            20 =>
            array (
                'id' => 21,
                'day' => 3,
                'start' => '16:00:00',
                'end' => '18:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:18',
                'updated_at' => '2020-09-23 15:13:18',
                'deleted_at' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'day' => 3,
                'start' => '18:00:00',
                'end' => '20:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:47',
                'updated_at' => '2020-09-23 15:13:47',
                'deleted_at' => NULL,
            ),
            22 =>
            array (
                'id' => 23,
                'day' => 3,
                'start' => '20:00:00',
                'end' => '22:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:14:58',
                'updated_at' => '2020-09-23 15:14:58',
                'deleted_at' => NULL,
            ),
            23 =>
            array (
                'id' => 24,
                'day' => 3,
                'start' => '22:00:00',
                'end' => '23:59:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:15:30',
                'updated_at' => '2020-09-23 15:15:30',
                'deleted_at' => NULL,
            ),
            24 =>
            array (
                'id' => 25,
                'day' => 4,
                'start' => '08:00:00',
                'end' => '10:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:11:49',
                'updated_at' => '2020-09-23 15:11:49',
                'deleted_at' => NULL,
            ),
            25 =>
            array (
                'id' => 26,
                'day' => 4,
                'start' => '10:00:00',
                'end' => '12:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:23',
                'updated_at' => '2020-09-23 15:12:23',
                'deleted_at' => NULL,
            ),
            26 =>
            array (
                'id' => 27,
                'day' => 4,
                'start' => '12:00:00',
                'end' => '14:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:49',
                'updated_at' => '2020-09-23 15:12:49',
                'deleted_at' => NULL,
            ),
            27 =>
            array (
                'id' => 28,
                'day' => 4,
                'start' => '14:00:00',
                'end' => '16:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:02',
                'updated_at' => '2020-09-23 15:13:02',
                'deleted_at' => NULL,
            ),
            28 =>
            array (
                'id' => 29,
                'day' => 4,
                'start' => '16:00:00',
                'end' => '18:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:18',
                'updated_at' => '2020-09-23 15:13:18',
                'deleted_at' => NULL,
            ),
            29 =>
            array (
                'id' => 30,
                'day' => 4,
                'start' => '18:00:00',
                'end' => '20:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:47',
                'updated_at' => '2020-09-23 15:13:47',
                'deleted_at' => NULL,
            ),
            30 =>
            array (
                'id' => 31,
                'day' => 4,
                'start' => '20:00:00',
                'end' => '22:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:14:58',
                'updated_at' => '2020-09-23 15:14:58',
                'deleted_at' => NULL,
            ),
            31 =>
            array (
                'id' => 32,
                'day' => 4,
                'start' => '22:00:00',
                'end' => '23:59:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:15:30',
                'updated_at' => '2020-09-23 15:15:30',
                'deleted_at' => NULL,
            ),
            32 =>
            array (
                'id' => 33,
                'day' => 5,
                'start' => '08:00:00',
                'end' => '10:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:11:49',
                'updated_at' => '2020-09-23 15:11:49',
                'deleted_at' => NULL,
            ),
            33 =>
            array (
                'id' => 34,
                'day' => 5,
                'start' => '10:00:00',
                'end' => '12:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:23',
                'updated_at' => '2020-09-23 15:12:23',
                'deleted_at' => NULL,
            ),
            34 =>
            array (
                'id' => 35,
                'day' => 5,
                'start' => '12:00:00',
                'end' => '14:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:49',
                'updated_at' => '2020-09-23 15:12:49',
                'deleted_at' => NULL,
            ),
            35 =>
            array (
                'id' => 36,
                'day' => 5,
                'start' => '14:00:00',
                'end' => '16:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:02',
                'updated_at' => '2020-09-23 15:13:02',
                'deleted_at' => NULL,
            ),
            36 =>
            array (
                'id' => 37,
                'day' => 5,
                'start' => '16:00:00',
                'end' => '18:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:18',
                'updated_at' => '2020-09-23 15:13:18',
                'deleted_at' => NULL,
            ),
            37 =>
            array (
                'id' => 38,
                'day' => 5,
                'start' => '18:00:00',
                'end' => '20:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:47',
                'updated_at' => '2020-09-23 15:13:47',
                'deleted_at' => NULL,
            ),
            38 =>
            array (
                'id' => 39,
                'day' => 1,
                'start' => '20:00:00',
                'end' => '22:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:14:58',
                'updated_at' => '2020-09-23 15:14:58',
                'deleted_at' => NULL,
            ),
            39 =>
            array (
                'id' => 40,
                'day' => 5,
                'start' => '22:00:00',
                'end' => '23:59:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:15:30',
                'updated_at' => '2020-09-23 15:15:30',
                'deleted_at' => NULL,
            ),
            40 =>
            array (
                'id' => 41,
                'day' => 6,
                'start' => '08:00:00',
                'end' => '10:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:11:49',
                'updated_at' => '2020-09-23 15:11:49',
                'deleted_at' => NULL,
            ),
            41 =>
            array (
                'id' => 42,
                'day' => 6,
                'start' => '10:00:00',
                'end' => '12:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:23',
                'updated_at' => '2020-09-23 15:12:23',
                'deleted_at' => NULL,
            ),
            42 =>
            array (
                'id' => 43,
                'day' => 6,
                'start' => '12:00:00',
                'end' => '14:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:49',
                'updated_at' => '2020-09-23 15:12:49',
                'deleted_at' => NULL,
            ),
            43 =>
            array (
                'id' => 44,
                'day' => 6,
                'start' => '14:00:00',
                'end' => '16:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:02',
                'updated_at' => '2020-09-23 15:13:02',
                'deleted_at' => NULL,
            ),
            44 =>
            array (
                'id' => 45,
                'day' => 6,
                'start' => '16:00:00',
                'end' => '18:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:18',
                'updated_at' => '2020-09-23 15:13:18',
                'deleted_at' => NULL,
            ),
            45 =>
            array (
                'id' => 46,
                'day' => 6,
                'start' => '18:00:00',
                'end' => '20:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:47',
                'updated_at' => '2020-09-23 15:13:47',
                'deleted_at' => NULL,
            ),
            46 =>
            array (
                'id' => 47,
                'day' => 6,
                'start' => '20:00:00',
                'end' => '22:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:14:58',
                'updated_at' => '2020-09-23 15:14:58',
                'deleted_at' => NULL,
            ),
            47 =>
            array (
                'id' => 48,
                'day' => 6,
                'start' => '22:00:00',
                'end' => '23:59:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:15:30',
                'updated_at' => '2020-09-23 15:15:30',
                'deleted_at' => NULL,
            ),
            48 =>
            array (
                'id' => 49,
                'day' => 7,
                'start' => '08:00:00',
                'end' => '10:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:11:49',
                'updated_at' => '2020-09-23 15:11:49',
                'deleted_at' => NULL,
            ),
            49 =>
            array (
                'id' => 50,
                'day' => 7,
                'start' => '10:00:00',
                'end' => '12:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:23',
                'updated_at' => '2020-09-23 15:12:23',
                'deleted_at' => NULL,
            ),
            50 =>
            array (
                'id' => 51,
                'day' => 7,
                'start' => '12:00:00',
                'end' => '14:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:12:49',
                'updated_at' => '2020-09-23 15:12:49',
                'deleted_at' => NULL,
            ),
            51 =>
            array (
                'id' => 52,
                'day' => 7,
                'start' => '14:00:00',
                'end' => '16:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:02',
                'updated_at' => '2020-09-23 15:13:02',
                'deleted_at' => NULL,
            ),
            52 =>
            array (
                'id' => 53,
                'day' => 7,
                'start' => '16:00:00',
                'end' => '18:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:18',
                'updated_at' => '2020-09-23 15:13:18',
                'deleted_at' => NULL,
            ),
            53 =>
            array (
                'id' => 54,
                'day' => 7,
                'start' => '18:00:00',
                'end' => '20:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:13:47',
                'updated_at' => '2020-09-23 15:13:47',
                'deleted_at' => NULL,
            ),
            54 =>
            array (
                'id' => 55,
                'day' => 7,
                'start' => '20:00:00',
                'end' => '22:00:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:14:58',
                'updated_at' => '2020-09-23 15:14:58',
                'deleted_at' => NULL,
            ),
            55 =>
            array (
                'id' => 56,
                'day' => 7,
                'start' => '22:00:00',
                'end' => '23:59:00',
                'status' => '1',
                'created_at' => '2020-09-23 15:15:30',
                'updated_at' => '2020-09-23 15:15:30',
                'deleted_at' => NULL,
            ),
        ));


    }
}
