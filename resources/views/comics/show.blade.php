@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    

    <div class="card">
        <div class="card-header">
          <h3>{{$comic->title}}</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">id: {{$comic->id}}</li>
          <li class="list-group-item">serie: {{$comic->series}}</li>
          <li class="list-group-item">tipo: {{$comic->type}}</li>
          <li class="list-group-item">data vendita: {{$comic->sale_date}}</li>
          <li class="list-group-item">Prezzo: {{$comic->price}}</li>
          <li class="list-group-item">Descrizione:{{$comic->description}}</li>
          
        </ul>
        
    </div>
    <div class="text-center my-4">
      <a href="{{ route('comics.edit', $comic)}}" class="btn btn-primary">MODIFICA</a>
      <a href="{{ route('comics.index')}}" class="btn btn-info">Torna alla lista</a>
    </div>    
   
  </section>
@endsection