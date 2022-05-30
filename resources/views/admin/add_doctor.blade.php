<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    label {
        display: inline-block;
        width: 200px;
    }

    .alert {
        width: 50%;
    }
    </style>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">

        @include('admin.sidebar')
        @include('admin.navigation')


        <div class="container-fluid page-body-wrapper">
            <!-- Form -->
            <div class="container" style="padding-top: 100px; padding-left: 100px;">
                <!-- Alert Success -->
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="container align-middle pt-3" style="background-color: #8F5FE8; color:white; height:50px;">
                    <h1>Add a Doctor</h1>
                </div>

                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color: black;" name="name" placeholder="Write a name..." required>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Phone</label>
                        <input type="number" style="color: black;" name="phone" placeholder="Write a phone number..."
                            required>
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="speciality">Specality</label>
                        <select name="speciality" id="" style="color: black; width: 200px;" required>
                            <option value="">--select speciality--</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Radiology">Radiology</option>
                            <option value="Public Health">Public Health</option>
                        </select>
                        @error('speciality')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Room Number</label>
                        <input type="text" style="color: black;" name="room" placeholder="Write the roomnumber..."
                            required>
                        @error('room')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Doctor Image</label>
                        <input type="file" name="file" required>
                        @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>


        @include('admin.script')


</body>

</html>