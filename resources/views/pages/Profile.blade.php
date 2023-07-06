@extends('layout.Base')
@section('header-content')
<div class="float-left">
    <div class="page-header-title">
        <h5 class="m-b-10">PROFILE</h5>
    </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">sektor</a></li>
    </ul>
</div>
@endsection
@section('main-content')
<div class="card">
  <div class="card-header">
      <span class="d-block m-t-5">hati-hati dalam menghapus data parent karena akan menghapus data child</span>
  </div>
  <div class="card-body table-border-style">
    <div class="row mx-3 my-2">
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" id="id">
                <label for="telepon">Telepon</label>
                <input id="telepon" type="number" class="form-control" placeholder="--input disini--" autocomplete="off">
                <p id="alerttelepon" class="text-danger mt-2"></p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" placeholder="--input disini--" autocomplete="off">
                <p id="alertemail" class="text-danger mt-2"></p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group fill">
                <label class="" for="Text">Alamat</label>
                <p class="text-danger" id="alertalamat"></p>
                <textarea id="alamat" cols="30" rows="10" class="form-control" placeholder="--input disini--"></textarea>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group fill">
                <label class="" for="Text">Deskripsi</label>
                <p class="text-danger" id="alertdeskripsi"></p>
                <textarea id="deskripsi" cols="30" rows="5" class="form-control" placeholder="--input disini--"></textarea>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group fill">
                <label class="" for="Text">Visi</label>
                <p class="text-danger" id="alertvisi"></p>
                <textarea id="visi" cols="30" rows="10" class="form-control" placeholder="--input disini--"></textarea>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group fill">
                <label class="" for="Text">Misi</label>
                <p class="text-danger" id="alertmisi"></p>
                <textarea id="misi" cols="30" rows="10" class="form-control" placeholder="--input disini--"></textarea>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button onclick="postData()" class="btn btn-primary rounded float-right">SIMPAN</button>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script>
        const baseUrl = `{{ config('app.url') }}`

        function clearInput() {
            $('#alerttalamat'   ).val('')
            $('#alerttelepon'   ).val('')
            $('#alertemail'     ).val('')
            $('#alertvisi'      ).val('')
            $('#alertmisi'      ).val('')
            $('#alertdeskripsi' ).val('')
            $('#alertdidirikan' ).val('')
        }

        $(document).on('click', '#btn-del', function() {
            let dataId = $(this).data('id')
            Swal.fire({
                title             : 'Apakah anda yakin?',
                text              : "Data tidak dapat dipulihkan!",
                icon              : 'warning',
                showCancelButton  : true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor : '#d33',
                confirmButtonText : 'Yes, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title            : 'Waiting'         ,
                        text             : "Processing Data!",
                        allowOutsideClick: false             ,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    })
                    $.ajax({
                        url    : `${baseUrl}/api/v2/profile/${dataId}`,
                        type   : 'delete',
                        success: function(result) {
                            let data = result.data;
                            setTimeout(() => {
                                Swal.close()
                                getAllData()
                                iziToast.success({
                                    title   : 'Sukses'                ,
                                    message : 'Data berhasil dihapus!',
                                    position: 'topRight'
                                });
                            }, 500);
                        },
                        error: function(result) {
                            let data = result.responseJSON
                            Swal.fire({
                                icon     : 'error' ,
                                title    : 'Error' ,
                                text     : data.response.message,
                                position : 'topRight'
                            });
                        }
                    });
                }
            })
        })

        function postData() {
            const data = {
                id        : $('#id'        ).val(),
                email     : $('#email'     ).val(),
                telepon   : $('#telepon'   ).val(),
                alamat    : $('#alamat'    ).val(),
                visi      : $('#visi'      ).val(),
                misi      : $('#misi'      ).val(),
                deskripsi : $('#deskripsi' ).val(),
                didirikan : $('#didirikan' ).val(),
            }

            $.ajax({
                url        : `${baseUrl}/api/v2/profile/`,
                method     : "POST"                   ,
                data       : data                     ,
                success: function(res) {
                    $('#formModal').modal('hide')
                    iziToast.success({
                        title   : 'Sukses'                 ,
                        message : 'Data berhasil diproses!',
                        position: 'topRight'
                    });

                    getAllData()
                },
                error: function(err) {
                    if (err.status = 422) {
                        let data = err.responseJSON
                        let errorRes = data.errors;
                        if (errorRes.length >= 1) {
                            $.each(errorRes.data, (i, d) => {
                                $(`#alert${i}`).html(d)
                            })
                        }
                    } else {
                        iziToast.error({
                            title   : 'Error'                    ,
                            message : 'Server sedang maintenance',
                            position: 'topRight'
                        });
                    }
                },
                dataType   : "json"
            });
        }

        function getAllData() {
            $('#table-data').DataTable().destroy()
            $.get(`${baseUrl}/api/v2/profile`, (res) => {
                let data = res.data

                if (data) {
                    $.each(data, (i, d) => {
                        $(`#${i}`).val(d)
                    })
                }
            })
            .fail((err) => {
                iziToast.error({
                    title   : 'Error'                    ,
                    message : 'Server sedang maintenance',
                    position: 'topRight'
                });
            })
        }

        $(document).ready(function() 
        {
            getAllData()
        })
    </script>
@endsection