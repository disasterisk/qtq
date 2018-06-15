@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($questions as $question)
                      <div class="card border-primary mb-3" style="max-width: 50rem;">
                        <a href="/question/{{$question->id}}">
                          <div class="card-header">{{$question->updated_at}}</div>
                        </a>
                          <div class="card-body">
                            <h4 class="card-title">{{$question->title}}</h4>
                            <p class="card-text">{{$question->text}}</p>
                          </div>
                        </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
