<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Update Personal Information</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/internal/resume_personal_informations/update/<?= $resume_personal_information['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-12">
                                <a href="/internal/resume_personal_informations" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" id="name" value="<?= $resume_personal_information['name']; ?>" placeholder="Employee Name">
                                <div class="invalid-feedback font-size-invalid-feedback">
                                    <?= $validation->getError('name') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" id="email" value="<?= $resume_personal_information['email']; ?>" placeholder="Email">
                                <div class="invalid-feedback font-size-invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <label for="name" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" class="form-control <?= ($validation->hasError('phone_number')) ? 'is-invalid' : '' ?>" id="phone_number" value="<?= $resume_personal_information['phone_number']; ?>" placeholder="Nomor Handphone">
                                <div class="invalid-feedback font-size-invalid-feedback">
                                    <?= $validation->getError('phone_number') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <label for="Jobdesk" class="col-sm-2 col-form-label">LinkedIn URL</label>
                            <div class="col-sm-10">
                                <input type="text" name="linkedin_url" class="form-control <?= ($validation->hasError('linkedin_url')) ? 'is-invalid' : '' ?>" id="linkedin_url" value="<?= $resume_personal_information['linkedin_url']; ?>" placeholder="linkedin_url">
                                <div class="invalid-feedback font-size-invalid-feedback">
                                    <?= $validation->getError('linkedin_url') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <label for="Jobdesk" class="col-sm-2 col-form-label">About</label>
                            <div class="col-sm-10">
                            <textarea class="form-control <?= ($validation->hasError('about')) ? 'is-invalid' : '' ?>" name="about" id="about" style="height:300px;"><?= $resume_personal_information['about']; ?></textarea>
                                <div class="invalid-feedback font-size-invalid-feedback">
                                    <?= $validation->getError('about') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-9"></div>
                            <div class="col-3 d-flex justify-content-end">
                                <button class="btn btn-info btn-lg">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>

    <script>
        CKEDITOR.replace( 'about' );
    </script>

<?= $this->endSection() ?>