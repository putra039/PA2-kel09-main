@extends('layouts/master')
@section('body')
    <div id="remoteModelData" class="modal fade" role="dialog"></div>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Tambah Penduduk</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('create-penduduk') }}" data-toggle="validator"
                                id="penduduk_form">
                                @csrf
                                <div class="row align-items-center">
                                    <div class="form-group col-sm-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" style="background-color: rgba(128, 128, 128, 0.1); border : 1px solid rgba(0, 0, 0, 0.2);" placeholder="Masukkan nama lengkap"
                                        required autofocus>
                                        <div id="nama_error" class="error-message"></div>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                                        <div id="nik_error" class="error-message"></div>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="no_telp">No Telepon</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No Telepon">
                                        <div id="no_telp_error" class="error-message"></div>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" style="background-color: rgba(128, 128, 128, 0.1); border : 1px solid rgba(0, 0, 0, 0.2);" placeholder="Masukkan Tempat Lahir">
                                        <div id="tempat_lahir_error" class="error-message"></div>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" style="background-color: rgba(128, 128, 128, 0.1); border : 1px solid rgba(0, 0, 0, 0.2);" placeholder="Masukkan Tanggal Lahir" onchange="calculateAge()">
                                        <div id="tanggal_lahir_error" class="error-message"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="usia">Usia</label>
                                        <input type="text" class="form-control" id="usia" name="usia" placeholder="Akan otomatis muncul ketika tanggal lahir dimasukkan" readonly style="background-color: white">
                                        <div id="usia_error" class="error-message"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" >
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <div id="jenis_kelamin_error" class="error-message"></div>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" style="background-color: rgba(128, 128, 128, 0.1); border : 1px solid rgba(0, 0, 0, 0.2);" placeholder="Masukkan Pekerjaan">
                                        <div id="pekerjaan_error" class="error-message"></div>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="agama">Agama</label>
                                        <select class="form-control" id="agama" name="agama" style="background-color: rgba(128, 128, 128, 0.1); border : 1px solid rgba(0, 0, 0, 0.2);" >
                                            <option value="">Pilih Agama atau Aliran Kepercayaan</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                            <option value="Aliran Kepercayaan">Aliran Kepercayaan</option>
                                        </select>
                                        <div id="agama_error" class="error-message"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="kk">No KK</label>
                                        <input class="form-control" id="kk" name="kk" placeholder="Masukkan KK">
                                        <div id="kk_error" class="error-message"></div>

                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="5" style="line-height: 22px; background-color: rgba(128, 128, 128, 0.1); border : 1px solid rgba(0, 0, 0, 0.2);" placeholder="Masukkan Alamat"></textarea>
                                        <div id="alamat_error" class="error-message"></div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="password">Password </label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Masukkan Password akun warga yang akan digunakan warga nantinya"
                                            required autofocus>
                                        <div id="password_error" class="error-message"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="button" class="btn bg-danger" id="cancel_button">Cancel</button>
                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#penduduk_form').submit(function(event) {
                event.preventDefault(); // Prevent form submission

                // Perform AJAX request
                $.ajax({
                    url: $(this).attr('action'), // Use form action attribute for the URL
                    type: 'POST', // or 'GET', 'PUT', etc.
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        // Handle successful response
                        if (response.status === 'error') {
                            // Show error message using SweetAlert
                            Swal.fire('Error!', response.message, 'error');
                        } else {
                            // Validation passed, redirect to index page
                            window.location.href = '{{ route('penduduk.index') }}';
                        }
                    },
                    error: function(xhr) {
                        // Handle error response
                        Swal.fire('Error!', 'AJAX request failed!', 'error');
                    }
                });
            });

            // Cancel button click event
            $('#cancel_button').click(function() {
                // Redirect to index page
                window.location.href = '{{ route('penduduk.index') }}';
            });
        });
    </script>
    <script>
        function calculateAge() {
            var tanggalLahir = document.getElementById("tanggal_lahir").value;
            var today = new Date();
            var birthDate = new Date(tanggalLahir);
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById("usia").value = age;
        }
    </script>
@endsection
