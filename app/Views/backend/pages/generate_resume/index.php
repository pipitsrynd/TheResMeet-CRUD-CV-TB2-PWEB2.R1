<?= $this->extend('backend/main') ?>

<?= $this->section('title') ?>
    Resume Lists
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <section class="section">
        <div class="section-header">
            <h1>Resume Lists</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $key => $user): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $user['name'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="/internal/generate_resume/<?= $user['id'] ?>" class="btn btn-info">Generate Resume</a>
                                                <a href="/internal/download_excel/<?= $user['id'] ?>" class="btn btn-success">Download Excel</a>
                                            </div>
                                        </td>
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