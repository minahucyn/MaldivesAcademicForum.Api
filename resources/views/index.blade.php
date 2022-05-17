@extends('layouts.landing')
@section('title','Home')
@section('content')

<section>
  <div class="owl-container">
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
</section>

<!-- Introduction -->
<section>
  <div class="px-4 pt-5 my-5 text-center">
    <h1 class="display-4 fw-bold">Maldives Academic Forum 2022</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">
        Another year and another great installment for the Maldives Academic Forum. We welcome everyone for this shit hope y'all enjoy this as much as we enjoy it. Why dont you get registered so you can partipate in this and enjoy some of the trash talks by our TED qualified speakers 😎
      </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#register">Register</a>
        <a class="btn btn-outline-primary btn-lg px-4 me-sm-3" href="/login">Login</a>
      </div>
    </div>
  </div>
</section>

<!-- Speakers -->
<section>
  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1 mb-4">Meet Our Speakers</h1>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus ipsam, earum alias cumque odio repellendus neque voluptatem fuga praesentium doloribus ut atque veniam! Veniam eos harum dolor, vel quas distinctio quo nam suscipit iste magni, consectetur minima natus omnis? Veritatis ducimus quas deserunt soluta consequuntur quod debitis voluptatibus atque dicta?</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2 fw-bold">Become a Speaker</button>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
        <img class="rounded-lg-3" src="{{ asset('images/misc/doge.png') }}" alt="" width="auto" height="300">
      </div>
    </div>
  </div>
</section>

<!-- Sponsors -->
<section>
  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
        <img class="rounded-lg-3" src="{{ asset('images/misc/doge.png') }}" alt="" width="auto" height="300">
      </div>
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1 mb-4">Sponsors</h1>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus ipsam, earum alias cumque odio repellendus neque voluptatem fuga praesentium doloribus ut atque veniam! Veniam eos harum dolor, vel quas distinctio quo nam suscipit iste magni, consectetur minima natus omnis? Veritatis ducimus quas deserunt soluta consequuntur quod debitis voluptatibus atque dicta?</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2 fw-bold">Become a Sponsor</button>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Register -->
<section id="register">
  <div class="container col-xl-12 px-1 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-5 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Register to book your presence</h1>
        <p class="fs-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, illo nostrum vel similique quisquam commodi.</p>
      </div>
      <div class="col-md-7 mx-auto col-lg-5">
        <form class="p-1 p-md-5 border rounded-3 bg-light" action="/register" method="post">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Full name" aria-label="Full name" name="fullname" id="fullname" required>
            <label for="fullname">Full name</label>
            @error('fullname')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="NID / PP" aria-label="NID / PP" name="nidpp" id="nidpp" required>
            <label for="nidpp">NID / PP</label>
            @error('nidpp')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required>
            <label for="dateofbirth">Date of Birth</label>
            @error('dateofbirth')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="contact number" pattern="[79][0-9]{6}" required>
            <label for="contact_number">Contact Number</label>
            @error('contact_number')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="john@doe.com" required>
            <label for="email_address">Email address</label>
            @error('email_address')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <select name="education_level" id="education_level" class="form-select" aria-label="Education Level" required>
              @foreach($educationIds as $educationId)
              <option value="{{$educationId->Id}}">{{ $educationId->Description }}</option>
              @endforeach
            </select>
            <label for="education_level">Education Level</label>
            @error('education_level')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          <hr class="my-4">
          <small class="text-muted">By clicking Register, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection


@section('scripts')
<script>
  $(document).ready(function() {

    let items = $("#nav > li > a.active")
    for (let index = 0; index < items.length; index++) {
      const element = items[index]
      $(element).removeClass('active')
    }

    $("#home").addClass("active")

    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 1,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true
    });
    $('.play').on('click', function() {
      owl.trigger('play.owl.autoplay', [5000])
    })
    $('.stop').on('click', function() {
      owl.trigger('stop.owl.autoplay')
    })
  });
</script>


@endsection