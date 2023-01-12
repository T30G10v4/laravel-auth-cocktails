@extends('layouts.admin')

@section('content')
    
<h2>Cocktails</h2>
<ul>
    @foreach ($cocktails as $cocktail)
    <li>{{$cocktail->name}}</li>
    @endforeach
</ul>

@endsection
