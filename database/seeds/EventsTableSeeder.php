<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'My Chemical Romance: Reunion World Tour 2018',
            'picture_url' => '.',
            'location'=> 'SM MOA Arena',
            'description' => "The Reunion World Tour 2018 was a concert tour to support and celebrate My Chemical Romance's reunion. The tour featured 133 performances worldwide, as well as several festival and condensed shows.",
            'date_start' => '2018-05-27 21:51:39',
            'date_end' => '2018-05-27 21:51:39'
        ]);
    }
}
