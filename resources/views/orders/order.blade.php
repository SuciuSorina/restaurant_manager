@extends('app')

@section('content')
<div id="order-success">
    <table class="table table-bordered">
        <tr colspan="2">
            <td>
                Delivery Method
            </td>
            <td>
                Hour
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td  class="text-center align-middle">
                <input type="hidden" id="from_place_order" value="1">
                <select class="form-control" name="delivery_type" id="delivery_type">
                    <option value="delivery">Delivery</option>
                    <option value="meet_half">Meet at Half Way</option>
                    <option value="pick_up">Pick up</option>
                </select>
            </td>
            <td  class="text-center align-middle">
                <select class="form-control" name="hour" id="hour" onchange="removeCheckHourValidation();">
                    <option value="0">Select hour</option>
                    @foreach($hours as $hour)
                        <option value="{{$hour}}">{{$hour}}</option>
                    @endforeach
                </select>
                {{-- <span class="text-danger" id="check-hour-span"> </span> --}}
            </td>
            <td  class="text-center align-middle">
                <button type="button" class="btn btn-success" onclick="placeOrder();">Place Order</button>
            </td>
        </tr>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th  class="text-center align-middle">Product  name</th>
                <th  class="text-center align-middle" >Price per unit</th>
                <th  class="text-center align-middle" >Total quantity</th>
                <th  class="text-center align-middle" >Total price</th>
                <th  class="text-center align-middle" >Action</th>
            </tr>
        </thead>
            @foreach($order->orderParts as $part)
            <tr>
                <td  class="text-center align-middle">
                    {{$part->product_name}} 
                </td>
                <td  class="text-center align-middle">
                    {{$part->product_price}} 
                </td>
                <td  class="text-center align-middle">
                    {{$part->quantity}}
                </td>
                <td  class="text-center align-middle"> 
                    {{$part->price}} 
                </td>
                <td  class="text-center align-middle">
                    <button type="button" class="btn btn-danger">Remove product</button> 
                </td>
            </tr>
            @endforeach
    </table>
</div>

@endsection