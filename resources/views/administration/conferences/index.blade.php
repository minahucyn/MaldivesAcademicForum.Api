@extends('layouts.admin')
@section('title','Conferences')
@section('content')

<div class="container p-4">
  <h1>Conferences</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/conferences/create" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-responsive table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Description</th>
        <th scope="col">Venue</th>
        <th scope="col" class="text-center">Registration Start Date</th>
        <th scope="col" class="text-center">Registration End Date</th>
        <th scope="col" class="text-center">Start Date</th>
        <th scope="col" class="text-center">End Date</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($conferences as $conference)
      <tr>
        <th scope="row">{{ $conference->Id }}</th>
        <td>{{ $conference->Description }}</td>
        <td>{{ $conference->Venue }}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime($conference->RegistrationStartDate))}}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime($conference->RegistrationEndDate))}}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime($conference->StartDate))}}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime($conference->EndDate))}}</td>
        <td class="text-center">
          <a class="btn btn-warning" href="/admin/conferences/edit/{{ $conference->Id }}">Edit</a>
          <a class="btn btn-danger" onclick="deleteConference('{{ $conference->Id }}')">Delete</a>
          <form action="/admin/conferences/destroy/{{ $conference->Id }}" method="POST" id="conference-form-{{ $conference->Id }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No Conferences</td>
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

    $("#conferences").addClass("active")
    $("#conferences").attr('aria-current', 'page')

  });

  function deleteConference(id) {
    let res = confirm('Are you sure you want to delete this conference?');
    if (res) {
      const target = `#conference-form-${id}`;
      $(target).submit();
    }
  }
</script>
@endsection