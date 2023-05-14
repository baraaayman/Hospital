<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
          @include('admin.navbar')
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center" style="padding-top:50px">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            X
                        </button>
                        {{session()->get('message')}}
                    </div>

                 @endif


                <form action="{{route('upload_doctor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px">
                        <label>Doctor Name</label>
                        <input type="text" name="name" style="color:black" placeholder="write name" required="">
                    </div>

                    <div style="padding: 15px">
                        <label>Phone</label>
                        <input type="number" name="phone" style="color:black" placeholder="write phone" required="">
                    </div>

                    <div style="padding: 15px">
                        <label>Speciality</label>
                        <select name="Speciality" style="color: black ;width: 200px" required="">
                            <option>--select--</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="nose">nose</option>
                        </select>
                    </div>

                    <div style="padding: 15px">
                        <label>Room No</label>
                        <input type="text" name="room" style="color:black" placeholder="write the room number" required="">
                    </div>

                    <div style="padding: 15px">
                        <label>Doctor Image</label>
                        <input type="file" name="file" >
                    </div>

                    <div style="padding: 15px">
                        <input type="submit" class="btn btn-success" required="">
                    </div>

                </form>
            </div>

        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>

