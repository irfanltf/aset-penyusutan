<?= $this->extend('templates/templates'); ?>




<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Halaman Aset</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                        </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                        
                    </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                        
                    </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                        
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Hitung</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>