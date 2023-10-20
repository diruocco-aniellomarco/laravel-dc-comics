@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    
    <h3>Aggiungi un nuovo fumetto</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Correggi i seguenti errori per proseguire:</h4>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3 mt-4" action="{{ route('comics.store')}}" method="POST">
        {{-- token da inserire per farlo leggere a laravel (questioni di sicurezza) --}}
        @csrf
        <div class="col-6">
            <label class="d-block" for="title">Titolo</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        
        <div class="col-6">
            <label class="d-block" for="thumb">link img</label>
            <input type="text" id="thumb" name="thumb" class="form-control">
        </div>

        <div class="col-6">
            <label class="d-block" for="price">Prezzo</label>
            <input type="text" id="price" name="price" class="form-control">
        </div>

        <div class="col-6">
            <label class="d-block" for="series">Serie</label>
            <input type="text" id="series" name="series" class="form-control">
        </div>

        <div class="col-6">
            <label class="d-block" for="sale_date">Data vendita</label>
            <input type="date" id="sale_date" name="sale_date" class="form-control">
        </div>

        <div class="col-6">
            <label class="d-block" for="type">Tipo</label>
            <input type="text" id="type" name="type" class="form-control">
        </div>

        <div class="col-12">
            <label class="d-block" for="description">Descrizione</label>
            <input type="text" id="description" name="description" class="form-control">
        </div>
        <div class="col-6">
            <button class="btn btn-primary">SALVA</button>
        
        </div>
    </form>
        
   
  </section>
@endsection