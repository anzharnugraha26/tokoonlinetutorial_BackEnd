@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PRODUK</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <body>
                        <form method="POST" action="{{ route('produk.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="name">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" placeholder="Harga ..." name="harga" number_format>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pilih Category</label>
                                            <select class="form-control" name="category_id">
                                                <option value="1">option 1</option>
                                                <option value="2">option 2</option>
                                                <option value="1">option 3</option>
                                                <option value="1">option 4</option>
                                                <option value="1">option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" placeholder="Deskripsi ..." name="deskripsi"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>




                    </body>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection