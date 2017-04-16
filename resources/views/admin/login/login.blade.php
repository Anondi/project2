<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public/admin/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/admin/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('public/admin/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/admin/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       {!!Form::open(['url'=>'/login','method'=>'POST'])!!}
                       <div class="form-group {{$errors->has('email')?'has-error':''}}">
                            {{Form::email('email',$value=null,$attribute=['class'=>'form-control','placeholder'=>'Email Address'])}}
                            @if($errors->has('email'))
                            <span class="help-block">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                            @endif
                       </div>
                       <div class="form-group {{$errors->has('password')?'has-error':''}}">
                           {{Form::password('password',$attribute=['class'=>'form-control','placeholder'=>'Password'])}}
                           @if($errors->has('password'))
                           <span class="help-block">
                               <strong>{{$errors->first('password')}}</strong>
                           </span>
                           @endif
                       </div>
                       <div class="form-group">
                           {{Form::submit('Login',$attribute=['class'=>'btn btn-primary btn-block'])}}
                       </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('public/admin/')}}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/admin/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/admin/')}}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/admin/')}}/dist/js/sb-admin-2.js"></script>

</body>

</html>
