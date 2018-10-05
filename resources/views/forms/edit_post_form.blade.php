{!! Form::open(['autocomplete' => 'off', 'action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

{{Form::text('title', $post->title, ['placeholder' => 'Titel'])}}

{{Form::textarea('body', $post->body, ['placeholder' => 'Innehåll'])}}

{{Form::file('post_image')}}

{{Form::hidden('_method', 'PUT')}}

{{Form::submit('Lägg till')}}

{!! Form::close() !!}