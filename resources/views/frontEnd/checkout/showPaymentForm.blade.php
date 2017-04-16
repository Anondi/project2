@extends('frontEnd.master')
@section('title')
Payment
@endsection
@section('body')
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="well lead text-center text-success">
            You have to give us product payment information to complete your valuable order.Thank you.
        </div>
    </div>
</div>
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="text-center text-success">Payment Info Here</h3>
                <hr/>
                {!!Form::open(['url'=>'/new-order','method'=>'POST','class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <label>
                        <input type="radio" name='paymentType' value='cashOnDelivery'/> Cash on delivery
                        </label>
                        <span class="text-danger"> {{$errors->has('paymentType')? $errors->first('paymentType'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <label >
                        <input type="radio" name='paymentType' value='paypal'/> Paypal
                        </label>
                        <span class="text-danger"> {{$errors->has('paymentType')? $errors->first('paymentType'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <label>
                        <input type="radio" name='paymentType' value='bkash'/> Bkash
                        </label>
                        <span class="text-danger"> {{$errors->has('paymentType')? $errors->first('paymentType'):''}}</span>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="submit" name="btn" value="Confirm Order" class="btn btn-success btn-block"/>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection

