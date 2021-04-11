@extends('app')

@section('content')
    <div class="row">
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

    <div class="col-12 pb-5">
        <div class="col-md-3">
            <label> Select orders with status </label>
            <select class="form-control" name="status">
                <option value="ALL"> All </option>
                <option value="NEW"> New </option>
                <option value="PROCESSING"> Processing </option>
                <option value="DELIVERED"> Delivered </option>
                <option value="CANCELED"> Canceled </option>
            </select>
        </div>
    </div>

    <table class="table table-bordered pt-5">
        <thead>
          <tr>
            <th  class="text-center align-middle" >#</th>
            <th  class="text-center align-middle" >Customer Name</th>
            <th  class="text-center align-middle" >Delivery Hour</th>
            <th  class="text-center align-middle" >Delivery method</th>
            <th  class="text-center align-middle" >Status</th>
            <th  colspan="2" class="text-center align-middle" >Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th  class="text-center align-middle">{{$order->id}}</th>
                    <td  class="text-center align-middle">{{$order->user->name}}</td>
                    <td  class="text-center align-middle">{{$order->hour}}</td>
                    <td  class="text-center align-middle">{{$order->delivery_type}}</td>
                    <td  class="text-center align-middle">
                        <select class="form-control" id="status_order_{{$order->id}}">
                            @if( $order->status == 'NEW')
                                <option value="NEW"  {{ $order->status == 'NEW' ? 'selected' : '' }} > New </option>
                            @endif
                            <option value="PROCESSING" {{ $order->status == 'PROCESSING' ? 'selected' : '' }}> Processing </option>
                            <option value="DELIVERED" {{ $order->status == 'DELIVERED' ? 'selected' : '' }}> Delivered </option>
                            <option value="CANCELED" {{ $order->status == 'CANCELED' ? 'selected' : '' }}> Canceled </option>
                        </select>   
                    
                        
                    </td>
                    <td class="text-center align-middle">
                        <a type="button" onclick="updateStatus({{$order->id}})" class="btn btn-update-order">Update</a>
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
