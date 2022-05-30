<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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

                <form action="{{url('sendemail', $data->id)}}" method="POST">
                    @csrf
                    <div style="padding: 15px;">
                        <label for="">Greeting</label>
                        <input type="text" style="color: black;" name="greeting" placeholder="greeting.." required>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Body</label>
                        <textarea cols="50" rows="10" name="body" style="color: black;" required
                            placeholder="Start typing..."></textarea>
                        @error('body')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Action Text</label>
                        <input type="text" style="color: black;" name="actiontext" required>
                        @error('actiontext')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Action Url</label>
                        <input type="text" style="color: black;" name="actionurl" required>
                        @error('actionurl')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Closing Remark</label>
                        <input type="text" style="color: black;" name="closing" required>
                        @error('closing')
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