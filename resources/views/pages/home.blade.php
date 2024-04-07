
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


   <div class="p-4">
    <h2>Your Note</h2>
   </div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($notes as $note)
      <tr>
        <td class="id">{{ $note->id }}</td>
        <td class="title">{{ $note->title }}</td>
        <td class="content">{{ $note->content }}</td>
        <td>{{ $note->created_at }}</td>
        <td>{{ $note->updated_at }}</td>
        <td>
          <div  class="d-flex flex-row bd-highlight mb-3">
          <a class="p-2 bd-highlight" href="{{ route('edit', ['id' => $note->id]) }}">
          <button type="button" class="btn btn-primary p-2">Edit</button></a>
          <form method="POST" action="{{ route('notes.destroy', ['id' => $note->id]) }}" onsubmit="return confirm('Are you sure you want to delete this note?')">
               @csrf
               @method('DELETE')
             <button type="submit" class="btn btn-danger p-2 mt-2 bd-highlight">Delete</button>
            </form>
            </div>
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $notes->links('pagination::bootstrap-5') }}
  
</div>


<script>
    $(document).ready(function () {
        $('#search').on('input', function () {
            var searchText = $(this).val().toLowerCase();
            $('table tbody tr').hide(); // Hide all rows initially

            // Show rows matching search text
            $('table tbody tr').each(function () {
                var id = $(this).find('.id').text().toLowerCase();
                var title = $(this).find('.title').text().toLowerCase();
                var content = $(this).find('.content').text().toLowerCase();
                if (id.includes(searchText) || title.includes(searchText) || content.includes(searchText)) {
                    $(this).show();
                }
            });
        });
    });
</script>



@endsection

