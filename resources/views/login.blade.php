

<img src="{{ url('./storage/asset/schuhe_background_stroke.svg') }}" alt="schuhe" class="schuhe-stroke-img position-absolute" style="background-color: white">
<div class="container" style="overflow-x: hidden;">
    <div class="sub-container mx-3">
        <div class="row justify-content-md-end me-xl-5">
            <div class="col-sm-7 col-md-5 col-lg-4 col-xl-4 col-xxl-3 pt-3 mb-3 greetings-text">
                <p class="m-0 p-0">Welcome back,</p>
                <p class="m-0 p-0">Log in to your account</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 col-xxl-4 p-5 me-5 shadow field-container">
                <form action="">
                    <div>
                        <p class="text-field-label mb-2 ps-2">Email</p>
                        <div class="input-group">
                            <input type="text" class="text-field-input form-control mb-3" placeholder="" aria-label="Username">
                        </div>
                    </div>
                    <div>
                        <p class="text-field-label mb-2 ps-2">Password</p>
                        <div class="input-group">
                            <input type="text" class="text-field-input form-control mb-3" placeholder="" aria-label="Username">
                        </div>
                    </div>
                    <div class="text-end">
                        <a href="" class="counter-account-action">Forgot your password?</a>
                    </div>
                    <div class="d-flex mt-3 ">
                        <input type="checkbox" class="check-box-input me-2" >
                        <label class="">Remember me</label>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button class="submit-btn btn btn-primary px-5" type="submit">Login</button>
                    </div>
                </form>
                <div class="counter-account-action text-center">
                    <span>Don't have an account yet? </span><a href="{{ url('/register') }}" class="text-nowrap text-decoration-none ">Create one</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body{

        background-color: #F0f0f0;
    }
    .schuhe-stroke-img{

        object-fit: cover;
        z-index: -1;
        width: 100%;
        max-height: 14vw;
        min-height: 170px;

    }
    .content-box{

    }
    .sub-container{

        margin-top: 5vw;
    }
    .greetings-text{

        font-size: 1.5rem;
        font-weight: 600;

    }
    .field-container{

        background-color: white;
        border-radius: 20px;
        margin-bottom: 100px;
    }
    .text-field-label{

        font-size: 1.25rem;
    }
    .text-field-input{

        font-size: 1.25rem;
        background-color: transparent;
        border: none;
        border-bottom: 2px solid black;
        border-radius: 0;
    }
    .check-box-input{

        font-size: 1rem;
        width: 25px;
        height: 25px;
    }
    .submit-btn{

        height: 50px;
        font-size: 1.25rem;
        border-radius: 5px;
    }
    .counter-account-action{

        text-decoration: none;
        font-size: 0.875rem;
    }

    @media screen only and(max-width: 768px){


    }

</style>
@endsection

<style>
    body{
        background-color: #F0f0f0;
        font-family: 'Onest', sans-serif;
    }
    .schuhe-stroke-img{

        object-fit: cover;
        z-index: -1;
        width: 100%;
        max-height: 14vw;
        min-height: 170px;

    }
    .sub-container{

        margin-top: 5vw;
    }
    .greetings-text{

        font-family: 'Onest', sans-serif;
        font-size: 1.5rem;
        font-weight: 600;

    }
    .field-container{

        background-color: white;
        border-radius: 20px;
        margin-bottom: 100px;
    }
    .text-field-label{

        font-size: 1.125rem;
    }
    .text-field-input{

        font-size: 1.125rem;
        background-color: transparent;
        border: none;
        border-bottom: 2px solid black;
        border-radius: 0;
    }
    .check-box-input{

        font-size: 1rem;
        width: 25px;
        height: 25px;
    }
    .submit-btn{

        height: 50px;
        font-size: 1.25rem;
        border-radius: 5px;
    }
    .counter-account-action{

        text-decoration: none;
        font-size: 0.875rem;
    }

    @media screen only and(max-width: 768px){


    }

</style>
@endsection

