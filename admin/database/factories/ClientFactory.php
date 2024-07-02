<?php

namespace Database\Factories;

use App\Models\Bot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bots = Bot::all();

        return [
            'telegram_account' => $this->faker->regexify('[a-z0-9_]{10}'),
            'telegram_account_id' => $this->faker->regexify('[a-z0-9_]{10}'),
            'lang' => $this->faker->randomElement([ 'en', 'ru' ]),
            'bot_id' => $bots->random()->id
        ];
    }
}
