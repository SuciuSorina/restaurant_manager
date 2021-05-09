@extends('app')

@section('content')

    <div class=" call-md-12 pb-5">
        @if(Auth::user()->role == 'ADMIN')
            <a href="{{route('coupons.create') }}" class="btn btn-info">Create</a>
        @else
            <h2> Available coupons!</h2>
        @endif
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th  class="text-center align-middle" >Code</th>
            <th  class="text-center align-middle" >Discount</th>
            <th  class="text-center align-middle" >Minimum value required</th>
            @if(Auth::user()->role == 'ADMIN')
                <th  colspan="2" class="text-center align-middle" >Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td  class="text-center align-middle">{{$coupon->code}}</td>
                    <td  class="text-center align-middle">{{$coupon->discount}}   &euro;</td>
                    <td  class="text-center align-middle">{{$coupon->min_value_required}}   &euro;</td>
                    @if(Auth::user()->role == 'ADMIN')
                        <td colspan="2" class="text-center align-middle">
                            <a type="button" href="{{ route(('coupons.edit'), $coupon->id) }}" class="btn btn-primary">Edit</a>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#couponModal" data-id="{{$coupon->id }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="couponModalLabel">Delete coupon</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to delete coupon {{$coupon->name}} ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route(('coupons.destroy'), $coupon->id) }}" method="post" style="display:inline;">
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
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection