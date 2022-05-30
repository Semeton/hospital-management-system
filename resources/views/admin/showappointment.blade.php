<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
    a {
        cursor: pointer;
    }
    </style>
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
            <div class="container" style="padding-top: 70px;">
                <table class="table">
                    <tr style="background-color: #FDAB00; color:white;">
                        <th>Client Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    @foreach($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->name}}</td>
                        <td>{{$appointment->email}}</td>
                        <td>{{$appointment->phone}}</td>
                        <td>{{$appointment->doctor}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->message}}</td>
                        <td>{{$appointment->status}}</td>
                        <td><span><a class="btn btn-success text-center m-0"
                                    href="{{url('approved', $appointment->id)}}">+</a></span>
                            <span><a class="btn btn-danger text-center"
                                    onclick="return confirm('Are you sure you want to cancel this appointment')"
                                    href="{{url('canceled', $appointment->id)}}">x</a></span>
                            <span><a class="btn btn-primary text-center"
                                    href="{{url('emailview', $appointment->id)}}">Mail</a></span>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('admin.script')

</body>

</html>