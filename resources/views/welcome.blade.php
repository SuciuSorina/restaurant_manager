@extends('app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row col-md-12">
                <div class="col-md-6 text-casaenter sasjustify-content-center">
                    <h3> About our Restaurant </h3><br>
                    <p>
                        With its sentimental vibe and eminent nourishment
                        advertising, the as of late opened Allenti Eatery ,
                        welcomes you to savor the finest of nourishment in town.
                        The put incorporates a calm, ancient world environment that complements
                        impeccably the brilliant assortment of nourishment, served by a learned
                        and neighborly staff. Starters incorporate an cluster of conventional pasta,.
                        Favorites incorporate a mixture of conventional pizzas and the exceptional
                        classics menus. Charm your faculties with our nourishment. Allenti complements
                        their marvelous menu with a liberal drinks.
                    </p>
                </div>

                <div class="col-md-6">
                    <img src="{{asset('uploads/products/img1.jpg')}}" class="card-img-top">
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="row col-md-12">
                
                <div class="col-md-6">
                    <img src="{{asset('uploads/products/chef1.jpg')}}" class="card-img-top">
                </div>
                <div class="col-md-6 text-casaenter sasjustify-content-center">
                    <h3> About our Chef </h3><br>
                    <p>
                        With propelled dishes like Masai Giraffe Swiss Roll and Wild Camp
                        Rough Street Chocolate Cake, Basecamp Head chef Benson Ole Soit has gotten 
                        to be famous for his culinary aptitudes. His tall measures have set a modern
                        worldview inside Allenti Kitchen. A self-taught chef, is an motivative chef which 
                        was travel alot on vacation boat, luxury restaurants from worldwide and on all 
                        continents restaurants.
                    </p>
                </div>

            </div>
        </div>
    </div>
    @if(Auth::user())
        
        <div class="row col-md-12 mt-5  text-center d-flex">
            <div class="col-md-6">
                <a type="button" class="btn btn-lg btn-primary" href="/categories"> Go to <br>Categories </a>
            </div>

            <div class="col-md-6">
                <a type="button" class="btn btn-lg btn-primary" href="/products"> Go to <br>Products</a>
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
                <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3">Leave us a Feedback</h1>
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
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>


    @else
       
        <div class="row col-md-12 mt-5  text-center d-flex">
            <div class="col-md-6">
                <a type="button" class="btn btn-lg btn-primary" href="/categories"> Go to <br>Categories </a>
            </div>

            <div class="col-md-6">
                <a type="button" class="btn btn-lg btn-primary" href="/products"> Go to <br>Products</a>
            </div>
        </div>
    @endif



@endsection