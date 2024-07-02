<?php

namespace Database\Factories;

use App\Models\Bot;
use App\Models\Client;
use App\Models\LogType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $logTypes = LogType::all();
        $bots = Bot::all();
        $clients = Client::all();

        return [
            'bot_id' => $bots->random()->id,
            'client_id' => $clients->random()->id,
            'log_type_id' => $logTypes->random()->id,
            'text' => $this->faker->text(150),
            'note' => $this->faker->text(100),
        ];
    }
}
