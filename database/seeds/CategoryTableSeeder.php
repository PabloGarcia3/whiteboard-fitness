<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports_performance = new Category();
        $sports_performance->name = 'Sports Performance';
        $sports_performance->slug = 'sports-performance';
        $sports_performance->save();

        $crossfit = new Category();
        $crossfit->name = 'Crossfit';
        $crossfit->slug = 'crossfit';
        $crossfit->save();

        $bodybuilding = new Category();
        $bodybuilding->name = 'Bodybuilding';
        $bodybuilding->slug = 'bodybuilding';
        $bodybuilding->save();

        $powerlifting = new Category();
        $powerlifting->name = 'Powerlifting';
        $powerlifting->slug = 'powerlifting';
        $powerlifting->save();

        $hiit = new Category();
        $hiit->name = 'HIIT';
        $hiit->slug = 'hiit';
        $hiit->save();

        $speed_agility = new Category();
        $speed_agility->name = 'Speed & Agility';
        $speed_agility->slug = 'speed-agility';
        $speed_agility->save();

        $strongman = new Category();
        $strongman->name = 'Strongman';
        $strongman->slug = 'strongman';
        $strongman->save();

        $general = new Category();
        $general->name = 'General Fitness';
        $general->slug = 'general';
        $general->save();
    }
}
