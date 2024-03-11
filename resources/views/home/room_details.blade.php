<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    @include('home.css')
    <style>
        label{
            display: inline-block;
            width: 200px;
        }
        input{
            width: 100%;
        }
        
    </style>
   </head>
   
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      @include('home.header')
      
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
                <div class="col-md-8">
                      <div id="serv_hover"  class="room">
                               <div class="room_img">
                                  <figure><img style="height: 300px; width:800px; padding: 12px;" src="\uploads\rooms\{{$room->image}}" alt="#"/></figure>
                               </div>
                               <div class="bed_room">
                                  <h2>{{$room->room_tittle}}</h2>
                                  {{-- limiting data  --}}
                                  <p style="padding: 12px;">{{$room->description}}</p>
                                 <h4 style="padding: 12px;">Room Type: {{$room->room_type}} </h4>
                                 <h4 style="padding: 12px;">Wifi: {{$room->wifi}} </h4>
                                 <h4 style="padding: 12px;"><strong>Price:</strong> {{$room->price}}</h4>
                               </div>
                      </div>
                </div>  
                {{-- Booking Interface  --}}
                <div class="col-md-4">
                    <h1 style="font-size :40px!important;">Book Room</h1>
                   <!-- Display an alert if the session has a 'message' -->
                        <div>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                        

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>
                            @endforeach
                        @endif


                        <form action="{{route('add.booking')}}"  method="POST">
                            @csrf    
                            {{-- passing data to the route  --}}
                            <input type="hidden" name="roomid" value="{{$room->id}}" readonly>
                                <div>
                                    <label>Name</label>
                                    <input type="text" name="name" 
                                    @if(Auth::id())
                                    value="{{Auth::user()->name}}" 
                                    @endif required >
                                </div>

                                <div>
                                    <label>Email</label>
                                    <input type="email" name="email" 
                                    @if(Auth::id())
                                    value="{{Auth::user()->email}}"
                                    @endif required
                                    >
                                </div>

                                <div>
                                    <label>Phone</label>
                                    <input type="number" name="phone" @if(Auth::id())
                                    value="{{Auth::user()->phone}}"
                                    @endif required>
                                </div>

                                <div>
                                    <label>Start Date</label>
                                    <input type="date" name="startDate" id="startDate">
                                </div>

                                <div>
                                    <label>End Date</label>
                                    <input type="date" name="endDate" id="endDate">
                                </div>

                                <div style="padding-top: 20px;">
                                    <input type="submit" style="background-color: skyblue;" class="btn btn-primary" value="Book Room"/>
                                </div>
                        </form>        
                </div>

           </div>
        </div>
     </div>
      @include('home.footer')
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script type="text/javascript">
        // This code sets the minimum date for the 'startDate' and 'endDate' input fields
        // to today's date. It ensures that users cannot select a date earlier than today.
            $(function(){
                var dtToday = new Date();
            
                var month = dtToday.getMonth() + 1;

                var day = dtToday.getDate();

                var year = dtToday.getFullYear();

                if(month < 10)
                    month = '0' + month.toString();

                if(day < 10)
                day = '0' + day.toString();

                var maxDate = year + '-' + month + '-' + day;
                $('#startDate').attr('min', maxDate);
                $('#endDate').attr('min', maxDate);
            });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
   </body>
</html>