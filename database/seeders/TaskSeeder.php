<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'title' => 'ゴミ出し',
                'body' => '燃えるゴミ'
            ],
            [
                'title' => '買い物',
                'body' => 'あれもこれも買える'
            ]
        ];

        DB::table('tasks')->insert($param);
    }
}
