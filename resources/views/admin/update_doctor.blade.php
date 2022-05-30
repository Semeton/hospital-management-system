<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    label {
        display: inline-block;
        width: 200px;
    }

    .alert {
        width: 100%;
    }
    </style>

    <base href="/public">
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
                    <h1>Update Doctor Information</h1>
                </div>

                <form action="{{url('editdoctor', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color: black;" name="name" value="{{$data->name}}"
                            placeholder="Write a name...">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Phone</label>
                        <input type="number" style="color: black;" value="{{$data->phone}}" name="phone"
                            placeholder="Write a phone number...">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="speciality">Specality</label>
                        <select name="speciality" id="" style="color: black; width: 200px;">
                            <option value="{{$data->speciality}}">{{$data->speciality}}</option>
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
                        <input type="text" value="{{$data->room}}" style="color: black;" name="room"
                            placeholder="Write the roomnumber...">
                        @error('room')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Old Image</label>
                        <img width="150" src="doctorimage/{{$data->image}}" alt="">
                        <!-- <input type="file" value="{{$data->image}}" name="file" > -->
                        @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">New Image</label>
                        <input type="file" name="file">
                        @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>


        @include('admin.script')


</body>

</html>