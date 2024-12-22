<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <base href="../../../" />
    <title>Zaytonaah</title>
    <meta charset="utf-8" />
    <meta name="description" content="Top Web Development and Training Agency" />
    <meta name="keywords"
        content="zaytonaah, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="ar" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Zaytonaah - The Top Web Development and Training Agency" />
    <meta property="og:url" content="https://zaytonaah.com/" />
    <meta property="og:site_name" content="Zaytonaah" />
    <link rel="canonical" href="https://zaytonaah.com/" />
    <link rel="shortcut icon" href="{{ asset('assets') }}/media/logos/icon_light.svg" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets') }}/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    @yield('styles')
    @yield('headerScripts')
    @livewireStyles
</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true"
    data-kt-app-header-secondary-enabled="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('components.layout.navbar')
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('components.layout.sidebar')
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        @include('components.layout.toolbar')
                        <div id="kt_app_content" class="app-content  flex-column-fluid ">
                            <div id="kt_app_content_container" class="app-container  container-fluid ">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    @include('components.layout.footer')
                </div>
            </div>
        </div>
    </div>
    @include('components.layout.scroll-top')
    <script>
        var hostUrl = "{{ asset('assets') }}/";
    </script>
    <script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
    @livewireScripts
    @yield('footerScripts')
</body>

</html>
