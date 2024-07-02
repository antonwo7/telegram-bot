<?php

namespace Database\Seeders;

use App\Models\LogType;
use Illuminate\Database\Seeder;

class LogTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LogType::create([
            'name' => 'Действие',
            'number' => 0,
            'color' => 'success'
        ]);

        LogType::create([
            'name' => 'Ошибка',
            'number' => 1,
            'color' => 'danger'
        ]);

        LogType::create([
            'name' => 'Предупреждение',
            'number' => 2,
            'color' => 'warning'
        ]);

        LogType::create([
            'name' => 'Сообщение',
            'number' => 3,
            'color' => 'info'
        ]);
    }
}
