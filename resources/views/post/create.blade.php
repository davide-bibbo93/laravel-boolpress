@extends('base')

@section('title', 'Create Post')

@section('content')

    <h2>Create Post</h2>
    <br>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="author_id">Authors</label>
            <select class="form-control" name="author_id" id="author_id">
                @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                @endforeach
            </select>
          </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Article's Title">
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea class="form-control" name="body" id="body" rows="6" placeholder="Body Text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
@endsection
