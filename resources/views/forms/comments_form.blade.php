<div class="form-wrapper">    
    {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])}}
    
    <div class="form-row">
        {{ Form::label('name', "Namn:") }}
        {{ Form::text('name', null, ['class' => 't']) }}
    </div>
    
    <div class="form-row">
        {{ Form::label('comment', "Kommentera:") }}
        {{ Form::textarea('comment', null, ['class' => 'sdsd']) }}
    </div>
    
    <div class="form-row">
    {{ Form::submit('Kommentera', ['class' => 'test']) }}
    </div>
    
    {{ Form::close() }}
</div>