<?php

use Illuminate\Database\Seeder;
use Notadd\Shop\Models\ActionType;

class ActionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActionType::createMany(trans('shop::globals.action_types'));
    }
}
