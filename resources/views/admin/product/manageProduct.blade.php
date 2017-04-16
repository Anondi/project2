@extends('admin.master')
@section('body')
<hr/>
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{Session::get('message')}}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Manufacturer Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach($products as $product)
                                    <tr class="odd gradeX">
                                        <td>{{$i++}}</td>
                                        <td>{{$product->productName}}</td>
                                        <td>{!!$product->categoryName!!}</td>
                                        <td>{!!$product->manufacturerName!!}</td>
                                        <td>Tk.{!!$product->productPrice!!}</td>
                                        <td>{!!$product->productQuantity!!}</td>
                                        <td class="center">
                                            {{$product->publicationStatus == 1? 'published':'Unpublished'}}
                                        </td>
                                        <td class="center">
                                            <a href="{{url('/edit-product/'.$product->id)}}" class="btn btn-success" title='Edit'>
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                             <a href="{{url('/view-product/'.$product->id)}}" class="btn btn-info" title='Details'>
                                                <span class="glyphicon glyphicon-zoom-out"></span>
                                            </a>
                                            <a href='{{url('/delete-product/'.$product->id)}}' class="btn btn-danger" title='Delete' onclick="return confirm('Are you sure to delete this')">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
@endsection