@extends('layouts.admin')
@section('title','Education Levels')
@section('content')

<div class="container p-4">
  <h1>Education Levels</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/education-levels/create" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-responsive table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Description</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($levels as $level)
      <tr>
        <th scope="row">{{ $level->Id }}</th>
        <td>{{ $level->Description }}</td>
        <td class="text-center">
          <a class="btn btn-warning text-white" href="/admin/education-levels/edit/{{ $level->Id }}">Edit</a>
          <a class="btn btn-danger" onclick="deleteEducationLevel('{{ $level->Id }}')">Delete</a>
          <form action="/admin/education-levels/destroy/{{ $level->Id }}" method="POST" id="level-form-{{ $level->Id }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="3" class="text-center">No Education Levels</td>
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

    $("#education-levels").addClass("active")
    $("#education-levels").attr('aria-current', 'page')

  });

  function deleteEducationLevel(id) {
    let res = confirm('Are you sure you want to delete this education level?');
    if (res) {
      const target = `#level-form-${id}`;
      $(target).submit();
    }
  }
</script>
@endsection