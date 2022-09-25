@extends('adminlte::page')

@section('title', 'Galon')

@section('content_header')
    <div style="padding:5px;" class="text-right">
        
    </div>
@endsection
@section('content')
    <div class="row">             
        <div class="col-md-12">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Tarik</th>
                        <th>Kirim</th>
                        <th>Total</th>
                </thead>
                <tbody>
                    @if($model)
                        @foreach($model as $row)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($row->movement_date)->format('d-M-Y')}}</td>
                            <td>{{$row->total_in}}</td>
                            <td>{{$row->total_out}}</td>
                            <td>{{$row->total_in + $row->total_out}}</td>
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
    });
</script>
@stop