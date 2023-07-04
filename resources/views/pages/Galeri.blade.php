@extends('layout.Base')
@section('header-content')
<div class="float-left">
    <div class="page-header-title">
        <h5 class="m-b-10">GALERI TABEL</h5>
    </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">galeri</a></li>
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
                      <th>Gambar</th>
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
          <form id="formData" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <input type="hidden" id="id" name="id">
                <label for="_jabatan">Gambar</label>
                <input id="path" name="path" type="file" class="form-control" autocomplete="off">
              </div>
              <img src="#" alt="" id="preview" style="width: 100%;height: 250px;">
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn-simpan" class="btn btn-primary">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        const baseUrl = `{{ config('app.url') }}`


        function clearInput() {
            $('#id'        ).val  ('')
            $('#path'      ).val  ('')
            $('#alertpath' ).html ('')
            $('#preview').attr('src', '');
        }

        $('#path').change(function(){
        const file = this.files[0];
            if (file){
            let reader = new FileReader();
            reader.onload = function(event){
                $('#preview').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
            }
        });

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
                        url: `${baseUrl}/api/v2/galeri/${dataId}`,
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
            let dataId = $(this).data('id');
            $.get(`${baseUrl}/api/v2/galeri/` + dataId, function(res) {
                $('#btn-simpan').val("edit-user");
                clearInput()
                $('#formModal').modal('show');
                $('#id').val(res.data.id);
                $('#preview').attr('src', `{{ asset('storage/gambar/${res.data.path}') }}`);
            });
        });


        $('#btn-simpan').click(function (e) {
            e.preventDefault();
            $(this).html('Menyimpan...');
            $(this).prop('disabled', true);

            let foto = $('#path').prop('files')[0];
            let data = new FormData($('#formData')[0]);

            $.ajax({
                url: `${baseUrl}/api/v2/galeri/`,
                method: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#formModal').modal('hide');
                    iziToast.success({
                        title: 'Sukses',
                        message: 'Data berhasil diproses!',
                        position: 'topRight'
                    });
                    getAllData()
                },
                error: function(err) {
                    if (err.status === 422) {
                        let data = err.responseJSON;
                        let errorRes = data.errors;
                        if (errorRes.length >= 1) {
                            $('#alert-gambar').html(errorRes.data.nisn);
                        }
                    } else {
                        let msg = 'Sedang pemeliharaan server';
                        iziToast.error(msg);
                    }
                },
                complete: function() {
                    $('#btn-simpan').html('Simpan');
                    $('#btn-simpan').prop('disabled', false);
                }
            });
        });


        function getAllData() {
        $('#table-data').DataTable().destroy();
        $.get(`${baseUrl}/api/v2/galeri`, (res) => {
            let data = res.data;

            $('#tbody').html('');
            $.each(data, (i, d) => {
                $('#tbody').append(`
                    <tr>
                        <td>${i + 1}</td>
                        <td class="text-capitalize"><img style="width: 100px" src="storage/gambar/${d.path}" alt="Gambar"></td>
                        <td>${moment(d.created_at).locale('id').format('DD, MMMM YYYY')}</td>
                        <td>${moment(d.updated_at).locale('id').format('DD, MMMM YYYY')}</td>
                        <td>
                            <button id="btn-edit" data-id="${d.id}" class="btn rounded btn-sm btn-outline-primary mr-1">Edit</button>
                            <button id="btn-del" data-id="${d.id}" class="btn rounded btn-sm btn-outline-danger">Hapus</button>
                        </td>
                    </tr>
                `);
            });

            $('#table-data').DataTable();
        })
        .fail((err) => {
            iziToast.error({
                title: 'Error',
                message: 'Server sedang maintenance',
                position: 'topRight'
            });
        });
    }


        $(document).ready(function() 
        {
            getAllData()
        })
    </script>
@endsection