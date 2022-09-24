<form method="POST" action="{{action('PelangganController@postSave')}}">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="pelangganId" value="{{$model->profil->pelanggan_id}}">
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
                <div>
                    <table id="history" class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>In</th>
                                <th>Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Order</button>
    </div>
</form>
