{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])}}
            
{{ Form::label('name', "Namn:") }}
{{ Form::text('name', null, ['class' => 't']) }}

{{ Form::label('comment', "Kommentera:") }}
{{ Form::textarea('comment', null, ['class' => 'sdsd']) }}

{{ Form::submit('Kommentera', ['class' => 'test']) }}

{{ Form::close() }}