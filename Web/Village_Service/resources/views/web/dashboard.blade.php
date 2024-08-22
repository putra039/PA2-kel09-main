@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.1.2/css/highcharts.min.css">
@section('body')
<div id="remoteModelData" class="modal fade" role="dialog"></div>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4 mt-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="font-weight-bold">Overview</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-2 text-secondary">Total User</p>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-0 font-weight-bold">{{$total_user}}</h5>
                                            <p class="mb-0 ml-3 text-success font-weight-bold"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-2 text-secondary">Jumlah Laki-laki</p>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-0 font-weight-bold"><?php echo $totalMale; ?></h5>
                                            <p class="mb-0 ml-3 text-success font-weight-bold"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-2 text-secondary">Jumlah Perempuan</p>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-0 font-weight-bold"><?php echo $totalFemale; ?></h5>
                                            <p class="mb-0 ml-3 text-danger font-weight-bold"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Upcoming Events</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-spacing mb-0">
                                <tbody>
                                @foreach($pengumuman as $item)
                                <tr class="white-space-no-wrap">
                                    <td>
                                        <h6 class="mb-0 text-uppercase text-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="pr-2" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $item->tanggal }}</h6>
                                    </td>
                                    <td class="pl-0 py-3">
                                        {{ $item->judul }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="d-flex justify-content-start align-items-center border-top-table p-3">
                            <button class="btn btn-secondary btn-sm"><a href="{{ route('pengumuman.index') }}">See All</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/auth/js/backend-bundle.min.js') }}"></script>


    <!-- Flextree Javascript-->
    <script src="{{ asset('assets/auth/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ 'assets/auth/js/table-treeview.js' }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('assets/auth/js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('assets/auth/js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/auth/js/customizer.js') }}"></script>

    <script src="{{ asset('assets/auth/vendor/Leaflet/leaflet.js') }}"></script>

    <script src="{{ asset('assets/auth/vendor/vanillajs-datepicker/dist/js/datepicker-full.js') }}"></script>

    <script src="{{ asset('assets/auth/js/charts/progressbar.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/auth/js/chart-custom.js') }}"></script>
    <script src="{{ asset('assets/auth/js/charts/01.js') }}"></script>
    <script src="{{ asset('assets/auth/js/charts/02.js') }}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('assets/auth/js/slider.js') }}"></script>

    <!-- Emoji picker -->
    <script src="{{asset('assets/auth/vendor/emoji-picker-element/index.js')}}" type="module"></script>
    <!-- app JavaScript -->
    <script src="{{ asset('assets/auth/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.1.2/highcharts.js"></script>
    <script>
                    var users = @json($users);

// Buat chart menggunakan Highcharts dengan jenis chart donut
Highcharts.chart('chartContainer', {
    chart: {
        type: 'pie' // Ubah menjadi chart donut (pie chart)
    },
    title: {
        text: 'Total Penduduk berdasarkan Usia'
    },
    plotOptions: {
        pie: {
            innerSize: '50%', // Mengatur ukuran dalam donut
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    tooltip: {
        formatter: function() {
            return `Jumlah Penduduk: ${this.y}`;
        }
    },
    legend: {
        labelFormatter: function() {
            return `<span style="color: ${this.color}">${this.name}</span>`;
        }
    },
    series: [{
        name: 'Total User',
        data: [
            { name: 'Anak-anak (1-10)', y: users['Anak-anak'] || 0 },
            { name: 'Remaja (11-17)', y: users['Remaja'] || 0 },
            { name: 'Dewasa (18-30)', y: users['Dewasa'] || 0 },
            { name: 'Orang Tua (31-50)', y: users['Orang Tua'] || 0 },
            { name: 'Lansia (51+)', y: users['Lansia'] || 0 }
        ]
    }]
});

    </script>
    <script>
        (function($) {
            "use strict";

            $(document).ready(function() {
                $('.select2js').select2();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.loadRemoteModel', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');

                    if (url.indexOf('#') == 0) {
                        $(url).modal('open');
                    } else {
                        $.get(url, function(data) {
                            $('#remoteModelData').html(data);
                            $('#remoteModelData').modal();
                            $('form').validator();
                            $(".datepicker").flatpickr({
                                dateFormat: "d-m-Y"
                            });
                        });
                    }
                });

                $(document).on('click', '[data-form="ajax"]', function(f) {
                    $('form').validator('update');
                    f.preventDefault();
                    var current = $(this);
                    current.addClass('disabled');
                    var form = $(this).closest('form');
                    var url = form.attr('action');
                    var fd = new FormData(form[0]);

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: fd, // serializes the form's elements.
                        success: function(e) {
                            if (e.status == true) {
                                if (e.event == "submited") {
                                    showMessage(e.message);
                                    $(".modal").modal('hide');
                                }
                                if (e.event == 'refresh') {
                                    // showMessage(e.message);
                                    window.location.reload();
                                }
                                if (e.event == "callback") {
                                    showMessage(e.message);
                                    $(".modal").modal('hide');
                                    location.reload();
                                }
                            }
                            if (e.status == false) {
                                if (e.event == 'validation') {
                                    errorMessage(e.message);
                                }
                            }
                        },
                        error: function(error) {

                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                    });
                    f.preventDefault(); // avoid to execute the actual submit of the form.

                });

                $(document).ready(function() {

                    $(document).on('change', '.change_status', function() {

                        var status = $(this).prop('checked') == true ? 1 : 0;
                        console.log(status)
                        var id = $(this).attr('data-id');
                        var type = $(this).attr('data-type');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "https://templates.iqonic.design/datum/laravel/public/changeStatus",
                            data: {
                                'status': status,
                                'id': id,
                                'type': type
                            },
                            success: function(data) {
                                alert(data.message);
                            }
                        });
                    })
                })

                $(document).on('click', '[data-toggle="tabajax"]', function(e) {
                    e.preventDefault();
                    var selectDiv = this;
                    ajaxMethodCall(selectDiv);
                });

                function ajaxMethodCall(selectDiv) {

                    var $this = $(selectDiv),
                        loadurl = $this.attr('data-href'),
                        targ = $this.attr('data-target'),
                        id = selectDiv.id || '';

                    $.post(loadurl, function(data) {
                        $(targ).html(data);
                        $('form').append('<input type="hidden" name="active_tab" value="' + id +
                        '" />');
                    });

                    $this.tab('show');
                    return false;
                }

                $('form[data-toggle="validator"]').on('submit', function(e) {
                    window.setTimeout(function() {
                        var errors = $('.has-error')
                        if (errors.length) {
                            $('html, body').animate({
                                scrollTop: "0"
                            }, 500);
                            e.preventDefault()
                        }
                    }, 0);
                });
            });
        })(jQuery);
    </script>
@endsection
