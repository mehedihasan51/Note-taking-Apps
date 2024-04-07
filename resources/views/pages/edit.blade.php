@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between position-static flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

<h2>Your Note</h2>
<form action="{{ route('notes.updat', $note->id) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter Title" required value="{{$note->title}}">
    </div><br>
    <label for="content">Content</label>
    <textarea name="content" rows="4" cols="50" class="form-control textarea" id="content" aria-describedby="content" placeholder="Enter content" required>{{$note->content}}</textarea>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection