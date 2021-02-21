@extends('app')

@section('content')

    <table class="table table-bordered">
        <thead>
        <tr>
            <th  class="text-center align-middle" >#</th>
            <th  class="text-center align-middle" >Name</th>
            <th  colspan="2" class="text-center align-middle" >Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product) 
                <tr>
                    <th  class="text-center align-middle">{{$product->id}}</th>
                    <td  class="text-center align-middle">{{$product->name}}</td>
                    <td colspan="2" class="text-center align-middle">
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