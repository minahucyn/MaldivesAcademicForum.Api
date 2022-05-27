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
        <!-- <a class="btn btn-outline-primary btn-lg px-4 me-sm-3" href="/login">Login</a> -->
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
          <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2 fw-bold" onclick="becomeASpeaker()">Become a Speaker</button>
        </div>
      </div>
      <div class="col-lg-5 p-0 overflow-hidden">
        <img class="rounded-lg-3" src="{{ asset('images/avatars/man.jpg') }}" alt="" width="auto" height="150">
        <img class="rounded-lg-3" src="{{ asset('images/avatars/woman.jpg') }}" alt="" width="auto" height="125">
        <img class="rounded-lg-3" src="{{ asset('images/avatars/mann.jpg') }}" alt="" width="auto" height="140">
      </div>
    </div>
  </div>
</section>

<!-- Sponsors -->
<section>
  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-5 p-0 overflow-hidden">
        @foreach($sponsors as $sponsor)
        <img class="rounded-lg-3" src="{{ $sponsor->LogoUri }}" alt="" width="auto" height="75">
        @endforeach
      </div>
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1 mb-4">Sponsors</h1>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus ipsam, earum alias cumque odio repellendus neque voluptatem fuga praesentium doloribus ut atque veniam! Veniam eos harum dolor, vel quas distinctio quo nam suscipit iste magni, consectetur minima natus omnis? Veritatis ducimus quas deserunt soluta consequuntur quod debitis voluptatibus atque dicta?</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2 fw-bold" onclick="becomeASponsor()">Become a Sponsor</button>
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
        <form action="/attendee-registration" method="post" enctype="multipart/form-data" class="p-1 p-md-5 border rounded-3 bg-light">
          @csrf
          <input type="hidden" name="redirect">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Full name" aria-label="Full name" name="Fullname" id="Fullname" value="{{ old('Fullname') }}" required>
            <label for="Fullname">Full name</label>
            @error('Fullname')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="NID / PP" aria-label="NID / PP" name="NidPp" id="NidPp" value="{{ old('NidPp') }}" required>
            <label for="NidPp">NID / PP</label>
            @error('NidPp')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="Birthdate" name="Birthdate" value="{{ old('Birthdate') }}" required>
            <label for="Birthdate">Date of Birth</label>
            @error('Birthdate')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" placeholder="contact number" value="{{ old('ContactNumber') }}" pattern="[79][0-9]{6}" required>
            <label for="ContactNumber">Contact Number</label>
            @error('ContactNumber')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="Email" name="Email" placeholder="john@doe.com" value="{{ old('Email') }}" required>
            <label for="Email">Email address</label>
            @error('Email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <select name="EducationId" id="EducationId" class="form-select" aria-label="Education Level" value="{{ old('EducationId') }}" required>
              @foreach($educationIds as $educationId)
              <option value="{{$educationId->Id}}">{{ $educationId->Description }}</option>
              @endforeach
            </select>
            <label for="EducationId">Education Level</label>
            @error('EducationId')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <select name="ConferenceId" id="ConferenceId" class="form-select" aria-label="Conference" value="{{ old('ConferenceId') }}" required>
              @foreach($conferenceIds as $conferenceId)
              <option value="{{$conferenceId->Id}}">{{ $conferenceId->Description }}</option>
              @endforeach
            </select>
            <label for="ConferenceId">Conference</label>
            @error('ConferenceId')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <label for="PaymentSlip" class="form-label">Payment Slip</label>
            <input class="form-control" type="file" id="PaymentSlip" name="PaymentSlip" accept="image/png, image/jpeg, image/jpg">
            @error('PaymentSlip')
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

  function becomeASpeaker() {
    toastr.info("If you've done a TED talk then we will consider 😉", '', {
      closeButton: true
    });
  }

  function becomeASponsor() {
    toastr.info("If you have 💵💵💵 then YEAAHHH!", '', {
      closeButton: true
    });
  }
</script>


@endsection