<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Events;

class EventController extends Controller
{
    public function get(){
        $events =  Events::get(['title', 'date']);
        return response()->json($events);
    }

    public function store(Request $request){
        $from = Carbon::parse($request->from)->format('Y-m-d');
        $to = Carbon::parse($request->to)->format('Y-m-d');
        $all_dates = $this->get_dates_between_two_dates($from, $to);

        foreach ($all_dates as $date) {
            $find = Events::where('date', $date);
            $check = $find->exists();
            $day = Carbon::parse($date)->format('D');

            if ($check) {
                if (in_array($day, $request->days)) {
                    $find->update(['title' => $request->title]);
                }else{
                    $find->delete();
                }
                continue;
            }// if date exists update event name

            if (!in_array($day, $request->days)) {
                continue;
            }

            Events::create([
                'title' => $request->title,
                'date' => $date,
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => 'Event successfully saved'
        ], 200);
    }

    public function get_dates_between_two_dates($date_start, $date_end){
        $result = [];
        $date_from = strtotime($date_start); // Convert date to a UNIX timestamp
        $date_to = strtotime($date_end); // Convert date to a UNIX timestamp
    
        // Loop from the start date to end date and output all dates inbetween
        for ($i=$date_from; $i<=$date_to; $i+=86400) {
            $result[] = date("Y-m-d", $i);
        }
        return $result;
    }
}
