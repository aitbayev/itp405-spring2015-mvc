@extends('layout')

@section('footer')

@stop

@section('content')
<h1> {{ $genre_name }} movies: </h1>

<table class="table table-striped">
    <thead>
    <tr>

        <th>Title</th>
        <th>Genre</th>
        <th>Rating</th>
        <th>Label</th>
    </tr>
    </thead>

    <tbody>

    @foreach ($dvds as $dvd)
        <tr>
            <td> {{ $dvd->title }} </td>
            <td> {{ $dvd->genre->genre_name }} </td>
            <td> {{ $dvd->rating->rating_name }} </td>
            <td> {{ $dvd->label->label_name }}</td>
        </tr>
    @endforeach

    </tbody>

</table>

@stop