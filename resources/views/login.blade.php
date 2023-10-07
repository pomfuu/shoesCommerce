@extends('layouts.master')

@section('content')
<div class="row col-12 mt-5 justify-content-center">
    <div class="col-md-4">
        <h2 class="mb-4">login</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">user password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
