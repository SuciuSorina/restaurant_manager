@extends('app')

@section('content')
    @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
            </div>
    @endif
    <div style="display: flex; justify-content: center;">
        <div class="col-md-2"></div>
        <div class="card col-md-8">
            <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3">Edit Coupon</h1>
            <form action="{{ route(('coupons.update'), $coupon->id) }}" method="post">
                @method('PUT')    
                @csrf
                <div class="form-group">
                    <input type="text" name="code" value="{{$coupon->code }}" class="form-control" placeholder="Coupon Code" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="number" name="discount" value="{{$coupon->discount }}" class="form-control" placeholder="Discount" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="number" name="min_value_required" value="{{$coupon->min_value_required }}" class="form-control" placeholder="Minimum value required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                    <a href="{{route('coupons.index')}}" style="color:white;" type="button" class="btn btn-primary">Back </a>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection