<div class="card-body">
    <div class="card card-solid">
        <div class="card-body pb-0 pt-3">
            <blockquote>
            <b>Keterangan!!</b><br>
            <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span class="text-danger">*</span>) Harus Di Isi !!</cite></small>
            </blockquote>
        </div>
    </div>
    <div class="card-header with-border pl-0 pb-1">
<<<<<<< HEAD
        <span class="col-form-label text-bold">Departement</span>
    </div>
    <br> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Nama <span class="text-danger">*</span></label> 
=======
        <span class="col-form-label text-bold">Prodi</span>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Nama <span class="text-danger">*</span></label>
>>>>>>> eac25688bdc2ea92d3b27f5789fb19260f184a2b
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $departement->name ?? '') }}" placeholder="Name.." autocomplete="off">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @enderror
<<<<<<< HEAD
        </div> 
=======
        </div>
>>>>>>> eac25688bdc2ea92d3b27f5789fb19260f184a2b
    </div>
</div>
<div class="card-footer">
    <div class="offset-md-4">
        <div class="form-group mb-0">
<<<<<<< HEAD
            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button> 
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
        </div>
    </div>
</div>
=======
            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
        </div>
    </div>
</div>
>>>>>>> eac25688bdc2ea92d3b27f5789fb19260f184a2b
