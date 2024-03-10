<div  class="our_room">
    <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Our Room</h2>
                  <p>Lorem Ipsum available, but the majority have suffered </p>
               </div>
            </div>
         </div>
       <div class="row">
         @foreach($rooms as $room)
            <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                           <div class="room_img">
                              <figure><img style="height: 200px; width:350px;" src="\uploads\rooms\{{$room->image}}" alt="#"/></figure>
                           </div>
                           <div class="bed_room">
                              <h3>{{$room->room_tittle}}</h3>
                              {{-- limiting data  --}}
                              <p style="padding: 10px;">{!!Str::limit($room->description,50) !!} </p>
                              <a class="btn btn-primary" href="{{url('room_details',$room->id)}}">Room Details </a>
                           </div>
                  </div>
            </div>
         @endforeach   
       </div>
    </div>
 </div>