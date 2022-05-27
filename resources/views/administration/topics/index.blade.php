@extends('layouts.admin')
@section('title','Topics')
@section('content')

<div class="container p-4">
  <h1>Topics</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/topics/create" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Speaker</th>
        <th scope="col" class="text-center">Conference</th>
        <th scope="col" class="text-center">Location</th>
        <th scope="col" class="text-center">Start Date</th>
        <th scope="col" class="text-center">End Date</th>
        <th scope="col" class="text-center">Description</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($topics as $topic)
      <tr>
        <th scope="row">{{ $topic->Id }}</th>
        <td>
          @foreach($speakers as $speaker)
          @if($speaker->Id==$topic->SpeakerId)
          {{$speaker->Fullname}}
          @endif
          @endforeach
        </td>
        <td class="text-center">
          @foreach($conferences as $conference)
          @if($conference->Id==$topic->ConferenceId)
          {{$conference->Description}}
          @endif
          @endforeach
        </td>
        <td class="text-center">{{ $topic->Location }}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime($topic->StartDate))}}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime($topic->EndDate))}}</td>
        <td class="text-center">{{ $topic->Description }}</td>
        <td class="text-center">
          <a class="btn btn-warning" href="/admin/topics/edit/{{ $topic->Id }}">Edit</a>
          <a onclick="deleteTopic('{{ $topic->Id }}')" class="btn btn-danger">Delete</a>
          <form action="/admin/topics/destroy/{{ $topic->Id }}" method="POST" id="topic-form-{{ $topic->Id  }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No Topics</td>
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

    $("#topics").addClass("active")
    $("#topics").attr('aria-current', 'page')

  });

  function deleteTopic(id) {
    let res = confirm('Are you sure you want to delete this topic?');
    if (res) {
      const target = `#topic-form-${id}`;
      $(target).submit();
    }
  }
</script>
@endsection