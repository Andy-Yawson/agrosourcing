@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{ route('admin.view.farm') }}" class="text-decoration-none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of farms</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{count($farms)}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-landmark fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{ route('admin.view.product') }}" class="text-decoration-none">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of Processing Company</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{count($products)}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{ route('admin.view.warehouse') }}" class="text-decoration-none">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of Warehouses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{count($warehouses)}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-house-damage fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        @if(auth()->user()->level == 1)
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Orders Placed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{count($orders)}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @if(auth()->user()->level == 1)
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1>{{ $chart->options['chart_title'] }}</h1>
            {!! $chart->renderHtml() !!}
        </div>
    </div>
    @endif
@endsection
@section('scripts')
    {!! $chart->renderChartJsLibrary() !!}
    {!! $chart->renderJs() !!}
@endsection
