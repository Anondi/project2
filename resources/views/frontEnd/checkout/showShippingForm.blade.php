@extends('frontEnd.master')
@section('title')
Checkout
@endsection
@section('body')
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="well lead text-center text-success">
            Well<b> {{$customerById->firstName.' '.$customerById->lastName}} </b>, You have to give us product shipping information to complete your valuable order.If your billing info and shipping info are same then just press on Save Shipping Info Button.Thank you.
        </div>
    </div>
</div>
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="text-center text-success">Shipping From Here</h3>
                <hr/>
                {!!Form::open(['url'=>'/new-shipping','method'=>'POST','class'=>'form-horizontal','name'=>'shippingForm'])!!}
                <div class="form-group">
                    <label class="control-label col-md-3">Full Name</label>
                    <div class="col-md-9">
                        <input type='text' name='fullName' value='{{$customerById->firstName.' '.$customerById->lastName}}' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('fullName')? $errors->first('fullName'):''}}</span>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="control-label col-md-3">Email Address</label>
                    <div class="col-md-9">
                        <input type='text' name='emailAddress' value='{{$customerById->emailAddress}}' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3">Address</label>
                    <div class="col-md-9">
                        <textarea name="address" class="form-control">{{$customerById->address}}</textarea>
                        <span class="text-danger">{{$errors->has('address')?$errors->first('address'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Phone Number</label>
                    <div class="col-md-9">
                        <input type='number' name='phoneNumber' value='{{$customerById->phoneNumber}}' class="form-control"/>
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
                        <input type="submit" name="btn" value="Save Shipping Info" class="btn btn-success btn-block"/>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    document.forms['shippingForm'].elements['districtName'].value='{{$customerById->districtName}}';
</script>
@endsection
