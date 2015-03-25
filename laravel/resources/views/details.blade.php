@extends('layout')

@section('footer')

@stop

@section('content')
    <div id="details">
        <h2> DVD details </h2>
        <div class="lefthandside"> Title </div>
        <div class="righthandside"> {{ $dvd->title }}</div>

        <div class="lefthandside"> Genre </div>
        <div class="righthandside"> {{ $dvd->genre_name }} </div>

        <div class="lefthandside"> Format </div>
        <div class="righthandside"> {{ $dvd->format_name }}</div>

        <div class="lefthandside"> Label </div>
        <div class="righthandside"> {{ $dvd->label_name }}</div>

        <div class="lefthandside"> Sound </div>
        <div class="righthandside"> {{ $dvd->sound_name  }}</div>

        <div class="lefthandside"> Rating </div>
        <div class="righthandside"> {{ $dvd->rating_name }}</div>

        <div class="lefthandside"> Award </div>
        <div class="righthandside"> {{ $dvd->award }}</div>
        <br/>
        <div class="lefthandside"> Release date </div>
        <div class="righthandside"> {{ DATE_FORMAT(new DateTime($dvd->release_date), 'M j, Y') }}</div>

    </div>
        <div id="messages">
            @if ((Session::has('success')))
                <p> {{ Session::get('success')}} </p>
            @endif

            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }} </p>
            @endforeach
            </div>

        <div id="review">
            <h3> Write a review </h3>
            <fieldset>
                <form method="post" action="{{ url('dvds/addreview') }}">
                    <input type="hidden" name="dvd_id" value="{{ $id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}" />
            <div class="lefthandside">Title</div>
            <div class="righthandside"><input name="title" value="{{ Request::old('title')}}"/> </div>
            <div class="lefthandside">Rating</div>
            <div class="righthandside"><select name="rating">
                 @for ($i = 1; $i<=10; $i++)
                     <?php if ($i == Request::old('rating')) : ?>
                    <option selected="true"> {{ $i }} </option>
                     @else
                         <option > {{ $i }} </option>
                         @endif
                    @endfor
                </select> </div>
            <div id="description">
                <div class="lefthandside">Description</div>
                <div class="righthandside"><textarea class="textarea" name="description" value="{{Request::old('description')}}" >  </textarea> </div>
            </div>
                <div id="submit" name="submit"> <input type="submit"> </div>
                    </form>
            </fieldset>
</div>

        <div id="reviews">
            @if (sizeof($reviews)>0)
            <h3> Reviews </h3>
                @endif
            @foreach ($reviews as $review)
            <fieldset>

                <div class="lefthandside">Title:</div>
                <div class="righthandside"><p> {{ $review->title }} </p> </div>

                <div class="lefthandside">Rating:</div>
                <div class="righthandside"><p>{{ $review->rating }}</p> </div>

                <div class="lefthandside">Description:</div>
                <div class="righthandside"><p>{{ $review->description }}</p> </div>

            </fieldset>
            @endforeach
            </div>
    @if($rottentomato)
        <div class = roteentomatoes>
          <h3> Information from RottenTomatoes.com: </h3>

            <table class="table table-striped">
                <thead>
                <tr>

                    <th>Poster</th>
                    <th>Critics Score</th>
                    <th>Audience Score</th>
                    <th>Runtime</th>
                    <th>Abridged Cast</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                        <td> <img src="{{ $rottentomato->posters->thumbnail }}"> </td>
                        <td> {{  $rottentomato->ratings->critics_score }} </td>
                        <td> {{ $rottentomato->ratings->audience_score }} </td>
                        <td> {{ $rottentomato->runtime }}</td>
                        <td> @foreach($rottentomato->abridged_cast as $cast)
                          <p>  {{ $cast->name . '(' . $cast->characters[0] . ')'}} </p>
                                 @endforeach
                        </td>
                    </tr>
                </tbody>
         </table>

            </div>
    @endif
@stop
