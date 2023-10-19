@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    
    <a class="btn btn-primary mb-4" href="{{ route('comics.create')}}">Aggiungi fumetto</a>
    <table class="table table-striped">
        <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">Link img</th>
      <th scope="col">price</th>
      <th scope="col">series</th>
      <th scope="col">Sale date</th>
      <th scope="col">type</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($comics as $comic)
        <tr>
        <th scope="row">{{$comic->id}}</th>
        <td>{{$comic->title}}</td>
        <td>{{$comic->description}}</td>
        <td>{{$comic->thumb}}</td>
        <td>{{$comic->price}}</td>
        <td>{{$comic->series}}</td>
        <td>{{$comic->sale_date}}</td>
        <td>{{$comic->type}}</td>
        <td>
            <a href="{{ route('comics.show', $comic)}}">DETTAGLI</a>
            <a href="{{ route('comics.edit', $comic)}}" class="btn btn-primary">MODIFICA</a>
        </td>
        </tr>
    @endforeach
  </tbody>
    
    </table>
        
   
  </section>
@endsection