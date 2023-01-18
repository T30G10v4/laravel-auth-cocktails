@extends('layouts.admin')

@section('content')
    
<h2>Cocktails</h2>

<a href="{{ route('admin.cocktails.create') }}" class="btn btn-primary">Crea un nuovo cocktail</a>

<ul>
    @foreach ($cocktails as $cocktail)
    <li>
        <a href="{{ route('admin.cocktails.show', $cocktail->id) }}">
            {{$cocktail->name}}
        </a>
    </li>
    @endforeach
</ul>

@endsection
