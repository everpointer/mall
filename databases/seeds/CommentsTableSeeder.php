<?php

/**
 * Antvel - Seeder
 * Comments Table.
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */
use Faker\Factory as Faker;
use Notadd\Shop\Models\Comment;
use Illuminate\Database\Seeder;
use Notadd\Member\Models\Member;
use Notadd\Shop\Models\ActionType;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker   = Faker::create();
        $actions = ActionType::get();
        $users   = Member::select('id')->get();
        // Category
        foreach (range(1, 20) as $void) {
            Comment::create([
                'user_id'        => $users->random(1)->first()->id,
                'action_type_id' => $actions->random(1)->first()->id,
                'source_id'      => $faker->numberBetween(50, 1000000),
                'comment'        => $faker->text(50),
            ]);
        }
    }
}
