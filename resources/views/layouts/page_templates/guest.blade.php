@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black"
        style="background-image: url('{{ asset('img/login.jpg') }}'); background-size: cover; background-position: top center;align-items: center;"
        data-color="orange">
        @yield('content')
        @include('layouts.footers.guest')
    </div>
</div>
