@extends('adminlte::page')

@section('title', 'Pelanggan')

@section('content_header')
    <div style="padding:5px;" class="text-right">
        <a href="#" class="btn btn-primary btn-sm tambah-pelanggan" ><i class="fas fa-user-plus"></i></a>
    </div>
    @include('pelanggan.modal')
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
                            <td>{{$row->lastdate ? : '-'}}</td>
                            <td>{{$row->laststock ? : 0}}</td>
                            <td>{{$row->pelanggan_jenis}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm edit-pelanggan" data-id="{{$row->pelanggan_id}}" data-toggle="modal" data-target="#editModal"><i class="fas fa-wrench"></i></a>
                                <a href="" class="btn btn-info btn-sm order" data-id="{{$row->pelanggan_id}}" data-toggle="modal" data-target="#tambahTransaksiModal"><i class="fas fa-shopping-cart"></i></a>
                                <a href="{{action('PelangganController@postDelete').'?id='.$row->pelanggan_id}}" class="btn btn-danger btn-sm delete"  data-id="{{$row->pelanggan_id}}" ><i class="fas fa-trash"></i></a>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@stop

@section('js')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready( function () {
        $('#table').DataTable();
        $('#history').DataTable();

        editPelanggan();
        tambahPelanggan();
        order();
    });

    function tambahPelanggan(){
        $('.tambah-pelanggan').click(function(){   
        // AJAX request
        $.ajax({
            url: "{{action('PelangganController@getModalTambah')}}",
            type: 'get',
            success: function(response){ 
                    // Add response in Modal body
                    $('#content-header').html('Tambah Pelanggan');
                    $('#content-popup').html(response);

                    // Display Modal
                    $('#modalPopUp').modal('show'); 
                }
            });
        });
    }
    function editPelanggan(){
        $('.edit-pelanggan').click(function(){   
        var userid = $(this).data('id');
        // AJAX request
        $.ajax({
            url: "{{action('PelangganController@getModalEdit')}}"+'?id='+userid,
            type: 'get',
            success: function(response){ 

                    // Add response in Modal body
                    $('#content-header').html('Edit Pelanggan');
                    $('#content-popup').html(response);

                    // Display Modal
                    $('#modalPopUp').modal('show'); 
                }
            });
        });
    }
    function order(){
        $('.order').click(function(){   
        var userid = $(this).data('id');
        // AJAX request
        $.ajax({
            url: "{{action('PelangganController@getModalOrder')}}"+'?id='+userid,
            type: 'get',
            success: function(response){ 

                    // Add response in Modal body
                    $('#content-header').html('Order Galon');
                    $('#content-popup').html(response);

                    // Display Modal
                    $('#sizePopUp').addClass('modal-lg');
                    $('#modalPopUp').modal('show'); 
                }
            });
        });
    }
</script>
@stop