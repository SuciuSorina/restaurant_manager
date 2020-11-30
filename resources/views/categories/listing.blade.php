@extends('app')

@section('content')

@foreach ($categories as $category)
    @if($category->id == 1)
        <p>This is category name {{ $category->name }}, {{ $category->id}}</p>
    <p> daca esti admin vezi asta </p>
    @endif
@endforeach





@endsection
