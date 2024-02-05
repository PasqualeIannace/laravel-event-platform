<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event1 = Event::find(1);
        $event2 = Event::find(2);
        $event3 = Event::find(3);
        $event4 = Event::find(4);
        $event5 = Event::find(5);
        $event1->tags()->attach([1, 3, 4]);
        $event2->tags()->attach([2, 3, 6]);
        $event3->tags()->attach([3, 4, 5]);
        $event4->tags()->attach([1, 2, 3]);
        $event5->tags()->attach([1, 3, 4, 5, 6]);
    }
}
