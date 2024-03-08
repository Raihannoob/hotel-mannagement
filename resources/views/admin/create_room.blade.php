<!DOCTYPE html>
<html>
  <head> 
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
                    <h1 style="font-size: 30px; font-weight:bold;">Add Rooms</h1>
                    <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                        <div class="div_design">
                          <label>Room Tittle  </label>
                          <input type="text" name="tittle" value="" >
                        </div>

                        <div class="div_design">
                          <label>Description</label>
                          <textarea name="Description"></textarea>
                        </div>

                        <div class="div_design">
                          <label>Price </label>
                          <input type="number" name="Price" value="" >
                        </div>
                        <div class="div_design">
                          <label>Room Type </label>
                          <select name="type" >
                            <option selected value="regular">regular</option>
                            <option value="premium">premium</option>
                            <option value="delux">delux</option>
                          </select>
                        </div>

                        <div class="div_design">
                          <label>Wifi </label>
                          <select name="wifi" >
                            <option selected value="yes">yes</option>
                            <option value="no">no</option>
                          </select>
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