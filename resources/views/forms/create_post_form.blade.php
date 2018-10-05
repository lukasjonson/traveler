<div class="form-wrapper"> 
        {!! Form::open(['autocomplete' => 'off', 'action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
        <div class="form-row">
        {{Form::text('title', '', ['placeholder' => 'Titel'])}}
        </div>
    
        <div class="form-row">
        {{Form::textarea('body', '', ['placeholder' => 'Innehåll'])}}
        </div>
        
        <div class="form-row">
        {{Form::text('country', '', ['id' => 'country_input', 'list' => 'countries', 'placeholder' => 'Land'])}}
        <datalist id="countries"></datalist>
        </div>
    
        <div class="form-row">
            {{Form::text('continent', '', ['id' => 'continent_input', 'list' => 'continents', 'placeholder' => 'Världsdel'])}}
            <datalist id="continents"></datalist>
        </div>

        <div class="form-row">
            {{Form::file('post_image')}}
        </div>

        <div class="form-row">
            {{Form::submit('Lägg till')}}
        </div>

        {!! Form::close() !!}
    </div>