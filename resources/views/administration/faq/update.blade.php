@extends('layouts.admin')
@section('title','Update FAQ')
@section('content')

<div class="container p-4">
  <h1>Update FAQ</h1>
  <form class="form" action="/admin/faqs/update/{{ $faq->id }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="form-group col-md-12">
        <label for="Question">Question</label>
        <input name="Question" id="Question" type="text" class="form-control" placeholder="Question" value="{{ $faq->Question }}" required />
        <span class="text-danger">{{ $errors->first('Question') }}</span>
      </div>
    </div>
    <div class="row mt-2">
      <div class="form-group col-md-12">
        <label for="Answer">Answer</label>
        <textarea name="Answer" id="Answer" rows="5" class="form-control" placeholder="Answer" required>{{ $faq->Answer }}</textarea>
        <span class="text-danger">{{ $errors->first('Answer') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center mt-5">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/faqs" class="btn btn-secondary">
          Back
        </a>
        <button class="btn btn-primary" type="submit"> Submit</button>
      </div>
    </div>
  </form>
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

    $("#faq").addClass("active")
    $("#faq").attr('aria-current', 'page')

  });
</script>
@endsection