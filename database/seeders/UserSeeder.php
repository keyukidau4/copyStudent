<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 最初のデータを追加する
        $data = [
            [
                'name' => 'admin1',
                'age' => null,
                'image' => '',
                'course_id' => "",
                'address' => '',
                'phone' => '',
                'email' => 'admin1@gmail.com',
                'email_verified_at' => Carbon::now()->timezone('Asia/Tokyo'),
                'password' => bcrypt('123456789'),
                'is_admin' => 1,
            ],
            [
                'name' => 'user1',
                'age' => 27,
                'image' => '',
                'course_id' => "",
                'address' => '東京都千代田区',
                'phone' => '03088888888',
                'email' => 'user1@gmail.com',
                'email_verified_at' => Carbon::now()->timezone('Asia/Tokyo'),
                'password' => bcrypt('123456789'),
                'is_admin' => 0,
            ],
            [
                'name' => 'user2',
                'age' => 27,
                'image' => '',
                'course_id' => "",
                'address' => '東京都板橋区',
                'phone' => '07044444444',
                'email' => 'user2@gmail.com',
                'email_verified_at' => Carbon::now()->timezone('Asia/Tokyo'),
                'password' => bcrypt('123456789'),
                'is_admin' => 0,
            ],
            [
                'name' => 'user3',
                'age' => 25,
                'image' => '',
                'course_id' => "",
                'address' => '東京都文京区',
                'phone' => '09045165443',
                'email' => 'user3@gmail.com',
                'email_verified_at' => Carbon::now()->timezone('Asia/Tokyo'),
                'password' => bcrypt('123456789'),
                'is_admin' => 0,
            ],
            [
                'name' => 'user4',
                'age' => 22,
                'image' => '',
                'course_id' => "",
                'address' => '神奈川県川崎市',
                'phone' => '03078916547',
                'email' => 'user4@gmail.com',
                'email_verified_at' => Carbon::now()->timezone('Asia/Tokyo'),
                'password' => bcrypt('123456789'),
                'is_admin' => 0,
            ],
            [
                'name' => 'user5',
                'age' => 27,
                'image' => '',
                'course_id' => "",
                'address' => '東京都練馬区',
                'phone' => '08067894523',
                'email' => 'user5@gmail.com',
                'email_verified_at' => Carbon::now()->timezone('Asia/Tokyo'),
                'password' => bcrypt('123456789'),
                'is_admin' => 0,
            ]
        ];
        // usersテーブルにデータを保存する
        DB::table('users')->insert($data);

        $dataCourse = [
            [
                'name' => '英語',
                'at_room' => '3221',
                'description' => '英語の勉強',
                'student_count' => 0,
                'student_list' => "",
                'day_of_week' => '月曜日',
                'begin_time' => 9,
                'end_time' => 12,
            ], [
                'name' => '日本語',
                'at_room' => '4221',
                'description' => '日本語の勉強',
                'student_count' => 0,
                'student_list' => "",
                'day_of_week' => '水曜日',
                'begin_time' => 13,
                'end_time' => 15,
            ],[
                'name' => '数学',
                'at_room' => '5221',
                'description' => '数学の勉強',
                'student_count' => 0,
                'student_list' => "",
                'day_of_week' => '火曜日',
                'begin_time' => 15,
                'end_time' => 18,
            ],
            [
                'name' => '化学',
                'at_room' => '6221',
                'description' => '化学の勉強',
                'student_count' => 0,
                'student_list' => "",
                'day_of_week' => '木曜日',
                'begin_time' => 19,
                'end_time' => 22,
            ],
        ];
        DB::table('courses')->insert($dataCourse);
    }
}
