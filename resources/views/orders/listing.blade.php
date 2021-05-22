@extends('app')

@section('content')
    <div  class="row col-md-12" id="display-success">
                
    </div>
    <div class="row" id="new_list">
       
        <div class="col">

        </div>
            <div class="col" style="">
            @if(session('hasProduct'))

                <div role="alert" aria-live="assertive" aria-atomic="true" class="toast"  style="z-index:999; position:absolute; justify-content: right; display: grid;" >
                    <div class="toast-header">
                        <strong class="mr-auto">Category has product</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" 	 aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body bg-danger text-white" >

                        {{ session('hasProduct') }}
                    </div>
                </div>

            @endif

        </div>
    </div>

    <div class=" pb-5 ml-2 row align-items-center ">
        {{-- <div class="col-md-5 row "> --}}
            <div>
                <label > Filter orders </label> <br>
                <div class="row">
                    <form method="get" class="d-flex" action="{{route('orders.index')}}">
                        @csrf
                        <select class="form-control" name="status">
                            <option value="ALL" @if($status == "ALL") selected @endif > All </option>
                            <option value="NEW" @if($status == "NEW") selected @endif > New </option>
                            <option value="PROCESSING" @if($status == "PROCESSING") selected @endif > Processing </option>
                            <option value="DELIVERED" @if($status == "DELIVERED") selected @endif > Delivered </option>
                            <option value="CANCELED" @if($status == "CANCELED") selected @endif > Canceled </option>
                        </select>
                        <button type="submit" class="btn ml-2 btn-success btn-md">Search</button>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    </div>

    <table class="table table-bordered pt-5">
        <thead>
          <tr>
            <th  class="text-center align-middle" >Customer Name</th>
            <th  class="text-center align-middle" >Delivery Hour</th>
            <th  class="text-center align-middle" >Date</th>
            <th  class="text-center align-middle" >Delivery method</th>
            <th  class="text-center align-middle" >Status</th>
            <th  colspan="2" class="text-center align-middle" >Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr @if($order->is_today==1) style="background: #69D1C5; " @endif>
                    <td  class="text-center align-middle">{{$order->user->name}}</td>
                    <td  class="text-center align-middle">{{$order->hour}}</td>
                    <td  class="text-center align-middle">{{date("d/m/Y",strtotime($order->created_at))}}</td>
                    <td  class="text-center align-middle">{{displayStatus($order->delivery_type)}}</td>
                    <td  class="text-center align-middle">
                        @if(Auth::user()->role == 'ADMIN' )
                            <select class="form-control" id="status_order_{{$order->id}}">
                                @if( $order->status == 'NEW')
                                    <option value="NEW"  {{ $order->status == 'NEW' ? 'selected' : '' }} > New </option>
                                @endif
                                <option value="PROCESSING" {{ $order->status == 'PROCESSING' ? 'selected' : '' }}> Processing </option>
                                <option value="DELIVERED" {{ $order->status == 'DELIVERED' ? 'selected' : '' }}> Delivered </option>
                                <option value="CANCELED" {{ $order->status == 'CANCELED' ? 'selected' : '' }}> Canceled </option>
                            </select>
                        @else
                            {{ $order->status }}
                        @endif


                    </td>
                    <td class="text-center align-middle">
                        @if(Auth::user()->role == 'ADMIN' )
                            <a type="button" onclick="updateStatus({{$order->id}})" class="btn btn-update-order">Update</a>
                        @endif
                        <a type="button" href="show-order/{{$order->id}}" class="btn btn-primary">Details</a>

                        {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#categoryModal" data-id="{{$category->id }}">
                            Delete
                        </button> --}}


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>


        $(document).ready(function(){
          $(".toast").toast({
                delay: 2000
            });
          $('.toast').toast('show');
        });
    </script>

@endsection
