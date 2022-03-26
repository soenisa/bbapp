<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI for Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/css/coreui.min.css" rel="stylesheet" {{--
        integrity="sha384-4RjTy+ihDlYQqAQJodVMv1QuiX0mRlR0xtuKKu1P8I2TxVdGPXaW+VxJ6PirwMm4" --}}
        crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="vsc-initialized">

    {{-- Sidebar --}}
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <li class="nav-item"><a class="nav-link" href="index.html">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                                        </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
                                <li class="nav-title">Theme</li>
                                <li class="nav-item"><a class="nav-link" href="colors.html">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                                        </svg> Colors</a></li>
                                <li class="nav-item"><a class="nav-link" href="typography.html">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                        </svg> Typography</a></li>
                                <li class="nav-title">Components</li>
                                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                                        </svg> Base</a>
                                    <ul class="nav-group-items">
                                        <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span
                                                    class="nav-icon"></span> Accordion</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span
                                                    class="nav-icon"></span> Breadcrumb</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/cards.html"><span
                                                    class="nav-icon"></span> Cards</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/carousel.html"><span
                                                    class="nav-icon"></span> Carousel</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/collapse.html"><span
                                                    class="nav-icon"></span> Collapse</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/list-group.html"><span
                                                    class="nav-icon"></span> List group</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/navs.html"><span
                                                    class="nav-icon"></span> Navs</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/pagination.html"><span
                                                    class="nav-icon"></span> Pagination</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/popovers.html"><span
                                                    class="nav-icon"></span> Popovers</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/progress.html"><span
                                                    class="nav-icon"></span> Progress</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/scrollspy.html"><span
                                                    class="nav-icon"></span> Scrollspy</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/spinners.html"><span
                                                    class="nav-icon"></span> Spinners</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/tables.html"><span
                                                    class="nav-icon"></span> Tables</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/tabs.html"><span
                                                    class="nav-icon"></span> Tabs</a></li>
                                        <li class="nav-item"><a class="nav-link" href="base/tooltips.html"><span
                                                    class="nav-icon"></span> Tooltips</a></li>
                                    </ul>
                                </li>
                                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
                                        </svg> Buttons</a>
                                    <ul class="nav-group-items">
                                        <li class="nav-item"><a class="nav-link" href="buttons/buttons.html"><span
                                                    class="nav-icon"></span> Buttons</a></li>
                                        <li class="nav-item"><a class="nav-link" href="buttons/button-group.html"><span
                                                    class="nav-icon"></span> Buttons Group</a></li>
                                        <li class="nav-item"><a class="nav-link" href="buttons/dropdowns.html"><span
                                                    class="nav-icon"></span> Dropdowns</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="charts.html">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                                        </svg> Charts</a></li>
                                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
                                        </svg> Forms</a>
                                    <ul class="nav-group-items">
                                        <li class="nav-item"><a class="nav-link" href="forms/form-control.html"> Form
                                                Control</a></li>
                                        <li class="nav-item"><a class="nav-link" href="forms/select.html"> Select</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="forms/checks-radios.html"> Checks
                                                and radios</a></li>
                                        <li class="nav-item"><a class="nav-link" href="forms/range.html"> Range</a></li>
                                        <li class="nav-item"><a class="nav-link" href="forms/input-group.html"> Input
                                                group</a></li>
                                        <li class="nav-item"><a class="nav-link" href="forms/floating-labels.html">
                                                Floating labels</a></li>
                                        <li class="nav-item"><a class="nav-link" href="forms/layout.html"> Layout</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="forms/validation.html">
                                                Validation</a></li>
                                    </ul>
                                </li>
                                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                                        </svg> Icons</a>
                                    <ul class="nav-group-items">
                                        <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-free.html">
                                                CoreUI Icons<span
                                                    class="badge badge-sm bg-success ms-auto">Free</span></a></li>
                                        <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-brand.html">
                                                CoreUI Icons - Brand</a></li>
                                        <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-flag.html">
                                                CoreUI Icons - Flag</a></li>
                                    </ul>
                                </li>
                                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                                        </svg> Notifications</a>
                                    <ul class="nav-group-items">
                                        <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span
                                                    class="nav-icon"></span> Alerts</a></li>
                                        <li class="nav-item"><a class="nav-link" href="notifications/badge.html"><span
                                                    class="nav-icon"></span> Badge</a></li>
                                        <li class="nav-item"><a class="nav-link" href="notifications/modals.html"><span
                                                    class="nav-icon"></span> Modals</a></li>
                                        <li class="nav-item"><a class="nav-link" href="notifications/toasts.html"><span
                                                    class="nav-icon"></span> Toasts</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="widgets.html">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
                                        </svg> Widgets<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
                                <li class="nav-divider"></li>
                                <li class="nav-title">Extras</li>
                                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                                        </svg> Pages</a>
                                    <ul class="nav-group-items">
                                        <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                                                <svg class="nav-icon">
                                                    <use
                                                        xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                                    </use>
                                                </svg> Login</a></li>
                                        <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                                                <svg class="nav-icon">
                                                    <use
                                                        xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                                    </use>
                                                </svg> Register</a></li>
                                        <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
                                                <svg class="nav-icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                                                </svg> Error 404</a></li>
                                        <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
                                                <svg class="nav-icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                                                </svg> Error 500</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item mt-auto"><a class="nav-link" href="docs.html">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                                        </svg> Docs</a></li>
                                <li class="nav-item"><a class="nav-link nav-link-danger" href="https://coreui.io/pro/"
                                        target="_top">
                                        <svg class="nav-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                                        </svg> Try CoreUI
                                        <div class="fw-semibold">PRO</div>
                                    </a></li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 841px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 199px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>

    {{-- Wrapper --}}
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>
                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                </ul>
                <ul class="header-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                            </svg></a></li>
                </ul>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg"
                                    alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                                </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a
                                class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a
                                class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                                </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a
                                class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                                </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Settings</div>
                            </div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Profile</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Settings</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                                </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a
                                class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg> Lock Account</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <span>Home</span>
                        </li>
                        <li class="breadcrumb-item active"><span>Dashboard</span></li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
             <!-- Page Content -->
            {{ $slot }}
        </div>
    </div>

   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/js/coreui.bundle.min.js" {{--
        integrity="sha384-PXOm0LjM7kBY7at2HNqu2pAJsTVQUPRzpJSwQD0V//zsjFAcv61qjiZj3ELesLb1" --}}
        crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and CoreUI for Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/js/coreui.min.js" integrity="sha384-85mv4P1wdLGe7AOAJKs31hW8LZHApEb3/mOieV4JbvF2v99+TmYLrpvmlj9edI/C" crossorigin="anonymous"></script>
    -->
</body>

</html>


{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html> --}}