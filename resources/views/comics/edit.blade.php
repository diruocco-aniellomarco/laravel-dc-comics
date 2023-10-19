@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    
    <h3>Modifica i dati del fumetto</h3>

    <form class="row g-3 mt-4" action="{{ route('comics.update', $comic)}}" method="POST">
        {{-- token da inserire per farlo leggere a laravel (questioni di sicurezza) --}}
        @csrf
        @method('PUT')

        <div class="col-6">
            <label class="d-block" for="title">Titolo</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $comic->title}}">
        </div>
        
        <div class="col-6">
            <label class="d-block" for="thumb">link img</label>
            <input type="text" id="thumb" name="thumb" class="form-control" value="{{ $comic->thumb}}">
        </div>

        <div class="col-6">
            <label class="d-block" for="price">Prezzo</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ $comic->price}}">
        </div>

        <div class="col-6">
            <label class="d-block" for="series">Serie</label>
            <input type="text" id="series" name="series" class="form-control" value="{{ $comic->series}}">
        </div>

        <div class="col-6">
            <label class="d-block" for="sale_date">Data vendita</label>
            <input type="date" id="sale_date" name="sale_date" class="form-control" value="{{ $comic->sale_date}}">
        </div>

        <div class="col-6">
            <label class="d-block" for="type">Tipo</label>
            <input type="text" id="type" name="type" class="form-control" value="{{ $comic->type}}">
        </div>

        <div class="col-12">
            <label class="d-block" for="description">Descrizione</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $comic->description}}">            
        </div>

        <div class="col-6">
            <button class="btn btn-success">SALVA</button>
            <a href="{{ route('comics.show', $comic)}}" class="btn btn-warning">ANNULLA</a>
            <a href="{{ route('comics.index')}}" class="btn btn-light">Torna alla lista</a>
        </div>
    </form>
        
   
  </section>
@endsection