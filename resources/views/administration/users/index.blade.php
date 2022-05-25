@extends('layouts.admin')
@section('title','Users')
@section('content')

<div class="container p-4">
  <h1>Users</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/users/create" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Full name</th>
        <th scope="col" class="text-center">Email</th>
        <th scope="col" class="text-center">Created Date</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td class="text-center">{{ $user->email }}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime($user->created_at))}}</td>
        <td class="text-center">
          <!-- <a class="btn btn-warning" href="/admin/users/edit/{{ $user->id }}">Edit</a> -->

          @if(Auth::id() != $user->id)
          <a onclick="deleteUser('{{ $user->id }}')" class="btn btn-danger">Delete</a>
          <form action="/admin/users/destroy/{{ $user->id }}" method="POST" id="user-form-{{ $user->id }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          </form>
          @endif
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

    $("#users").addClass("active")
    $("#users").attr('aria-current', 'page')

  });

  function deleteUser(id) {
    let res = confirm('Are you sure you want to delete this user?');
    if (res) {
      const target = `#user-form-${id}`;
      $(target).submit();
    }
  }
</script>
@endsection