@extends('layouts.landing')
@section('title','Home')
@section('content')

<div class="owl-container" style="position:relative">
  <div>
    <button class="btn btn-lg btn-primary" style="position: absolute;z-index:10">REGISTER!</button>
  </div>
  <div class="owl-carousel owl-theme">
    <div>
      <img src="https://mifco.mv/uploads/sponsors/16024307501573653649Banner-2.jpg" alt="">
    </div>
    <div>
      <img src="https://mifco.mv/uploads/sponsors/16024307161573653661Banner-1.jpg" alt="">
    </div>
    <div>
      <img src="https://mifco.mv/uploads/sponsors/160243073515688058955.jpg" alt="">
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script>
  $(document).ready(function() {

    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 1,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplayHoverPause: true
    });
    $('.play').on('click', function() {
      owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
      owl.trigger('stop.owl.autoplay')
    })
  });
</script>
@endsection