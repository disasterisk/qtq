@extends('layouts.app')
@section('content')
  @foreach ($questions as $question)
    <div class="card border-primary mb-3" style="max-width: 50rem;">

        <div class="card-header"><a href="/questions/{{$question->id}}">{{$question->updated_at}}</a>
          <div style="float:right;">
            <a href="/user/{{$question->asker_id}}">{{$question->asker_id}}</a>
          </div>
        </div>
      <div class="card-body">
        <h4 class="card-title">{{$question->title}}</h4>
        <p class="card-text">{{$question->text}}</p>
      </div>
    </div>
  @endforeach
@endsection
