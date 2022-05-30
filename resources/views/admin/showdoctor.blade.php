<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
        @include('admin.sidebar')
        @include('admin.navigation')
        <div class="container-fluid page-body-wrapper">
            <div class="container table-responsive-md" style="padding-top: 70px;">
                <table class="table">
                    <tr style="background-color: #FC424A; color:white;">
                        <th>Doctor Name</th>
                        <th>Phone</th>
                        <th>Room No</th>
                        <th>Image</th>
                        <th>Action Buttons</th>
                    </tr>

                    @foreach($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->room}}</td>
                        <td><img src="doctorimage/{{$doctor->image}}" alt=""></td>
                        <td><a class="btn btn-danger text-center"
                                onclick="return confirm('Are you sure you want to cancel this appointment')"
                                href="{{url('deletedoctor', $doctor->id)}}">Delete</a><a
                                class="btn btn-primary text-center"
                                href="{{url('updatedoctor', $doctor->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('admin.script')

</body>

</html>