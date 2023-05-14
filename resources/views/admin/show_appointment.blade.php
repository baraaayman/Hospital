<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">

      @include('admin.sidebar')

      @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding:100px;">
                <table>
                    <tr style="background-color: black;">
                        <th style="padding:10px; font-size:20px;">Name</th>
                        <th style="padding:10px; font-size:20px;">Email</th>
                        <th style="padding:10px; font-size:20px;">Phone</th>
                        <th style="padding:10px; font-size:20px;">Doctor</th>
                        <th style="padding:10px; font-size:20px;">Date</th>
                        <th style="padding:10px; font-size:20px;">Message</th>
                        <th style="padding:10px; font-size:20px;">Status</th>
                        <th style="padding:10px; font-size:20px;">User_id</th>
                        <th style="padding:10px; font-size:20px;">Approved</th>
                        <th style="padding:10px; font-size:20px;">Canceled</th>
                        <th style="padding:10px; font-size:20px;">Send Mail</th>
                    </tr>
                    @foreach($appointment as $appointments)
                    <tr align="center" style="background-color: skyblue; color:black;">
                        <td style="padding:10px; ">{{$appointments->name}}</td>
                        <td style="padding:10px; ">{{$appointments->email}}</td>
                        <td style="padding:10px; ">{{$appointments->phone}}</td>
                        <td style="padding:10px; ">{{$appointments->doctor}}</td>
                        <td style="padding:10px; ">{{$appointments->date}}</td>
                        <td style="padding:10px; ">{{$appointments->message}}</td>
                        <td style="padding:10px; ">{{$appointments->status}}</td>
                        <td style="padding:10px; ">{{$appointments->user_id}}</td>
                        <td>
                          <a class="btn btn-success" href="{{route('approve',$appointments->id)}}">Approved</a>
                        </td>
                        <td>
                          <a class="btn btn-danger" href="{{route('canceled',$appointments->id)}}">Canceled</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('email_view',$appointments->id)}}">Send Mail</a>
                          </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>



    </div>
    @include('admin.script')

  </body>
</html>
