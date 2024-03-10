<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Rooom;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
{
    if (Auth::id()) {
        $usertype = Auth()->user()->usertype;
        if ($usertype =='user') {
            $rooms = Rooom::all();
            return view('home.index',compact('rooms'));
        }
        elseif ($usertype =='admin') {
            return view('admin.index');
        } else {
            return redirect()->back();
        }
    }
}

public function home(){
    $rooms = Rooom::all();
    return view('home.index',compact('rooms'));
}

public function create_room(){
    return view('admin.create_room');
}

public function add_room(Request $request){
    $data = new Rooom();
    $data-> room_tittle = $request->tittle;
    $data-> description = $request->Description;
    $data-> price = $request->Price;
    $data-> room_type = $request->type;
    $data-> wifi = $request->wifi;
    $data-> image = $request->image;

   
     if($request->hasfile('image'))
     {
         $file = $request->file('image');
         $extenstion = $file->getClientOriginalExtension();
         $filename = time().'.'.$extenstion;
         $file->move('uploads/rooms/', $filename);
         $data->image = $filename;
     }

    $data->save();

   return redirect()->back();
}
//we use compact to pass data in the disired page 
public function view_room(){
    $data =Rooom::all();
    return view('admin.view_room',compact('data'));
}

//Delete functionality in table 
public function room_delete($id){
    $data =Rooom::find($id);
    $data->delete();
    return redirect()->back();
    
}


public function room_update($id){
    $data = Rooom::find($id);
    return view('admin.room_update',compact('data'));
    
}
//update function is here 
public function edit_room(Request $request,$id){
    $data = Rooom::find($id);
    $data-> room_tittle = $request->tittle;
    $data-> description = $request->Description;
    $data-> price = $request->Price;
    $data-> room_type = $request->type;
    $data-> wifi = $request->wifi;
    $data-> image = $request->image;

   
     if($request->hasfile('image'))
     {
         $file = $request->file('image');
         $extenstion = $file->getClientOriginalExtension();
         $filename = time().'.'.$extenstion;
         $file->move('uploads/rooms/', $filename);
         $data->image = $filename;
     }

    $data->save();

   return redirect()->back();
}



}
