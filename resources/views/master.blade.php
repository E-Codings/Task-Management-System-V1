<!doctype html>

<html
    lang="en"
    class="layout-menu-fixed layout-compact"
    data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="robots" content="noindex, nofollow"/>

    <title>Demo: Dashboard - Analytics | Materio - Bootstrap Dashboard FREE</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/iconify-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}"/>
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <div
            class="bs-toast toast toast-placement-ex m-2 end-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
            data-bs-delay="2000">
            <div class="toast-header">
                <i class="icon-base ri icon-sm me-2"></i>
                <div class="me-auto fw-medium toast-title">Success</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <hr color="white" class="m-0">
            <div class="toast-body">Hello, world! This is a toast message.</div>
        </div>
        @if(Session::has('success'))
            <script>
                let message = @json(Session::get('success'));
                show_toast('success', message);
            </script>
        @endif
        @if(Session::has('error'))
            <script>
                let message = @json(Session::get('error'));
                show_toast('error', message);
            </script>
        @endif
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="/" class="app-brand-link">
              <span class="app-brand-logo demo me-1">

              </span>
                    <span class="app-brand-text demo menu-text fw-semibold ms-2">Materio</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="menu-toggle-icon d-xl-inline-block align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboards -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                        <div data-i18n="Dashboards">Dashboards</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a
                                href="#"
                                target="_blank"
                                class="menu-link">
                                <div data-i18n="CRM">Overview</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a
                                href="{{route('role.permission')}}"
                                target="_blank"
                                class="menu-link">
                                <div data-i18n="CRM">Role and Permission</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="{{route('user.index')}}" class="menu-link">
                        <i class="menu-icon icon-base ri ri-account-box-2-line"></i>
                        <div>Users</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

            <nav
                class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                        <i class="icon-base ri ri-menu-line icon-md"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a
                                class="nav-link dropdown-toggle hide-arrow p-0"
                                href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img
                                        src="{{Auth::user()->profile ? Auth::user()->profile : asset('assets/img/avatars/1.png')}}"
                                        alt="alt" class="rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img
                                                        src="{{Auth::user()->profile ? Auth::user()->profile : asset('assets/img/avatars/1.png')}}"
                                                        alt="alt" class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{Auth::user()->fullName()}}</h6>
                                                <small class="text-body-secondary">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="icon-base ri ri-user-line icon-md me-3"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('show-change-password')}}">
                                        <i class="icon-base ri ri-settings-4-line icon-md me-3"></i>
                                        <span>Change Password</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <div class="d-grid px-4 pt-2 pb-1">
                                        <a class="btn btn-danger d-flex" href="/logout">
                                            <small class="align-middle">Logout</small>
                                            <i class="ri ri-logout-box-r-line ms-2 ri-xs"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                @yield('content')
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div
                            class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                &#169;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium"
                                >ThemeSelection</a
                                >
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<div class="buy-now">
    <a
        href="https://www.facebook.com/profile.php?id=61577601053145"
        target="_blank"
        class="btn btn-danger btn-buy-now"
    >Another course</a
    >
</div>

<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/js/menu.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
