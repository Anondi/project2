@extends('admin.master')
@section('body')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Product Id</th>
                        <td>{{$productById->id}}</td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td>{{$productById->categoryName}}</td>
                    </tr>
                    <tr>
                        <th>Manufacturer Name</th>
                        <td>{{$productById->manufacturerName}}</td>
                    </tr>
                    <tr>
                        <th>Product Price</th>
                        <td>{{$productById->productPrice}}</td>
                    </tr>
                    <tr>
                        <th>Product Quantity</th>
                        <td>{{$productById->productQuantity}}</td>
                    </tr>
                    <tr>
                        <th>Product Short Description</th>
                        <td>{{$productById->productShortDescription}}</td>
                    </tr>
                    <tr>
                        <th>Product Long Description</th>
                        <td>{{$productById->productLongDescription}}</td>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <td> 
                            <img src='{{asset($productById->productImage)}}' alt='' height='220' width='200'>
                        </td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <td>{{$productById->publicationStatus==1?'Published':'Unpublished'}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection