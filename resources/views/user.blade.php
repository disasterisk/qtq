@extends('layouts.app')
@section('content')
  <h1>{{$user->name}}</h1>
  <!-- Maybe make it so these buttons don't appear on your own page -->
  <!-- Make the friend button an unfriend button for friends -->
  {!! Form::submit('Friend!', ['class' => 'btn btn-outline-primary', 'name' => 'relationshipButton', 'value' => 'friend'])!!}
  {!! Form::submit('Block', ['class' => 'btn btn-outline-danger', 'name' => 'relationshipButton', 'value' => 'block'])!!}
@endsection
