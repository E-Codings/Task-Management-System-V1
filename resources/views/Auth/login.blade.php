<!doctype html>

<html
    lang="en"
    class="layout-wide customizer-hide"
    data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />

    <title>E-Coding Login</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/iconify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
</head>

<body>

<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6 mx-4">
            <div class="card p-sm-7 p-2">
                <div class="app-brand justify-content-center mt-5">
                    <a href="/" class="app-brand-link gap-3">
                        <span class="app-brand-logo demo">
                          <img src="{{asset('assets/img/avatars/E-Coding.png')}}" alt="logo" width="60" />
                        </span>
                        <span class="app-brand-text demo text-heading fw-semibold">E-Coding</span>
                    </a>
                </div>

                <div class="card-body mt-1">
                    <h4 class="mb-1">Welcome to E-Coding! 👋🏻</h4>
                    <p class="mb-5">Please sign-in to your account to explore your task.</p>

                    <form id="formAuthentication" class="mb-5" action="{{route('login.submit')}}" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                autofocus />
                            <label for="email">Email</label>
                            @error('email') <span class="text-danger" style="font-size: 12px"> {{$message}} </span> @enderror
                        </div>
                        <div class="mb-5">
                            <div class="form-password-toggle form-control-validation">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control"
                                            name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"
                                    ><i class="icon-base ri ri-eye-off-line icon-20px"></i
                                        ></span>
                                </div>
                                @error('password')<span class="text-danger" style="font-size: 12px"> {{$message}} </span>@enderror
                            </div>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary d-grid w-100" type="submit">login</button>
                        </div>
                        @if(Session::has('error'))
                            <span class="text-danger" style="font-size: 12px"> {{Session::get('error')}} </span>
                        @endif
                    </form>
                </div>
            </div>
            <img
                src="{{asset('assets/img/illustrations/tree-3.png')}}"
                alt="auth-tree"
                class="authentication-image-object-left d-none d-lg-block" />
            <img
                src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}"
                class="authentication-image d-none d-lg-block scaleX-n1-rtl"
                height="172"
                alt="triangle-bg" />
            <img
                src="{{asset('assets/img/illustrations/tree.png')}}"
                alt="auth-tree"
                class="authentication-image-object-right d-none d-lg-block" />
        </div>
    </div>
</div>
<div class="buy-now">
    <a
        href="https://www.facebook.com/profile.php?id=61577601053145"
        target="_blank"
        class="btn btn-danger btn-buy-now"
    >Another course</a
    >
</div>
<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
