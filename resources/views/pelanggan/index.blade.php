@extends('adminlte::page')

@section('title', 'Pelanggan')

@section('content_header')
    <div style="padding:5px;" class="text-right">
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i></a>
    </div>
    @include('pelanggan.tambah')   
@stop

@section('content')
    <div class="row">
             
        <div class="col-md-12">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Terakhir Kirim</th>
                        <th>Total Galon</th>
                        <th>Jenis</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($model)
                        @foreach($model as $row)
                        <tr>
                            <td>{{$row->pelanggan_nama}}</td>
                            <td>{{$row->pelanggan_telepon}}</td>
                            <td>{{$row->pelanggan_alamat}}</td>
                            <td>-</td>
                            <td>-</td>
                            <td>{{$row->pelanggan_jenis}}</td>
                            <td>
                                <a href="" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a>
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-wrench"></i></a>
                                <a href="" class="btn btn-info btn-sm"><i class="fas fa-shopping-cart"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
@stop

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@stop

@section('js')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
@stop