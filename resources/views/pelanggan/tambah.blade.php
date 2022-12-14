<form method="POST" action="{{action('PelangganController@postSave')}}">
    @csrf
    <div class="modal-body">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="inputPassword" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="inputPassword" placeholder="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea name="address" class="form-control" id="" cols="10" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <select name="genre" id="" class="form-control">
                    <option value="Non-Agen">Non-Agen</option>
                    <option value="Agen">Agen</option>
                </select>
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>