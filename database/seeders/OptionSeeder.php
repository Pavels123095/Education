<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\banner;
use App\Models\Option;
use App\Models\Main_menu;


class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $main_menu = Main_menu::create([
            'title' => 'Главная',
            'link' => '/',
            'level' => 1,
        ]);

        $main_menu = Main_menu::create([
            'title' => 'Статьи',
            'link' => '/articles',
            'level' => 1,
        ]);

        $main_menu = Main_menu::create([
            'title' => 'О нас',
            'link' => '/about',
            'level' => 1,
        ]);

        $banner = banner::create([
            'name' => 'Education Lang Story',
            'text' => 'Платформа для обучения английскому языку',
            'img' => '/images/slides/img1.jpg',
            'active' => 1,
        ]);

        $banner = banner::create([
            'name' => 'Обучение онлайн',
            'text' => 'Учись онлайн, в любое удобное тебе время',
            'img' => '/images/slides/img2.jpg',
            'active' => 1,
        ]);

        $banner = banner::create([
            'name' => 'Как индивидуально, так и в группе',
            'text' => 'Можно учиться как в одиночку, так и сплоченно в группе до 15 человек',
            'img' => '/images/slides/img3.jpg',
            'active' => 1,
        ]);
    }
}