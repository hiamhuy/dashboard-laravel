@section('title')
Home
@endsection
@section('page-id')
home
@endsection


@section('main')

    <div class="container">
        <div class="card mb-3">
            <img src="{{ asset('/storage/post/backgroundbanner2.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Hachitech solution</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4 object-cover">
                    <img src="{{ asset('/storage/post/backgroundbanner2.png') }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Hachitech solution</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4 object-cover">
                    <img src="{{ asset('/storage/post/backgroundbanner2.png') }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Hachitech solution</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
               
            </div>
        </div>
    
    </div>

@endsection

@include('app.layouts.app')