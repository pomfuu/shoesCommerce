@extends('front-end.layout.master')
@section('title','User Profile')
@section('content')
<section>
    <div class="container my-4">
        <div class="row">
            <h4>{{ __('Personal Profile') }}</h4>
            <form class="d-flex form-all gap-2" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            <div class="col-md-5 col-12">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <img class="rounded-2 img-fluid" src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('storage/asset/why-img.svg')}}" alt="img">
                        <input name="image" type="file" class="my-2">
                        <button class="btn ms-2 mb-4 mt-2 text-white" style="background-color: #1e1e1e; width: 40%" type="submit">Upload</button>
                        <div class="from-register">
                            <label for="inputname" class="form-label p-0">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" id="inputname" value="{{ Auth::user()->name }}" >
                            <label for="inputemail" class="form-label p-0 mt-3">{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control" id="inputemail" value="{{ Auth::user()->email }}" >
                        </div>
                    </div>
            </div>
            <div class="col-md-7 col-12" style="background-color: #DDDDDD">
                <div class="row m-5 form-field">
                    <label for="inputname" class="form-label p-0">{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control" id="inputname" value="{{ Auth::user()->name }}" >
                    <label for="inputemail" class="form-label p-0 mt-3">{{ __('Email') }}</label>
                    <input type="email" name="email" class="form-control" id="inputemail" value="{{ Auth::user()->email }}" >
                    <label for="inputphone" class="form-label p-0 mt-3">{{ __('Phone Number') }}</label>
                    <input type="phone" class="form-control" id="inputphone" value="{{ Auth::user()->phone }}" name="phone" >
                    <label for="inputadd" class="form-label p-0 mt-3">{{ __('Address') }}</label>
                    <input type="text" class="form-control" id="inputadd" name="address" value="{{ Auth::user()->address }}" >
                    <label for="inputdob" class="form-label p-0 mt-3">{{ __('Date of Birth') }}</label>
                    <input type="date" class="form-control" id="inputdob" name="dob" value="{{ Auth::user()->dob }}" >
                    <label for="inputpayment" class="form-label p-0 mt-3">{{ __('Payment Method') }}</label>
                    <input type="string" class="form-control" id="inputpayment" name="payment" value="{{ Auth::user()->payment }}" >
                    <button class="btn mb-4 mt-4 text-white" style="background-color: #1e1e1e; width: 40%" type="submit">Upload</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>
<style>
    .btn:hover{
        background-color: #DDDDDD !important;
        color: #1e1e1e !important;
        transition: 0.3ms ease-in-out;
    }
    .from-register{
        display: none;
    }
    @media (max-width: 768px) {
        .form-all{
            flex-wrap: wrap !important;
        }
    }
    @media (max-width: 480px) {
        .form-field{
            margin-inline: 1vw !important;
            margin-block: 5vw !important;
        }
    }
</style>
@endsection
