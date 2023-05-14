<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Corona Admin</title>
    {{-- <base href="/public"> --}}
    @include('admin.css')
    <style>
        label{
            display: inline-block;
            width: 200px
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">

      @include('admin.sidebar')

      @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">

            <div class="container" style="padding:100px;" align="center">
            @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            X
                        </button>
                        {{session()->get('message')}}
                    </div>

                 @endif



                <form action="{{route('edit_doctor',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div style="padding:15px;">
                        <label for="">Name Doctor</label>
                        <input type="text"  style="color:black;" name="name" value="{{$data->name}}">
                    </div>
                     <div style="padding:15px;">
                        <label for="">Phone</label>
                        <input type="number" style="color:black;" name="phone" value="{{$data->phone}}">
                    </div>
                     <div style="padding:15px;">
                        <label for="">Speciality</label>
                        <input type="text" style="color:black;" name="speciality" value="{{$data->speciality}}">
                    </div>
                     <div style="padding:15px;">
                        <label for="">room</label>
                        <input type="text" style="color:black;" name="room" value="{{$data->room}}">
                    </div>
                     <div style="padding:15px;">
                        <label for="">Old Image</label>
                        {{-- <img width="100px" height="100px" src="doctorimage/{{$data->image}}"> --}}
                        <img width="100px" height="100px" src="{{asset('doctorimage/'.$data->image)}}">
                    </div>

                    <div style="padding:15px;">
                        <label for="">Change Image</label>
                        <input type="file" name="file">
                    </div>
                    <div  style="padding:15px;">
                        <input type="submit" class="btn btn-primary">
                    </div>


                </form>

            </div>
        </div>



    </div>
    @include('admin.script')

  </body>
</html>
