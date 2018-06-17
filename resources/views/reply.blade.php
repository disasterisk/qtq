@extends('layouts.app')
@section('content')
  <div class="jumbotron">
  <h1>{{$question->title}}</h1>
  <p class="lead">{{$question->text}}</p>
  </div>
  <div class="row justify-content-center">
    <form action="/questions/{{$question->id}}/reply" method="post">
      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          Please fix the following errors
        </div>
      @endif
      {!! csrf_field() !!}
      <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
        <textarea name="text" rows="8" cols="80">{{old('text')}}</textarea>
        @if($errors->has('text'))
          <span class="help-block">{{ $errors->first('question') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
@endsection
