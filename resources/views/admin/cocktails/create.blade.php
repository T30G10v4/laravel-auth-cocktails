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
                <label for="technique">Tecnica</label>
                <input type="text" id="technique" name="technique" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </form>
    </div>
@endsection