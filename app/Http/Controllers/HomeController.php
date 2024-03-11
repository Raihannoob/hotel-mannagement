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

public function add_booking(Request $request){
    //end date must me bigger then startdate
    $request->validate([
        'startDate' => 'required|date',
        'endDate'=>'date|after:startDate' ,
    ]);


    $data = new RoomBookingDetail();
    $data->room_id=$request->roomid;
    $data->name= $request->name;
    $data->email= $request->email;
    $data->phone= $request->phone;
    $data->startDate= $request->startDate;
    $data->endDate= $request->endDate;
    $data->save();
    return redirect()->back()->with('message','Room Booked Succesfully');
}



}
