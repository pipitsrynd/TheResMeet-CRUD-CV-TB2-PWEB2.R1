<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>

    <section class="section">
        <div class="section-header">
            <h1>Room Lists</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-12 d-flex justify-content-end">
                                <a href="/internal/rooms/create" class="btn btn-info">Create Room</a>
                            </div>
                        </div>
                        <?php if(session()->getFlashData('success')){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashData('success') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Num of Person</th>
                                    <th>Room Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rooms as $key => $room): ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $room['name'] ?></td>
                                            <td><?= $room['slug'] ?></td>
                                            <td><?= $room['description'] ?></td>
                                            <td><?= $room['num_person'] ?></td>
                                            <td><div class="badge badge-success">Completed</div></td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
<?= $this->endSection() ?>
