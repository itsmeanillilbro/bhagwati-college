
@extends ('frontend.layouts.main')
@section('main-container')
  <div class="all-title-box">
    <div class="container text-center">
      <h1>SSR<span class="m_1"><a href="{{ url('/') }}">Home</a> / <a href="{{ url('/SSR') }}">SSR</a></span></h1>
    </div>
  </div>
  <section>
    <div class="container my-5">
      <div class="login-form justify-content-center">
        <div class="text-center mb-4">
          <div>
            <img class="img-fluid" src="{{url('frontend\img\logo.png')}}" alt="logo" width="10%" height="10%">
          </div>
        </div>
        <form id="passwordForm" method="POST" action="{{ route('verify') }}" class="admin-login needs-validation" novalidate>
          @csrf
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="input-group1 text-center">
                Password:
                <input class="mb-2" type="password" id="user_password" placeholder="Enter Password" name="password" aria-describedby="inputGroupPrepend" required>
                <button class="mybtn btn " type="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection
