<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>
    <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa fa-lg fa-door-open white"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Rooms</h4>
                </div>
                <div class="card-body">
                    <?= $rooms ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fa fa-list fa-lg white"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Room Category</h4>
                </div>
                <div class="card-body">
                    <?= $room_categories ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fa fa-images fa-lg white"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Room Images</h4>
                </div>
                <div class="card-body">
                    <?= $room_images ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>