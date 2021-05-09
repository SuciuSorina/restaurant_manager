@extends('app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row col-md-12">
                <div class="col-md-6">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    , when an unknown printer took a galley of type and scrambled it to make a type
                    specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in 
                    the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu
                </div>

                <div class="col-md-6">
                    <img src="{{asset('uploads/products/img1.jfif')}}" class="card-img-top">
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user())
        
        <div class="row col-md-12 mt-5  text-center d-flex">
            <div class="col-md-6">
                <a type="button" class="btn btn-lg btn-category rounded-circle" href="/categories"> Go to <br>Categories </a>
            </div>

            <div class="col-md-6">
                <a type="button" class="btn btn-lg btn-category rounded-circle" href="/products"> Go to <br>Products</a>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert mt-5 alert-danger">
                <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>
        </div>
        @endif
        @if(Session::has('addedFeedback'))
            <div class=" mt-5 alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('addedFeedback') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="mt-5 mb-5" style="display: flex; justify-content: center;">
            <div class="col-md-2"></div>
            <div class="card col-md-8">
                <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3"s>Let us a Feedback</h1>
                <form action="/feedbacks" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Description</label><br>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id"> 
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>


    @else
        <div class="row col-md-12">
            <a type="button" class="btn btn-primary" href="/login"> Go to Login </a>
            <a type="button" class="btn btn-primary" href="/register"> Go to Register </a>
        </div>
    @endif



@endsection