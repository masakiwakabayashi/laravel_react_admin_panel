<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PointLog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PointLog>
 */
class PointLogFactory extends Factory
{
    protected $model = PointLog::class;

    public function definition()
    {
        $createdAt = fake()->dateTimeBetween('-3 months', 'now');
        // ランダムで0か1を返す
        $isObtainedPoint = fake()->boolean;
        $pointAndMoney = fake()->numberBetween(1, 900) * 100;
        return [
            'user_id' => User::factory(),
            'obtained_point' => $isObtainedPoint ? $pointAndMoney : null,
            'consumed_point' => $isObtainedPoint ? null : $pointAndMoney,
            'charged_money' => $isObtainedPoint ? $pointAndMoney : null,
            'platform' => $isObtainedPoint ? null : fake()->randomElement(['ゲーム1', 'ゲーム2', 'ゲーム3']),
            'consumed_point_purpose' => $isObtainedPoint ? null : fake()->randomElement(['アイテム1', 'アイテム2', 'アイテム3']),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
