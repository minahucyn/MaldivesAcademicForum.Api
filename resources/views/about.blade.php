@extends('layouts.landing')
@section('title','About')
@section('content')

<!-- about us introduction -->
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">About Us</h1>
      <p class="lead text-muted">
        Maldives academic forum is a platform for students, scholars, scientists and
        parents to search and find scholarships, summer schools, grants, fully funded conferences,
        trainings, seminars and other study and research opportunities worldwide.
        Every day publications on new opportunities across hundreds of disciplines appear online on Maldives academic forum.
      </p>
    </div>
  </div>
</section>

<!-- speakers -->
<section class="container py-5 bg-light">
  <div class="row mt-2 mb-4">
    <h1 class="text-center">Our Speakers</h1>
  </div>
  <div class="row mt-5">
    @foreach($speakers as $speaker)
    <div class="col-lg-4 d-flex justify-content-center flex-column align-items-center">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
      </svg>

      <h2 class="fw-normal mt-4">{{ $speaker->Fullname }}</h2>
      <p>{{ $speaker->Description }}</p>
    </div>
    @endforeach
  </div>
</section>

<!-- sponsors -->
<section class="container py-5 bg-light">
  <div class="row mt-2 mb-4">
    <h1 class="text-center">Our Sponsors</h1>
  </div>
  <div class="row mb-5 mt-5">
    @foreach($sponsors as $sponsor)
    <div class="col d-flex justify-content-center flex-column align-items-center">
      <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
      </svg> -->
      <img class="rounded-lg-3" src="{{ $sponsor->LogoUri }}" alt="" width="auto" height="75">
    </div>
    @endforeach
  </div>
</section>

<!-- previous installments -->
<section>
  <div class="py-5">
    <div class="container">
      <div class="row mt-4 mb-4">
        <h1>Previous and upcoming installments</h1>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($conferences as $conference)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">conf</text>
            </svg>

            <div class="card-body">
              <a href="/conference-gallery/{{ $conference->Id }}">
                <p class="card-text"><strong>{{ $conference->Description }}</strong></p>
              </a>
              <div class="d-flex justify-content-between align-items-center">
                <div class="">
                  <?php
                  $regOpen = false;
                  $now  = date("Y-m-d");
                  if ($now >= $conference->RegistrationStartDate && $now <= $conference->RegistrationEndDate) {
                    $regOpen = true;
                  }
                  ?>
                  @if($regOpen)
                  <span class="badge text-bg-success">Registration Open</span>
                  @else
                  <span class="badge text-bg-danger">Registration Closed</span>
                  @endif

                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                </div>
                <small class="text-muted">{{ date('d-m-Y', strtotime($conference->StartDate)) }} to {{ date('d-m-Y', strtotime($conference->EndDate)) }}</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection


@section('scripts')
<script>
  //setNav("#about")
  $(function() {
    let items = $("#nav > li > a.active")
    for (let index = 0; index < items.length; index++) {
      const element = items[index]
      $(element).removeClass('active')
    }

    $("#about").addClass("active")
  });
</script>
@endsection