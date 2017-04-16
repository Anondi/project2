@extends('frontEnd.master')
@section('title')
Checkout
@endsection
@section('body')
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="well lead text-center text-success">
            You have to login to complete your valuable order.If you are not registered then please login first.Thank you.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="text-center text-success">Login From Here</h3>
                <hr/>
                {!!Form::open(['url'=>'new-category','method'=>'POST','class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label class="control-label col-md-3">Email Address</label>
                    <div class="col-md-9">
                        <input type='text' name='emailAddress' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Password</label>
                    <div class="col-md-9">
                        <input type='text' name='password' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('password')? $errors->first('password'):''}}</span>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="submit" name="btn" value="Login" class="btn btn-success btn-block"/>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
     <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="text-center text-success">Registration From Here</h3>
                <hr/>
                {!!Form::open(['url'=>'/new-customer','method'=>'POST','class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label class="control-label col-md-3">First Name</label>
                    <div class="col-md-9">
                        <input type='text' name='firstName' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('firstName')? $errors->first('firstName'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Last Name</label>
                    <div class="col-md-9">
                        <input type='text' name='lastName' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('lastName')? $errors->first('lastName'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Email Address</label>
                    <div class="col-md-9">
                        <input type='text' name='emailAddress' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Password</label>
                    <div class="col-md-9">
                        <input type='password' name='password' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('password')? $errors->first('password'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Address</label>
                    <div class="col-md-9">
                        <textarea name="address" class="form-control"></textarea>
                        <span class="text-danger">{{$errors->has('address')?$errors->first('address'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Phone Number</label>
                    <div class="col-md-9">
                        <input type='number' name='phoneNumber' class="form-control"/>
                        <span class="text-danger">{{$errors->has('phoneNumber')?$errors->first('phoneNumber'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">District Name</label>
                    <div class="col-md-9">
                        <select class="form-control" name="districtName">
                            <option value="">--Select Publication Status--</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="khulna">Khulna</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="noakhali">Noakhali</option>
                            <option value="comilla">Comilla</option>
                            <option value="barisal">Barisal</option>
                            
                        </select>
                        <span class="text-danger">{{$errors->has('districtName')?$errors->first('districtName'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="submit" name="btn" value="Register" class="btn btn-success btn-block"/>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection