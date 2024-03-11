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
                                    <th class="th_design">Room Id</th>
                                    <th class="th_design">Room Tittle</th>
                                    <th class="th_design">Room Price</th>
                                    <th class="th_design">Image</th>
                                    <th class="th_design">Customer Name </th>
                                    <th class="th_design">Email</th>
                                    <th class="th_design">Phone</th>
                                    <th class="th_design">Arrival Date</th>
                                    <th class="th_design">Leaving Date</th>
                                    <th class="th_design">Status</th>
                                    <th class="th_design">Delete</th>
                                </tr>
            
                             @foreach ($data as $item)
                                <tr class="tr_design">
                                    <td class="td_design"></td>
                                    {{-- limiting description value in 30 word copunt  --}}
                                    <td class="td_design">{{$item->room_id}}</td>
                                    <td class="td_design">{{$item->room->room_tittle}}</td>
                                    <td class="td_design">{{$item->room->price}}</td>
                                    <td class="td_design">
                                        <img width="100" src="/uploads/rooms/{{$item->room->image}} " alt="" />
                                    </td>
                                    <td class="td_design">{{$item->name}}</td>
                                    <td class="td_design">{{$item->email}}</td>
                                    <td class="td_design">{{$item->startDate}}</td>
                                    <td class="td_design">{{$item->endDate}}</td>
                                    <td class="td_design">{{$item->status}}</td>
                                    <td class="td_design">
                                        <a onclick="return confirm('are you sure to delete this?')" class="btn btn-danger" href="{{url('booking_delete',$item->id)}}">Delete</a>
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