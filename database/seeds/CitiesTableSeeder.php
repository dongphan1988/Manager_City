<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new \App\City();
        $city->id = 1;
        $city->name = "hanoi";
        $city->save();

        $city = new \App\City();
        $city->name = "sai gon";
        $city->save();

        $city = new \App\City();
        $city->name = "da nang";
        $city->save();

        $city = new \App\City();
        $city->name = "quang binh";
        $city->save();

        $city = new \App\City();
        $city->name = "hai duong";
        $city->save();

        $city = new \App\City();
        $city->name = "thai binh";
        $city->save();

        $city = new \App\City();
        $city->name = "ninh binh";
        $city->save();
    }
}
