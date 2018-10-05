
    {!! Form::open(['autocomplete' => 'off', 'action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    {{Form::text('title', '', ['placeholder' => 'Titel'])}}

    {{Form::textarea('body', '', ['placeholder' => 'Innehåll'])}}

    {{Form::text('country', '', ['id' => 'country_input', 'list' => 'countries'])}}
    <datalist id="countries"></datalist>

    {{Form::text('continent', '', ['id' => 'continent_input', 'list' => 'continents'])}}
    <datalist id="continents"></datalist>

    {{Form::file('post_image')}}

    {{Form::submit('Lägg till')}}

    {!! Form::close() !!}