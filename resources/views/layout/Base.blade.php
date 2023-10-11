<!DOCTYPE html>
<html lang="en">

@include('layout.Head')

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    @include('layout.NavHeader')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            @yield('header-content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @yield('main-content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Required Js -->
        <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/ripple.js') }}"></script>
        <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>


    <!-- prism Js -->
    <script src="{{ asset('assets/js/plugins/prism.js') }}"></script>

    



    <script src="{{ asset('assets/js/horizontal-menu.js') }}"></script>
    <script>
        (function() {
            if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
                return;
            }
            try {
                window.layoutHelpers._getSetting("Rtl")
                window.layoutHelpers.setCollapsed(
                    localStorage.getItem('layoutCollapsed') === 'true',
                    false
                );
            } catch (e) {}
        })();
        $(function() {
            $('#layout-sidenav').each(function() {
                new SideNav(this, {
                    orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
                });
            });
            $('body').on('click', '.layout-sidenav-toggle', function(e) {
                e.preventDefault();
                window.layoutHelpers.toggleCollapsed();
                if (!window.layoutHelpers.isSmallScreen()) {
                    try {
                        localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                    } catch (e) {}
                }
            });
        });
        $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                themelayout: 'horizontal',
                MenuTrigger: 'hover',
                SubMenuTrigger: 'hover',
            });
        });
    </script>

    <script src="{{ asset('assets/js/analytics.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/izitoast/js/iziToast.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js" integrity="sha256-2Dbg51yxfa7qZ8CSKqsNxHtph8UHdgbzxXF9ANtyJHo=" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>
