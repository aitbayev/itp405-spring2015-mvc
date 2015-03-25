@extends('layout')

@section('footer')

@stop

@section('content')

<h1> Dvd Insert</h1>
<form action="/dvds" method="post" class="form navbar-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="line">
        <div class="lefthandside">
            Title:
        </div>
        <div class="righthandside">
            <input type="text" name="dvd_title" class="size"/>
        </div>
    </div>

    <div class="line">
        <div class="lefthandside">
            Genre:
        </div>
        <div class="righthandside">
            <select name="genre" class="size">
                <option value="" disabled selected> Select Genre </option>
                @foreach ($genres as $genre)
                <option value="{{$genre->id}}"> {{ $genre->genre_name }} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="line">
        <div class="lefthandside">
            Label:
        </div>
        <div class="righthandside">
            <select name="label" class="size">
                <option value="" disabled selected> Select Label </option>
                @foreach ($labels as $label)
                <option value="{{$label->id}}"> {{ $label->label_name }} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="line">
        <div class="lefthandside">
            Rating:
        </div>
        <div class="righthandside">
            <select name="rating" class="size">
                <option value="" disabled selected> Select Rating </option>
                @foreach ($ratings as $rating)
                <option value="{{$rating->id}}"> {{ $rating->rating_name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <br/>

    <div class="line">
        <div class="lefthandside">
            Sound:
        </div>
        <div class="righthandside">
            <select name="sound" class="size">
                <option value="" disabled selected> Select Sound </option>
                @foreach ($sounds as $sound)
                <option value="{{$sound->id}}"> {{ $sound->sound_name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="line">
        <div class="lefthandside">
            Format:
        </div>
        <div class="righthandside">
            <select name="format" class="size">
                <option value="" disabled selected> Select Format </option>
                @foreach ($formats as $format)
                <option value="{{$format->id}}"> {{ $format->format_name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <br/>
    <div class="righthandside">
        <input type="submit" value="Insert" class="size" />
    </div>
</form>
<div>
    @if (Session::has('success'))
     <p style="background-color: green"> {{Session::get('success')}} </p>
    @endif
</div>

@stop
