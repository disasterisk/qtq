@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="card border-primary mb-3" style="max-width: 50rem;">
      <div class="card-header">{{$question->updated_at}}</div>
      <div class="card-body">
        <h2 class="card-title">{{$question->title}}</h2>
        <p class="card-text">{{$question->text}}</p>
        <br>
        <a href="{{$question->id}}/reply">
          <button type="button" class="btn btn-primary">Reply</button>
        </a>
        <hr class="my-4">
        @foreach ($responses as $response)
            <div class="card text-white bg-secondary mb-3" style="max-width: 50rem;">
              <div class="card-header">{{$response->updated_at}}</div>
              <div class="card-body">
                <p class="card-text">{{$response->text}}</p>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
