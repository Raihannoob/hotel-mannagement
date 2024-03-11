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
                                    <th class="th_design">Status Update</th>
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
                                    <td class="td_design">
                                        @if( $item -> status == 'Approved')
                                            <span style="color: skyblue;">
                                                Approved
                                            </span>
                                        @endif
                                        @if($item -> status == 'Rejected')
                                            <span style="color: red;">
                                                    Rejected
                                            </span>    
                                        @endif
                                        @if($item -> status == 'waiting')
                                            <span style="color: yellow;">
                                                    Waiting
                                            </span>    
                                        @endif
                                        

                                    </td>
                                    <td class="td_design">
                                        <a onclick="return confirm('are you sure to delete this?')" class="btn btn-danger" href="{{url('booking_delete',$item->id)}}">Delete</a>
                                    </td>
                                    <td>
                                        <span style="padding-bottom: 10px;">
                                            <a class="btn btn-success" href="{{url('approve_book',$item->id)}}">Approve</a>
                                        </span>
                                        
                                        <a  class="btn btn-warning" href="{{url('reject_book',$item->id)}}">Rejected</a>
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