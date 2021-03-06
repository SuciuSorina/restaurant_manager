@extends('app')

@section('content')

    <div class="row">
        <div class="col">
        
        </div>
            <div class="col" style="">
            @if(session('success'))
        
                <div role="alert" aria-live="assertive" aria-atomic="true" class="toast"  style="z-index:999; position:absolute; justify-content: right; display: grid;" >
                    <div class="toast-header">
                        <strong class="mr-auto">Deleted product</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" 	 aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body bg-success text-white" > 
                        
                        {{ session('success') }}
                    </div>
                </div>
        
            @endif
        
        </div>
    </div>

    <div class=" call-md-12 pb-5">
        <a href="{{route('products.create') }}" class="btn btn-info">Create</a>
    </div>


    
    
    <table class="table table-bordered fixed">
        <thead>
        <tr>
            <th  class="text-center align-middle" >#</th>
            <th  class="text-center align-middle" >Name</th>
            <th  class="text-center align-middle" >Category</th>
            <th  class="text-center align-middle" >Price unit</th>
            <th  class="text-center align-middle" >Quantity</th>

            <th  colspan="2" class="text-center align-middle" >Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th  class="text-center align-middle">{{$product->id}}</th>
                    <td  class="text-center align-middle">{{$product->name}}</td>
                    <td  class="text-center align-middle">{{$product->category->name}}</td>
                    <td  class="text-center align-middle">{{$product->price}} RON</td>

                    <td  class="text-center align-middle">
                        <form action="/add-order-items" method="post" class="mr-2">
                            @csrf
                        <select class="custom-select" id="inputGroupSelect01" name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td  class="text-center align-middle">
                        <div style="display:inline-flex">
                                <input type="hidden" name="product_id" class="form-control" value="{{$product->id}}">
                                <button type="submit" class="btn btn-success">
                                    Add to cart
                                </button>

                            </form>

                            <a type="button" href="{{ route(('products.edit'), $product->id) }}" class=" ml-2 btn btn-primary">Edit</a>
                        </div>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#categoryModal" style="margin-bottom: 5px;">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="categoryModalLabel">Delete product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete product {{$product->name}} ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{ route(('products.destroy'), $product->id) }}" method="post" style="display:inline;">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-sm" type="submit">Yes
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
