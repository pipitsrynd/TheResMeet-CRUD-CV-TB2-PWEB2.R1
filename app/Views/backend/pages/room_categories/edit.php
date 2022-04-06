<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Update Category</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/internal/room_categories/update/<?= $room_category['id'] ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-12">
                                <a href="/internal/room_categories" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" id="name" value="<?= $room_category['name'] ?>" placeholder="Category Name">
                                <div class="invalid-feedback font-size-invalid-feedback">
                                    <?= $validation->getError('name') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-9"></div>
                            <div class="col-3 d-flex justify-content-end">
                                <button class="btn btn-info btn-lg">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
