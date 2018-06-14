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
                      <div>
                        <h3>{{$question->title}}</h3>
                        <p>{{$question->text}}</p>
                      </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
