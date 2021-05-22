@extends('app')
@section('content')
    <table class="table table-bordered pt-5">
        <thead>
        <tr>
            <th  class="text-center align-middle" >Description</th>
            <th  class="text-center align-middle" >User</th>
            <th  class="text-center align-middle" >Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td  class="text-center align-middle">{{$feedback->description}}</td>
                    <td  class="text-center align-middle">{{$feedback->user->name}}</td>
                    <td  class="text-center align-middle" >
                        <form action="delete-feedback" method="POST">
                            @csrf
                            <input type="hidden" name="feedback_id" value="{{$feedback->id}}">
                            <button class="btn btn-danger" type="submit" >Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection