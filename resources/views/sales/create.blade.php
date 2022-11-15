@extends('layouts.main', ['activePage' => 'sales', 'titlePage' => __('Ventas')])

@section('content')
    <div class="content" id='report'>
        <form action="{{ route('sales.store') }}" method="POST" id="add-sale">
            @csrf

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-muted border-bottom">{{ Carbon\Carbon::now() }}</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($tables as $table)
                                        <div class="col-sm-3">
                                            <div
                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                                                <div class="align-self-end mb-2">
                                                    <input type="checkbox" name="table_id[]" id="table"
                                                        value="{{ $table->id }}">

                                                </div>
                                                <i class="material-icons fa-5x">table_restaurant</i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
