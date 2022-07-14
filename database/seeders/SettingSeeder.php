<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting\Setting::create([

            'title' => "Ghatailshop.com",
            'description' => "Our product is very good quality",
            'address' => "Maidher Chala Bazar, Ghatail, Tangail, Dhaka - 1980",
            'contract' => "01511100752",
            'contract2' => "01611100752",
            'email' => "info@ghatailshop.com",
            'link' => "www.ghatailshop.com",
        ]);
    }
}
