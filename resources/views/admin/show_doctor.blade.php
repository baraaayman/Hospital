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
                        <th style="padding:10px; font-size:20px;">name</th>
                        <th style="padding:10px; font-size:20px;">phone</th>
                        <th style="padding:10px; font-size:20px;">speciality</th>
                        <th style="padding:10px; font-size:20px;">room</th>
                        <th style="padding:10px; font-size:20px;">image</th>
                        <th style="padding:10px; font-size:20px;">Delete</th>
                        <th style="padding:10px; font-size:20px;">Update</th>

                    </tr>
                    @foreach($data as $doctor)
                    <tr align="center" style="background-color: skyblue; color:black;">
                        <td style="padding:10px;">{{$doctor->name}}</td>
                        <td style="padding:10px;">{{$doctor->phone}}</td>
                        <td style="padding:10px;">{{$doctor->speciality}}</td>
                        <td style="padding:10px;">{{$doctor->room}}</td>
                        <td style="padding:10px;">
                            <img src="doctorimage/{{$doctor->image}}" style="width:70px; height: 70px;">
                        </td>
                        <td style="padding:10px;">
                            <a class="btn btn-danger" onclick="return confirm('are you sure?')" href="{{route('delete_doctor',$doctor->id)}}">delete</a>
                        </td>

                        <td style="padding:10px;">
                            <a class="btn btn-primary" href="{{route('update_doctor',$doctor->id)}}">Update</a>
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
