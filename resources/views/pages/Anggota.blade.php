@extends('layout.Base')
@section('header-content')
<div class="float-left">
    <div class="page-header-title">
        <h5 class="m-b-10">ANGGOTA TABEL</h5>
    </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">anggota</a></li>
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
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Devisi</th>
                      <th>Sektor</th>
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
            <div class="row mx-1">
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <input type="hidden" id="id">
                        <label class="" for="Text">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Input disini">
                        <span class="text-danger" id="alert-nama"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <label class="" for="Text">Jenis Kelamin</label>
                        <select name="sex" id="sex" class="form-control">
                            <option value="laki_laki">Laki-laki</option>
                            <option value="perempuan" selected>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <label class="" for="Text">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="islam">Islam</option>
                            <option value="katolik">Katolik</option>
                            <option value="protestan">Protestan</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Buddha</option>
                            <option value="khonghucu">Khonghucu</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <label class="" for="Text">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Input disini">
                        <span class="text-danger" id="alert-alamat"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <label class="" for="Text">Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Input disini">
                        <span class="text-danger" id="alert-telepon"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <label class="" for="Text">Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control">
                            <option value="">-- Pilih --</option>
                            @foreach ($jabatan as $item)
                                <option value="{{$item->id}}">{{$item->_jabatan}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="alert-jabatan_id"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <label class="" for="Text">Devisi</label>
                        <select name="devisi_id" id="devisi_id" class="form-control">
                            <option value="">-- Pilih --</option>
                            @foreach ($devisi as $item)
                                <option value="{{$item->id}}">{{$item->_devisi}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="alert-devisi_id"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group fill">
                        <label class="" for="Text">Sektor</label>
                        <select name="sektor_id" id="sektor_id" class="form-control">
                            <option value="">-- Pilih --</option>
                            @foreach ($sektor as $item)
                                <option value="{{$item->id}}">{{$item->_sektor}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="alert-sektor_id"></span>
                    </div>
                </div>
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
            $('#id'             ).val  ('')
            $('#_jabatan'       ).val  ('')
            $('#alert_jabatan'  ).html ('')
            $('#deskripsi'      ).val  ('')
            $('#alertdeskripsi' ).html ('')
            $('#nama'           ).val  ('')
            $('#alert-nama'     ).html ('')
            $('#alert-sex'      ).html ('')
            $('#alamat'         ).val  ('')
            $('#alert-alamat'   ).html ('')
            $('#telepon'        ).val  ('')
            $('#alert-telepon'  ).html ('')
            $('#jabatan_id'     ).val  ('')
            $('#alert-jabatan'  ).html ('')
            $('#devisi_id'      ).val  ('')
            $('#alert-devisi'   ).html ('')
            $('#sektor_id'      ).val  ('')
            $('#alert-sektor'   ).html ('')
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
                        url: `${baseUrl}/api/v2/anggota/${dataId}`,
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
            $.get(`${baseUrl}/api/v2/anggota/${dataId}`, (res) => {
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
                id         : $('#id'         ).val(),
                nama       : $('#nama'       ).val(),
                sex        : $('#sex'        ).val(),
                agama      : $('#agama'      ).val(),
                alamat     : $('#alamat'     ).val(),
                telepon    : $('#telepon'    ).val(),
                jabatan_id : $('#jabatan_id' ).val(),
                devisi_id  : $('#devisi_id'  ).val(),
                sektor_id  : $('#sektor_id'  ).val(),
            }

            $.ajax({
                url        : `${baseUrl}/api/v2/anggota/`,
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
                                $(`#alert-${i}`).html(d)
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
            $.get(`${baseUrl}/api/v2/anggota`, (res) => {
                let data = res.data

                $('#tbody').html('')
                $.each(data, (i,d) => {
                    $('#tbody').append(`
                        <tr>
                            <td>${i + 1}</td>
                            <td class="text-capitalize">${d.nama}</td>
                            <td class="text-capitalize">${d.jabatan}</td>
                            <td class="text-capitalize">${d.devisi}</td>
                            <td class="text-capitalize">${d.sektor}</td>
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