@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Crea un nuovo cocktail</h2>

        <form action="{{ route('admin.cocktails.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name">Nome del cocktail</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <select name="technique" id="technique">
                    <option value="">Seleziona una tecnica</option>
                    @foreach ($techniques as $technique)
                        <option value="{{ $technique->code }}">{{ $technique->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                @foreach  ($ingredients as $key=>$ingredient)
                    <label for="ingredients-{{$ingredient->id}}"> {{ $ingredient->name }}</label>
                    <input value="{{$ingredient->id}}" type="checkbox" name="ingredients[{{$key}}][id]" id="ingredients-{{$ingredient->id}}">

                    <input type="number" value="{{ $ingredient->quantity }}" name="ingredients[{{$key}}][quantity]" >
                @endforeach
            </div>

            
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </form>
    </div>
@endsection