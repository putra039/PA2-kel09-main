@extends('layouts.master')
@section('body')
    <div id="remoteModelData" class="modal fade" role="dialog"></div>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="font-weight-bold">Daftar Saran</h4>
                        </div>
                        <div class="create-workform">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="modal-product-search d-flex">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch">
                                <div class="card-body p-0">
                                    <div class="d-flex justify-content-between align-items-center p-3">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table data-table mb-0">
                                            <thead class="table-color-heading">
                                                <tr class="">
                                                    <th scope="col" class="pr-0 w-01">
                                                        <div class="d-flex justify-content-start align-items-end mb-1 ">
                                                            <div
                                                                class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input m-0"
                                                                    id="customCheck1">
                                                                <label class="custom-control-label"
                                                                    for="customCheck1"></label>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th scope="col">
                                                        Nama
                                                    </th>
                                                    <th scope="col">
                                                        Saran
                                                    </th>
                                                    <th scope="col" class="text-right">
                                                        Aksi
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($saran as $saran)
                                                    <tr class="white-space-no-wrap">
                                                        <td class="pr-0 ">
                                                            <div
                                                                class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input m-0"
                                                                    id="customCheck" value="{{ $saran->user_id }}">
                                                                <label class="custom-control-label"
                                                                    for="customCheck"></label>
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                            <div class="active-project-1 d-flex align-items-center mt-0 ">
                                                                <div class="data-content">
                                                                    <div>
                                                                        <a href="#"
                                                                            class="font-weight-bold">{{ $saran->user_name }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $saran->saran}}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end align-items-center">

                                                                <a class="badge bg-danger" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="Delete" href="#"
                                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')){ deleteSaran({{ $saran->id }}); }">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Saran</title>
</head>
<body>
    <h1>Daftar Saran</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Saran</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($saran as $index => $saran)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->jenis_saran }}</td>
                <td>{{ $user->deskripsi }}</td>
                <td>{{ $user->file }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}
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
    <script>
        function deleteSaran(id) {
            $.ajax({
                url: '/saran/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    // Handle success response here
                    window.location.href = "{{ route('saran.index') }}";
                    console.log('Record deleted successfully');
                },
                error: function() {
                    // Handle error response here
                    console.log('An error occurred while deleting the record');
                }
            });
        }
    </script>
@endsection
