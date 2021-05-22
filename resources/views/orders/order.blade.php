@extends('app')

@section('content')
    @if(isset($order) && count($order->orderParts))
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
                    <th class="text-center align-middle">
                        Delivery Method
                    </th>
                    <th class="text-center align-middle">
                        Hour
                    </th>
                    <th>
                    </th>
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
                        <th  class="text-center align-middle" >Subtotal </th>
                        <th  class="text-center align-middle" >Action</th>
                    </tr>
                </thead>
                    @foreach($order->orderParts as $part)
                    <tr>
                        <td  class="text-center align-middle">
                            {{$part->product_name}} 
                        </td>
                        <td  class="text-center align-middle">
                            {{$part->product_price}}   &euro;
                        </td>
                        <td  class="text-center align-middle">
                            {{$part->quantity}}
                        </td>
                        <td  class="text-center align-middle"> 
                            {{$part->price}}  &euro;
                        </td>
                        <td  class="text-center align-middle">
                            <form method="post" action="/remove-order-items">
                                @csrf
                                <input type="hidden" name="part_id" value="{{$part->id}}">
                                <button type="submit" class="btn btn-danger">Remove product</button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            @if(count($order->orderParts))
                <input type="hidden" id="total" value="{{$total}}">
                <div class="alert alert-info" role="alert">
                    <h2>Total price: {{$total}} &euro;  <label id="discount" style="display:none"> </label>  </h2>
                </div>
                <div class="d-flex justify-content-center align-middle row col-md-12">
                    <div class="col-md-3">
                        <button type="button" id="use-coupon-button" class="btn btn-info" onclick="useCoupon();" >Use discount coupon</button>
                    </div>
                    <div class="col-md-9">
                        <div id="apply-coupon" class="mt-1" style="display:none;">
                            <input id="coupon_code" type="text">
                            <button type="button" class="btn btn-info" onclick="applyCoupon()">Apply</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            <h2>No products in cart!</h2>
        </div>
    @endif
@endsection