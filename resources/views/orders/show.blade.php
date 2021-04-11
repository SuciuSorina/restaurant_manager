@extends('app')
@section('content')


    <div style="display: flex; justify-content: center;">
        <div class="col-md-2"></div>
        <div class="card col-md-8 text-center">
            <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3"s>Order Details</h1>

                <div class="form-group">

                </div>
                <div class="form-group">
                    <label><b> Delivery method :</b> {{displayStatus($order->delivery_type)}} </label> </br>
                    <label><b> Status: </b>{{ $order->status}}</label></br>
                    <label ><b> Delivery Hour:</b>{{$order->hour}} </label></br>
                    <label > <b> Customer Name: </b>{{$order->user->name}} </label></br>
                    <label ><b> Customer Email: </b>{{$order->user->email}} </label></br>
                    <label ><b>Customer Address: </b>{{$order->user->adress}} </label></br>
                    <label ><b> Customer Phone: </b>{{$order->user->phone}} </label></br>

                </div>
                <div class="form-group">
                    <table class="table table-bordered">
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Part Price</th>

                        @foreach($order->orderParts as $part)
                        <tr>
                            <td>{{$part->product_name}}</td>
                            <td>{{$part->quantity}}</td>
                            <td>{{$part->product_price}}</td>
                            <td>{{$part->price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                Total Price: {{$order->total}} RON
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">

                    <a href="{{route('orders.index')}}" style="color:white;" type="button" class="btn btn-warning">Back </a>
                </div>
        </div>
    <div class="col-md-2"></div>

@endsection
