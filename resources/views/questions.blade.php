@extends(layouts.app)
@section('content')
  @foreach ($questions as $question)
    <div class="card border-primary mb-3" style="max-width: 50rem;">
      <a href="/questions/{{$question->id}}">
        <div class="card-header">{{$question->updated_at}}</div>
      </a>
      <div class="card-body">
        <h4 class="card-title">{{$question->title}}</h4>
        <p class="card-text">{{$question->text}}</p>
      </div>
    </div>
  @endforeach
@endsection
