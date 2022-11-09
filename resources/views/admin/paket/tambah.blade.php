@extends('layouts.admin')

@section('css')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 400px;
    }
</style>
@endsection

@section('content')
<div class="col-md-12 py-5">
    <div class="white_shd full margin_bottom_30">
       <div class="full graph_head mb-4">
          <div class="heading1 margin_0">
             <h2>Tambah Paket</h2>
          </div>
       </div>
       <form action="{{ route('admin.paket.simpan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding: 28px;">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="nama_paket" class="form-label">Nama Paket</label>
                        <input type="text" name="nama" class="form-control" id="nama_paket">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="harga_paket" class="form-label">Harga Paket</label>
                        <input type="number" name="harga" class="form-control" id="harga_paket">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Paket</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar_paket">Gambar Paket</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="gambar" class="custom-file-input" id="gambar_paket">
                            <label class="custom-file-label" for="gambar_paket" id="labelGambar">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Simpan</button>
                <a role="button" href="{{ route('admin.paket') }}" class="btn btn-danger w-100">Kembali</a>
            </div>
        </form>
    </div>
</div> 
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('input[name=gambar]').change(function(){
            $('#labelGambar').html(this.files[0].name);
        })
    })
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#deskripsi' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection