
<form method="POST" action="{{action('PelangganController@postEdit')}}">
    @csrf
    <input type="hidden" name="id" value="{{$model->pelanggan_id}}">
    <div class="modal-body">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{$model->pelanggan_nama}}" id="inputPassword" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" value="{{$model->pelanggan_telepon}}" id="inputPassword" placeholder="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea name="address" class="form-control" id="" cols="10" rows="5">{{$model->pelanggan_alamat}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <select name="genre" id="" class="form-control">
                    <option value="Non-Agen" {{$model->pelanggan_jenis == 'Non-Agen' ? 'selected' : ''}} >Non-Agen</option>
                    <option value="Agen" {{$model->pelanggan_jenis == 'Agen' ? 'selected' : ''}}>Agen</option>
                </select>
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
     