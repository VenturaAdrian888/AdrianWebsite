<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/bankgothic-md-bt" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">           
    <title>Register Adrian</title>
</head>
<body >
    
    <div class="row g-0">

        <div class="col-md-6 g-0 ">

            <div class="leftside  justify-content-center ">
                <div class="logo">
                    <img src="{{url('/images/logo.png')}}" alt="Logo" height="100px" width="100px" >
                    <div class="logoName">ADRIAN</div>
                </div>

                <div class="container-align">
                    <div class="header">Create your new Account</div>

                    <form action="{{route('register-user')}}" method="post">
                    @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('failed')}}
                    </div>
                    
                    @endif

                        <div class="form-group">
                        <div class="container-fullname">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{old('name')}}">
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>         
                            </div>

                            <div class="container-email">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>          
                            </div>

                            <div class="container-password">
                                <label for="password">Enter Password</label>
                                <input type="text" class="form-control" placeholder="Enter Password" name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>         
                            </div>

                            <div class="container-btn">
                                <button class="btn" type="submit">Register</button>
                            </div>

                            <div class="rgstr">Already have an account?
                                <a href="/login">Go back to login</a>
                            </div>

                    </div>
                    </form>
                </div>
 
            </div>
           
        </div>



        <div class="col-md-6 g-0">

            <div class="rightside"></div>
            

        </div>


    </div>
    
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>