@extends('layouts.app')

@section('content')
<!-- Move page to /questions, replace with friends, friend requests, your questions -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary mb-3" style="max-width: 50rem;">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                      <a href="/submit">
                        <button type="button" class="btn btn-primary">Ask question!</button>
                      </a>
                    </div>
                    <hr class="my-4">
                    @if($questions->isEmpty())
                      <div class="alert alert-info">
                        <p>You do not have any questions.</p>
                      </div>
                    @else
                      <div class="card border-secondary mb-3" style="max-width: 50rem;">
                        <div class="card-header">My Questions</div>
                        <div class="card-body">
                          @foreach ($questions as $question)
                            <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                              <a href="/questions/{{$question->id}}" style="color:white;text-decoration:underline">
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
                    @endif
                    <div class="card border-secondary mb-3" style="max-width: 50rem;">
                      <div class="card-header">My Friends</div>
                      <div class="card-body">
                        @foreach($friendRequests as $friendRequest)
                          <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            @if($user1_id==Auth::user()->id)
                              <p><a href="/user/{{$user2_id}}">User</a> sent you a friend request!</p>
                            @else
                              <p><a href="/user/{{$user1_id}}">User</a> sent you a friend request!</p>
                            @endif
                          </div>
                        @endforeach
                        @if ($friends->isEmpty())
                          <div class="alert alert-light">
                            <p>You do not have any friends yet.</p>
                          </div>
                        @else
                          @foreach($friends as $friend)
                            <a href="/user/{{$friend->id}}">
                              <button type="button" class="btn btn-primary btn-lg btn-block">{{$friend->name}}</button>
                            </a>
                          @endforeach
                        @endif
                      </div>
                    </div>
                </div><!--end dash card body-->
            </div>
        </div>
    </div>
</div>
@endsection
