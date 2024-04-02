@extends('layouts.shop')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this
                                is the</p>
                            <a class="primary-btn" href="{{ route('shop.login') }}">Back To Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Get Started</h3>
                        <form class="row login_form" id="registerForm"
                            novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="firstName"
                                    placeholder="First name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'First name'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="lastName"
                                    placeholder="Last Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Last Name'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="email"
                                    placeholder="Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Email'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="mobile"
                                    placeholder="Mobile" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Mobile'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="button" value="submit" class="primary-btn" onclick="register()">Register</button>
                                <a href="#">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->
@endsection


<script>
   function register() {
       const form = document.getElementById("registerForm");

        useFetch("/auth/register", {
            method: "POST",
            body: {
                first_name: form.firstName.value,
                last_name: form.lastName.value,
                email: form.email.value,
                password: form.password.value,
                mobile: form.mobile.value
            },
            onSuccess: (data) => {
                window.location = "/login";
            },
        });
   }
</script>