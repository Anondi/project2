@extends('admin.master')
@section('body')
<hr/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                {!!Form::open(['url'=>'new-product','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    <label class="control-label col-md-3">Product Name</label>
                    <div class="col-md-9">
                        <input type='text' name='productName' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('productName')? $errors->first('productName'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Category Name</label>
                    <div class="col-md-9">
                        <select class="form-control" name="categoryId">
                            <option value="">--Select Product Category Status--</option>
                            @foreach($publishedCategories as $publishedCategory)
                            <option value="{{$publishedCategory->id}}">{{$publishedCategory->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Manufacturer Name</label>
                    <div class="col-md-9">
                        <select class="form-control" name="manufacturerId">
                            <option value="">--Select Product Manufacturer Status--</option>
                            @foreach($publishedManufacturers as $publishedManufacture)
                            <option value="{{$publishedManufacture->id}}">{{$publishedManufacture->manufacturerName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Product Price</label>
                    <div class="col-md-9">
                        <input type='number' name='productPrice' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('productPrice')? $errors->first('productPrice'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Product Quantity</label>
                    <div class="col-md-9">
                        <input type='number' name='productQuantity' class="form-control"/>
                        <span class="text-danger"> {{$errors->has('productQuantity')? $errors->first('productQuantity'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Product Short Description</label>
                    <div class="col-md-9">
                        <textarea name="productShortDescription" class="form-control"></textarea>
                        <span class="text-danger">{{$errors->has('productShortDescription')?$errors->first('productShortDescription'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Product Long Description</label>
                    <div class="col-md-9">
                        <textarea name="productLongDescription" class="form-control" rows='10'></textarea>
                        <span class="text-danger">{{$errors->has('productLongDescription')?$errors->first('productLongDescription'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Product Image</label>
                    <div class="col-md-9">
                        <input type='file' name='productImage'/>
                        <span class="text-danger"> {{$errors->has('productImage')? $errors->first('productImage'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        <select class="form-control" name="publicationStatus">
                            <option value="">--Select Publication Status--</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                        <span class="text-danger">{{$errors->has('publicationStatus')?$errors->first('publicationStatus'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="submit" name="btn" value="Save Product Info" class="btn btn-success btn-block"/>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection
