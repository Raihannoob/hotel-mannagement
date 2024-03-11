<?php

namespace App\Http\Controllers;
use App\Models\Rooom;
use App\Models\RoomBookingDetail;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //showing room details to frontend
public function room_details($id){
    $room = Rooom::find($id);
    return view('home.room_details',compact('room'));
}

public function add_booking(Request $request)
{
    // Ensure that the end date is greater than the start date
    $request->validate([
        'startDate' => 'required|date',
        'endDate' => 'required|date|after:startDate',
    ]);

    $data = new RoomBookingDetail();
    $id = $request->id;
    $data->room_id = $request->roomid;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;

    $start_Date = $request->startDate;
    $end_Date = $request->endDate;

    // Check if the room is already booked for the selected dates
    $isBooked = RoomBookingDetail::where('room_id',$request->roomid)
        ->where('startDate', '<=', $end_Date)
        ->where('endDate', '>=', $start_Date)
        ->exists();

    if ($isBooked) {
        return redirect()->back()->with('message', 'The room is already booked. Please select another date.');
    } else {
        $data->startDate = $start_Date;
        $data->endDate = $end_Date;
        $data->save();
        return redirect()->back()->with('message', 'Room Booked Successfully');
    }
}




}
