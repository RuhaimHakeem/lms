<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>EDGE</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, Bootstrap, Bootstrap 5, Angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask &amp; Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="../favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used by this page)-->
    <link href="../plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="../plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default" onload=display_ct()>
    <!--begin::Theme mode setup on page load-->
    <script>
    if (document.documentElement) {
        const defaultThemeMode = "system";
        const name = document.body.getAttribute("data-kt-name");
        let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value");
        if (themeMode === null) {
            if (defaultThemeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            } else {
                themeMode = defaultThemeMode;
            }
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="dashboardnew" class="d-lg-none">
                            <img alt="Logo" src="../media/logos/edge.png" class="h-40px" />

                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <div class="d-flex flex-column justify-content-center " style="color:#bfbfbf;font-size:12px">
                            <div id="ct"></div>
                            <script type="text/javascript">
                            function display_c() {
                                var refresh = 1000; // Refresh rate in milli seconds
                                mytime = setTimeout('display_ct()', refresh)
                            }

                            function display_ct() {
                                var x = new Date()
                                document.getElementById('ct').innerHTML = x;
                                display_c();
                            }
                            </script>
                        </div>
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->

                                <!--end:Menu item-->
                                <!--begin:Menu item-->

                                <!--end:Menu item-->
                                <!--begin:Menu item-->

                                <!--end:Menu item-->
                                <!--begin:Menu item-->

                                <!--end:Menu item-->
                                <!--begin:Menu item-->

                                <!--end:Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::Search-->

                            <!--end::Search-->
                            <!--begin::Activities-->

                            <!--end::Activities-->
                            <!--begin::Notifications-->

                            <!--end::Notifications-->
                            <!--begin::Chat-->

                            <!--end::Chat-->
                            <!--begin::Quick links-->

                            <!--end::Quick links-->
                            <!--begin::Theme mode-->

                            <!--end::Theme mode-->
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                                    data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <div class="d-flex align-items-center">
                                        <h3 style="color:white" class="mt-3">{{$admin->name}}</h3><img
                                            src="../media/logos/profile.png" alt="user" />
                                    </div>
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-150px"
                                    data-kt-menu="true">

                                    <div class="menu-item px-5">
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" href="logout"
                                                class="menu-link px-5 mx-4 btn btn-light">Sign
                                                Out</button>
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                            <!--begin::Header menu toggle-->

                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="/admindashboard">
                            <img alt="Logo" src="../media/logos/edgelogo.png" class="h-35px app-sidebar-logo-default" />
                            <img alt="Logo" src="../media/logos/edge.png" class="h-30px app-sidebar-logo-minimize" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Sidebar toggle-->
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                            <span class="svg-icon svg-icon-2 rotate-180">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                            data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                                data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                        fill="currentColor" />
                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                        fill="currentColor" />
                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Dashboards</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link " href="../admindashboard">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Home</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->

                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->

                                    <!--end:Menu sub-->
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                        fill="currentColor" />
                                                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Leads</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="/admindashboard/leadsummary">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Summary</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class='menu-link' href="/admindashboard/viewleads">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Profiles</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="/admindashboard/leadupload">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Upload</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="../assignleads">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Assign</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->

                                <!--end:Menu item-->
                                <!--begin:Menu item-->

                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Agents</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="/admindashboard/agentsummary">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Summary</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="/admindashboard/viewagents">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Profiles</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="../agentregister">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Agent Registration</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Status</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>




                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->
                    <!--begin::Footer-->
                    <footer class="d-flex justify-content-end mb-2 px-2 page-footer footer fixed-bottom font-small pt-5"
                        style="color:gray;font-size:10px">
                        <div class="d-flex px-2">
                            <img alt="Logo" src="../media/logos/prag.png" class="h-15px" style="margin-right:0.2rem" />
                            <p class="mb-0 fw-semibold" target="_blank">Engineered by PragICTS | </p>
                        </div>
                        <p class="mb-0 fw-semibold h-1px" target="_blank">https://pragicts.com | edge@pragicts.com</p>
                    </footer>
                </div>
                <!--end::sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->

                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->

                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->

                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content"
                            class="app-content flex-column-fluid col-6 col-sm-6  col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                            <!--begin::Content container-->


                            <form class="form w-100 px-5 " action="/updateagent/{{$agent->id}}" method="post">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                @csrf

                                <div class="mb-10">

                                    <h2 style="font-size:20px">AGENT UPDATE </h2>


                                    <!--end::Title-->
                                    <!--begin::Subtitle-->

                                    <!--end::Subtitle=-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Login options-->

                                <!--end::Login options-->
                                <!--begin::Separator-->

                                <!--end::Separator-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <!--begin::User-->
                                    <input type="text" placeholder="First Name" name="firstname" autocomplete="off"
                                        class="form-control bg-transparent" value={{$agent->first_name}}>
                                    <span class="text-danger">@error('firstname') {{$message}} @enderror</span>
                                    <!--end::User-->
                                </div>

                                <div class="fv-row mb-8">
                                    <!--begin::User-->
                                    <input type="text" placeholder="Last Name" name="lastname" autocomplete="off"
                                        class="form-control bg-transparent" value={{$agent->last_name}}>
                                    <span class="text-danger">@error('lastname') {{$message}} @enderror</span>
                                    <!--end::User-->
                                </div>

                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                    <input type="email" placeholder="Email Address" name="email" autocomplete="off"
                                        class="form-control bg-transparent" value={{$agent->email}}>
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                    <!--end::Email-->
                                </div>

                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                    <input type="password" placeholder="Password" name="password" autocomplete="off"
                                        class="form-control bg-transparent">
                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                    <!--end::Email-->
                                </div>

                                <div class="d-flex fv-row mb-8">
                                    <label class="me-6 form-control bg-transparent " for="">DOB</label>
                                    <input class="form-control bg-transparent" type="date" id="dob" name="dob"
                                        value={{$agent->dob}}>
                                </div>

                                <script>
                                function onlyOne(checkbox) {
                                    var checkboxes = document.getElementsByName('gender')
                                    checkboxes.forEach((item) => {
                                        if (item !== checkbox) item.checked = false
                                    })
                                }
                                </script>


                                <div class="fv-row mb-8 d-flex align-items-center justify-content-between">
                                    <label class="me-6 form-control bg-transparent" for="">Gender</label>
                                    <div class="form-check pe-4">
                                        <input type="checkbox" class="form-check-input" onclick="onlyOne(this)"
                                            id="male" name="gender" value="male"
                                            {{ ($agent->gender=="male") ? "checked" : "" }}>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" onclick="onlyOne(this)"
                                            id="female" name="gender" value="female"
                                            {{ ($agent->gender=="female") ? "checked" : "" }}>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>

                                </div>

                                <div class="fv-row mb-8">
                                    <!--begin::Phone-->
                                    <input type="text" placeholder="Phone Number" name="phone" autocomplete="off"
                                        class="form-control bg-transparent" value={{$agent->phonenumber}}>
                                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                                    <!--end::Phone-->
                                </div>

                                <!--begin::Link-->

                                <!--end::Link-->
                                <!--end::Wrapper-->
                                <!--begin::Submit button-->
                                <div class="d-flex mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Update Agent</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </button>

                                </div>
                                <!--end::Submit button-->
                                <!--begin::Sign up-->

                            </form>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->

                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->


    <!--begin::Javascript-->
    <script>
    var hostUrl = "../";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="../plugins/global/plugins.bundle.js"></script>
    <script src="../js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used by this page)-->
    <script src="../plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="../plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="../js/widgets.bundle.js"></script>
    <script src="../js/custom/widgets.js"></script>
    <script src="../js/custom/apps/chat/chat.js"></script>
    <script src="../js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="../js/custom/utilities/modals/create-app.js"></script>
    <script src="../js/custom/utilities/modals/new-target.js"></script>
    <script src="../js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>