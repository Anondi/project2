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
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Order Total</th>
                                        <th>Order Status</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach($orders as $order)
                                    <tr class="odd gradeX">
                                        <td>{{$i++}}</td>
                                        <td>{{$order->productName}}</td>
                                        <td>{!!$order->firstName.' '.$order->lastName!!}</td>
                                        <td>Tk.{!!$order->orderTotal!!}</td>
                                        <td>{!!$order->orderStatus!!}</td>
                                        <td>{!!$order->paymentType!!}</td>
                                        <td class="center">
                                            {{$order->paymentStatus}}
                                        </td>
                                        <td class="center">
                                            <a href="{{url('/edit-product/'.$order->id)}}" class="btn btn-success" title='Edit'>
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                             <a href="{{url('/view-product/'.$order->id)}}" class="btn btn-info" title='Details'>
                                                <span class="glyphicon glyphicon-zoom-out"></span>
                                            </a>
                                            <a href='{{url('/delete-product/'.$order->id)}}' class="btn btn-danger" title='Delete' onclick="return confirm('Are you sure to delete this')">
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