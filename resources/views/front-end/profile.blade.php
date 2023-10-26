@extends('front-end.layout.master')

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <h4>basic information</h4>
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-md-6">
                                <div class="wsus__dash_pro_img">
                                    <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="img" class="img-fluid w-100">
                                    <input name="image" type="file">
                                </div>
                            </div>
                            <div class="col-xl-12">
                              <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                            </div>
                      <div class="col-xl-9">
                        <div class="row">
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fas fa-user-tie"></i>
                              <input type="text" name="name" placeholder="First Name" value="{{ Auth::user()->name }}">
                            </div>
                          </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fal fa-envelope-open"></i>
                              <input type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="wsus__dash_pass_change mt-2">
                        <div class="row">
                          <div class="col-xl-12">
                            <button class="common_btn" type="submit">upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

