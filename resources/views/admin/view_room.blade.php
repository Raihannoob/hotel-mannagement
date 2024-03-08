<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table_design{
            border: 3px solid white;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }
        .th_design{
            background-color: skyblue;
            padding: 10PX;
        }
        .tr_design{
            border: 3px solid white;
        }
        .td_design{
            padding: 3px solid white;
        }

    </style>
  </head>
  <body>
    
    @include('admin.header')
    @include('admin.SidebarNavigation')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <table class="table_design">
                    <tr class="tr_design">
                        <th class="th_design">Room Tittle</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Room Type</th>
                        <th class="th_design">wifi</th>
                        <th class="th_design">Image</th>
                        <th class="th_design">Created At</th>
                        <th class="th_design">Delete</th>
                    </tr>

                    @foreach ($data as $item)
                    <tr class="tr_design">
                        <td class="td_design">{{$item->room_tittle}}</td>
                        {{-- limiting description value in 30 word copunt  --}}
                        <td class="td_design">{!!Str::limit($item->description,30)!!}</td>
                        <td class="td_design">${{$item->price}}</td>
                        <td class="td_design">{{$item->room_type}}</td>
                        <td class="td_design">{{$item->wifi}}</td>
                        <td class="td_design">
                            <img width="100" src="/upload/rooms/{{$item->image}}">
                        </td>
                        <td class="td_design">{{$item->created_at}}</td>
                        <td class="td_design">
                            <a onclick="return confirm('are you sure to delete this?')" class="btn btn-danger" href="{{url('room_delete',$item->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>




            </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>