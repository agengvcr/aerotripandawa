<form method="POST" action="{{action('PelangganController@postOrder')}}">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$model->profil->pelanggan_id}}">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" disabled class="form-control"id="inputPassword" value="{{$model->profil->pelanggan_nama}}" placeholder="Name">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" disabled value="{{$model->profil->pelanggan_telepon}}" class="form-control"id="inputPassword" placeholder="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea name="address" disabled class="form-control" id="" value="" placeholder="Address" cols="10" rows="5">{{$model->profil->pelanggan_alamat ? : ''}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Utang</label>
                    <div class="col-sm-10">
                        <input type="number" disabled class="form-control"id="inputPassword" placeholder="Utang">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Date</label>
                    <div class="col-sm-8">
                        <input type="date" name="date"  class="form-control"id="inputPassword" placeholder="Tarik">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tarik</label>
                    <div class="col-sm-8">
                        <input type="number" name="in"  class="form-control"id="inputPassword" placeholder="Tarik">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Kirim</label>
                    <div class="col-sm-8">
                        <input type="number" name="out"  class="form-control"id="inputPassword" placeholder="Kirim">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Utang</label>
                    <div class="col-sm-8">
                        <input type="number"  name="utang" class="form-control"id="inputPassword" placeholder="Utang">
                    </div>
                </div> 
                <div class="form-group">
                    <!-- <label for="inputPassword" class="col-sm-3 col-form-label"></label> -->
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Order</button>
                    </div>
                </div> 
         
            </div>
            <div class="col-sm-12">
                <table id="history" class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Tarik</th>
                            <th>Kirim</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($model->history as $history)
                        <tr>
                            <td>{{$history->movement_date}}</td>
                            <td>{{$history->movement_in}}</td>
                            <td>{{$history->movement_out}}</td>
                            <td><a href="{{action('GalonController@postDelete').'?id='.$history->movement_id}}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
    </div>
</form>

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready( function () {
        $('#history').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false });
    });
</script>
