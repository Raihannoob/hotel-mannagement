<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
      label{
        display: inline-block;
        width: 200px;

      }
      .div_design{
        padding-top:30px; 
      }
      .div_center{
        text-align: center;
        padding-top:40px; 
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.SidebarNavigation')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                  <div class="div_center">
                    <h1 style="font-size: 30px; font-weight:bold;">Update Rooms</h1>
                    <form action="{{url('edit_room',$data->id)}}" method="Post" enctype="multipart/form-data">
                      @csrf
                        <div class="div_design">
                          <label>Room Tittle  </label>
                          <input type="text" name="tittle" value="{{$data->room_tittle}}" >
                        </div>

                        <div class="div_design">
                          <label>Description</label>
                          <textarea name="Description" >{{$data->description}}</textarea>
                        </div>

                        <div class="div_design">
                          <label>Price </label>
                          <input type="number" name="Price" value="{{$data->price}}" >
                        </div>
                        <div class="div_design">
                          <label>Room Type </label>
                          <select name="type" >
                            <option value="regular">regular</option>
                            <option value="premium">premium</option>
                            <option value="delux">delux</option>
                            <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                          </select>
                        </div>

                        <div class="div_design">
                          <label>Wifi </label>
                          <select name="wifi" >
                            <option selected value="yes">yes</option>
                            <option value="no">no</option>
                            <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                          </select>
                        </div>

                        <div class="div_design">
                            <label>current Image </label>
                            <img style="margin:auto;" width="100" src="/uploads/rooms/{{$data->image}} " alt="" />
                        </div>

                        <div class="div_design">
                          <label>Upload Image </label>
                          <input type="file" name="image" value="" >
                        </div>
                        <div class="div_design">
                          <input class="btn btn-primary" type="submit" value="Add Room" >
                        </div>


                    </form>
                  </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>