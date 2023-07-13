@extends('layout.Base')
@section('header-content')
<div class="float-left">
    <div class="page-header-title">
        <h5 class="m-b-10">KOMENTAR TABEL</h5>
    </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">komentar</a></li>
    </ul>
</div>
<div class="float-right">
    <button onclick="clearInput()" type="button" data-toggle="modal" data-target="#formModal" class="btn btn-primary rounded">Tambah</button>
</div>
@endsection
@section('main-content')
<div class="card">
  <div class="card-header">
      <span class="d-block m-t-5">hati-hati dalam menghapus data parent karena akan menghapus data child</span>
  </div>
  <div class="card-body table-border-style">
      <div class="table-responsive">
          <table class="table" id="table-data">
              <thead>
                  <tr>
                      <th style="width: 4%">#</th>
                      <th>Postingan</th>
                      <th>Alias</th>
                      <th>Komentar</th>
                      <th style="width: 14%">Dibuat</th>
                      <th style="width: 14%">Diupdate</th>
                      <th style="width: 11%">Opsi</th>
                  </tr>
              </thead>
              <tbody id="tbody">
              </tbody>
          </table>
      </div>
  </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Formulir Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-5">
                    <input type="hidden" id="id">
                    <input type="hidden" id="mac_address">
                    <label class="" for="Text">Postingan</label>
                    <select name="postingan_id" id="postingan_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        @foreach ($data['postingan'] as $item)
                            <option value="{{$item->id}}">{{$item->judul}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="alert-postingan_id"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label for="alias">Alias</label>
                    <input id="alias" type="text" class="form-control" placeholder="--input disini--" autocomplete="off">
                    <p id="alertalias" class="text-danger mt-2"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group fill">
                    <label class="" for="Text">Asal</label>
                    <select name="asal" id="asal" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user" selected>User</option>
                    </select>
                    <span class="text-danger" id="alert-asal"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label for="tag">Tag</label>
                    <input id="tag" type="text" class="form-control" placeholder="--input disini--" autocomplete="off">
                    <p id="alerttag" class="text-danger mt-2"></p>
                </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="_komentar">Komentar</label>
            <textarea id="_komentar" cols="30" rows="10" class="form-control" placeholder="--input disini--" autocomplete="off"></textarea>
            <p id="alert_komentar" class="text-danger mt-2"></p>
          </div>
        </div>
        <div class="modal-footer">
          <button id="modal-close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="postData()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        const baseUrl = `{{ config('app.url') }}`


        function clearInput() {
            $('#id'                ).val  ('')
            $('#postingan_id'      ).val  ('')
            $('#alertpostingan_id' ).html ('')
            $('#alias'             ).val  ('')
            $('#alertalias'        ).html ('')
            $('#_komentar'         ).val  ('')
            $('#alert_komentar'    ).html ('')
            $('#asal'              ).val  ('')
            $('#alertasal'         ).html ('')
            $('#mac_address'       ).val  ('')
            $('#tag'               ).val  ('')
            $('#alerttag'          ).html ('')
        }

        $(document).on('click', '#btn-del', function() {
            let dataId = $(this).data('id')
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data tidak dapat dipulihkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Waiting',
                        text: "Processing Data!",
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    })
                    $.ajax({
                        url: `${baseUrl}/api/v2/komentar/${dataId}`,
                        type: 'delete',
                        success: function(result) {
                            let data = result.data;
                            setTimeout(() => {
                                Swal.close()
                                getAllData()
                                iziToast.success({
                                    title: 'Sukses',
                                    message: 'Data berhasil dihapus!',
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

        $(document).on('click', '#btn-edit', function() {
            clearInput()
            let dataId = $(this).data('id')
            $.get(`${baseUrl}/api/v2/komentar/${dataId}`, (res) => {
                let data = res.data
                $.each(data, (i,d) => {
                    if (i != "created_at" && i != "updated_at") {
                        $(`#${i}`).val(d)
                    }
                })
                $('#formModal').modal('show')
            }).fail((err) => {
                iziToast.error({
                    title   : 'Error'                    ,
                    message : 'Server sedang maintenance',
                    position: 'topRight'
                });
            })
        })

        function postData() {
            const data = {
                id           : $('#id'           ).val(),
                postingan_id : $('#postingan_id' ).val(),
                alias        : $('#alias'        ).val(),
                _komentar    : $('#_komentar'    ).val(),
                asal         : $('#asal'         ).val(),
                tag          : $('#tag'          ).val(),
                mac_address  : $('#mac_address').val().length <= 0 ? crypto.randomUUID() : $('#mac_address').val(),
            }

            $.ajax({
                url        : `${baseUrl}/api/v2/komentar`,
                method     : "POST"                   ,
                data       : data                     ,
                success: function(res) {
                    $('#formModal').modal('hide')
                    iziToast.success({
                        title: 'Sukses',
                        message: 'Data berhasil diproses!',
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
            $.get(`${baseUrl}/api/v2/komentar`, (res) => {
                let data = res.data

                $('#tbody').html('')
                $.each(data, (i,d) => {
                    $('#tbody').append(`
                        <tr>
                            <td>${i + 1}</td>
                            <td class="text-capitalize">${d.postingan}</td>
                            <td class="text-capitalize">${d.alias}</td>
                            <td class="text-capitalize">${d._komentar}</td>
                            <td>${moment(d.created_at).locale('id').format('DD, MMMM YYYY')}</td>
                            <td>${moment(d.updated_at).locale('id').format('DD, MMMM YYYY')}</td>
                            <td>
                            <button id="btn-edit" data-id="${d.id}" class="btn rounded btn-sm btn-outline-primary mr-1">Edit</button>
                            <button id="btn-del" data-id="${d.id}" class="btn rounded btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                    `)
                })

                $('#table-data').DataTable();
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