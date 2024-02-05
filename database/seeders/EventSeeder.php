<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = config("events");

        foreach ($events as $event) {
            $new_event = new Event();

            $new_event->fill($event);
            $new_event->save();
        }
    }
}
