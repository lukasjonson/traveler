<div class="form-wrapper"> 
    {!! Form::open(['autocomplete' => 'off', 'action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div class="form-row">
    {{Form::text('title', $post->title, ['placeholder' => 'Titel'])}}
    </div>

    <div class="form-row">
    {{Form::textarea('body', $post->body, ['placeholder' => 'Innehåll'])}}
    </div>
    
    <div class="form-row">
        {{Form::file('post_image')}}
    </div>
    
    <div class="form-row">
    {{Form::text('country', $post->country, ['id' => 'country_input', 'list' => 'countries'])}}
    <datalist id="countries"></datalist>
    </div>

    <div class="form-row">
        {{Form::text('continent', $post->continent, ['id' => 'continent_input', 'list' => 'continents'])}}
        <datalist id="continents"></datalist>
    </div>
    
    {{Form::hidden('_method', 'PUT')}}
    
    <div class="form-row">
        {{Form::submit('Lägg till')}}
    </div>
    {!! Form::close() !!}
</div>

<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>