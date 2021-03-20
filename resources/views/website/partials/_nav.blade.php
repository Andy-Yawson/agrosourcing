<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-3 shadow-sm bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.home') }}">
            <img src="{{ asset('web/img/agro.jpg') }}" alt="" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.sourcemap') }}">SourceMap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web.upcycling')}}">UpCycling</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web.research')}}">Our Research</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web.contact')}}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web.marketplace')}}">Marketplace</a>
                </li>
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="btn btn-primary pl-4 pr-4" href="{{route('user.welcome')}}">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary pl-4 pr-4" href="{{route('user.login')}}">Login <i class="fa fa-user-circle"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
