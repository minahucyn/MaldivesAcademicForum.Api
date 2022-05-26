@extends('layouts.landing')
@section('title','Conference Gallery')
@section('content')

<section class="container p-4">
  <h1>Conference Gallery</h1>
  <div class="py-5 mt-5">
    @if(count($images) > 0)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach($images as $image)
      <div class="col">
        <div class="card shadow-sm">
          <img src="/{{ $image->image_path }}" alt="">
        </div>
      </div>
      @endforeach
    </div>
    @else
    <p class="text-center">No photos yet!</p>
    @endif
  </div>
</section>

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

    $("#about").addClass("active")
    $("#about").attr('aria-current', 'page')

  });
</script>
@endsection