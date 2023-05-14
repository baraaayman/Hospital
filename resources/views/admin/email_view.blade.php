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


                <form action="{{route('send_email',$data->id)}}" method="post">
                    @csrf
                    <div style="padding: 15px">
                        <label>Greeting</label>
                        <input type="text" name="greeting" style="color:black" placeholder="write name" required="">
                    </div>

                    <div style="padding: 15px">
                        <label>Body</label>
                        <input type="text" name="body" style="color:black" required="">
                    </div>



                    <div style="padding: 15px">
                        <label>Action Text</label>
                        <input type="text" name="action_text" style="color:black" required="">
                    </div>

                    <div style="padding: 15px">
                        <label>Action Url</label>
                        <input type="text" name="action_url" style="color:black" required="">
                    </div>


                    <div style="padding: 15px">
                        <label>End Part</label>
                        <input type="text" name="end_part" style="color:black" required="">
                    </div>


                    <div style="padding: 15px">
                        <input type="submit" style=" color="#00d25b"" class="btn btn-success" required="">
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

