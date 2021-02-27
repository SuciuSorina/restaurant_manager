@extends('app')

@section('content')
    <div class=" call-md-12 pb-5">
        <a href="{{route('products.create') }}" class="btn btn-info">Create</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th  class="text-center align-middle" >#</th>
            <th  class="text-center align-middle" >Name</th>
            <th  class="text-center align-middle" >Category</th>
            <th  colspan="2" class="text-center align-middle" >Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th  class="text-center align-middle">{{$product->id}}</th>
                    <td  class="text-center align-middle">{{$product->name}}</td>
                    <td  class="text-center align-middle">{{$product->category->name}}</td>
                    <td colspan="2" class="text-center align-middle">
                        <form action="/add-order-items" method="post">
                            @csrf
                            <input type="hidden" name="product_id" class="form-control" value="{{$product->id}}">
                            <button type="submit" class="btn btn-success">
                                Add to cart
                            </button>

                        </form>

                        <a type="button" href="{{ route(('products.edit'), $product->id) }}" class="btn btn-primary">Edit</a>

                        {{-- <a type="button" href="{{ route(('categories.edit'), $category->id) }}" class="btn btn-primary">Edit</a> --}}

                        {{-- @include('categories.delete', compact('author') ) --}}
                        {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#categoryModal" data-id="{{$category->id }}">
                            Delete
                        </button> --}}

                        <!-- Modal -->
                        {{-- <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="categoryModalLabel">Delete category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete category {{$category->name}} ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{ route(('categories.destroy'), $category->id) }}" method="post" style="display:inline;">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-sm" type="submit">Yes
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}



                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
