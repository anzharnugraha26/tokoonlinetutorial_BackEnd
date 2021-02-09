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
                        @foreach($produk as $p)
                            <tr>
                            <td>{{$p->name}}</td>
                            <td>{{"Rp.".number_format($p->harga)}}</td>
                            <td>{{$p->deskripsi}}</td>
                            <td>{{$p->category_id}}</td>
                            <td>{{$p->image}}</td>
                            <td>edit hapus</td>
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