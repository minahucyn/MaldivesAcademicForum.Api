@extends('layouts.admin')
@section('title','Speakers')
@section('content')


<div class="container p-4">
  <h1>Speakers</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/speakers/create" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Full name</th>
        <th scope="col" class="text-center">Designation</th>
        <th scope="col" class="text-center">Description</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($speakers as $speaker)
      <tr>
        <th scope="row">{{ $speaker->Id }}</th>
        <td>{{ $speaker->Fullname }}</td>
        <td class="text-center">{{ $speaker->Designation }}</td>
        <td class="text-center">{{ $speaker->Description }}</td>
        <td class="text-center">
          <a class="btn btn-warning" href="/admin/speakers/edit/{{ $speaker->Id }}">Edit</a>
          <a onclick="deleteSpeaker('{{ $speaker->Id }}')" class="btn btn-danger">Delete</a>

          <form action="/admin/speakers/destroy/{{ $speaker->Id }}" method="POST" id="speaker-form-{{ $speaker->Id }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No Speakers</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>


@endsection

@section('scripts')
<script>
  $(function() {
    let items = $("#nav > li > a.active")
    for (let index = 0; index < items.length; index++) {
      const element = items[index]
      $(element).removeClass('active')
      $(element).removeAttr('aria-current')
    }

    $("#speakers").addClass("active")
    $("#speakers").attr('aria-current', 'page')

  });

  function deleteSpeaker(id) {
    let res = confirm('Are you sure you want to delete this speaker?');
    if (res) {
      const target = `#speaker-form-${id}`;
      $(target).submit();
    }
  }
</script>
@endsection