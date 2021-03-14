@extends('app')

@section('content')
<div id="order-success">
    
    
    <div class="row">
        <div class="col">
        
        </div>
            <div class="col" style="">
            @if(session('hourPasseed'))
        
                <div role="alert" aria-live="assertive" aria-atomic="true" class="toast"  style="z-index:999; position:absolute; justify-content: right; display: grid;" >
                    <div class="toast-header">
                        <strong class="mr-auto">Hour passed</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" 	 aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body text-white" > 
                        
                        {{ session('hourPasseed') }}
                    </div>
                </div>
        
            @endif
        
        </div>
    </div>

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
                <input type="hidden" id="status" value="NEW">
                <select class="form-control" name="delivery_type" id="delivery_type">
                    <option value="delivery">Delivery</option>
                    <option value="meet_half">Meet at Half Way</option>
                    <option value="pick_up">Pick up</option>
                </select>
            </td>
            <td  class="text-center align-middle">
                <select class="form-control" name="hour" id="hour" onchange="removeCheckHourValidation();">
                    <option value="0">Select hour</option>
                    @foreach($goodHours as $hour)
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