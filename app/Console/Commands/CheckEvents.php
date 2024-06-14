<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Activity;

//carbon
use Illuminate\Support\Carbon;

class CheckEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check events that are not scheduled';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        list($date, $time) = explode(' ', $now);
        $this->info( $date );
        $this->info( $time );
        $events = Activity::where('date', '<', $date)->orWhere('date', '=', $date)->get();
        foreach ($events as $event) {
            $completed =false;
            if($event->date == $date){
                if($event->hour > $time){
                    $this->info('Event ' . $event->name . ' is not today.');
                   
                }else{
                    $this->info('Event ' . $event->name . ' is today.');
                    $completed = true;
                }
            }else{
                $completed = true;
            }

            if($completed){
                $event->status_activities_id = 2;
                $event->save();
            }else{
                $this->info('Event ' . $event->name . ' is scheduled.');
            }

            // Perform the necessary actions for past events
            // For example, mark the event as completed or notify users
            //$event->status_events_id = 2;
            //$event->save();

        }

        //return 0;
        $this->info('All events have been checked.');
    }
}
