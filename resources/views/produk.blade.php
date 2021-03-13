@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">PRODUK</div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>harga</th>
                                    <th>deskripsi</th>
                                    <th>category</th>
                                    <th>image</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($produk as $p)
                                    <tr>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ 'Rp.' . number_format($p->harga) }}</td>
                                        <td>{{ $p->deskripsi }}</td>
                                        <td>{{ $p->category_id }}</td>
                                        <td>
                                            @if (!empty($p->image))
                                                <img src="{{ asset('/storage/produk/' . $p->image) }}" alt=""
                                                    style="width:100px">
                                        </td>
                                @endif
                                <td>
                                    <input type="checkbox" class="ProductStatus btn btn-success" 
                                        data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="screen"
                                        data-offstyle="danger" >
                                    <div id="myElem" style="display: none;" class="alert alert-success"> Status
                                        Enabled</div>
                                </td>
                                <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-item">
                                        <i class="fas fa-pencil-alt edit"></i>Edit</button>
                                    <a href="#" class="btn btn-danger btn-sm delete" id="">
                                        <i class="fas fa-trash"></i>Delete</a>
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


@endsection
