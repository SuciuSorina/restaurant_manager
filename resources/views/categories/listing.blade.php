@extends('app')

@section('content')
    @if (Auth::user()->role == "ADMIN")
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

        <div class=" call-md-12 pb-5">
            <a href="{{route('categories.create') }}" class="btn btn-info">Create</a>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th  class="text-center align-middle" >#</th>
                <th  class="text-center align-middle" >Name</th>
                <th  colspan="2" class="text-center align-middle" >Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th  class="text-center align-middle">{{$category->id}}</th>
                        <td  class="text-center align-middle">{{$category->name}}</td>
                        <td colspan="2" class="text-center align-middle">
                            <a type="button" href="{{ route(('categories.edit'), $category->id) }}" class="btn btn-primary">Edit</a>
            
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#categoryModal" data-id="{{$category->id }}">
                                Delete
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
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
                                                <button class="btn btn-danger btn-md" type="submit">Yes
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
    @else 
        <div classs="row" style="display: flex; justify-content: space-around; flex-wrap: wrap;">
            @foreach($categories as $category)
                <div class="col-md-4 p-2">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title">{{$category->name}}</h5>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        {{-- <a href="#" class="btn btn-category"></a> --}}
                        <a type="button" href="{{ route(('categories.show'), $category->id) }}" class="btn btn-category">Show Products</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <script>
    
    
        $(document).ready(function(){
          $(".toast").toast({
                delay: 2000
            });
          $('.toast').toast('show');
        });
    </script>

@endsection
