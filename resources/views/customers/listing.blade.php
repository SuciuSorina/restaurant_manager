@extends('app')


@section('content')

    <table class="table table-bordered">
        <tr >
            <td class="text-center align-middle">
                Name
            </td>
            <td class="text-center align-middle">
                Email
            </td>
            <td class="text-center align-middle">
                Phone
            </td>
        </tr>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td  class="text-center align-middle">
                        {{$user->name}}
                    </td>
                    <td  class="text-center align-middle">
                        {{$user->email}}
                    </td>
                    <td  class="text-center align-middle">
                        {{$user->phone}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection