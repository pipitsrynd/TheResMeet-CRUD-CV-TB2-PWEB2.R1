<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume <?= $user['name'] ?> - <?= date('Y') ?></title>

    <style>
        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 70%;
        }
        .align-right{
            text-align: right;
            font-style: italic;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <div style="padding:2% 10% 4% 10%;">
        <center>
            <h1 style="color:#4a90e2;font-size:30px;"><?= $user['name'] ?></h1>
            <p><?= $user['email'] ?> | <?= $user['phone_number'] ?> | <?= $user['linkedin_url'] ?></p>
        </center>
    </div>
    
    <h1 style="color:#4a90e2;font-size:20px;">PROFIL</h1>
    <hr>
    <?= $user['about']; ?>
    <br>

    <h1 style="color:#4a90e2;font-size:20px;">PENGALAMAN PROFESIONAL</h1>
    <hr>
    <?php foreach ($work_experiences as $key => $work_experience): ?>
        <div>
            <div style="float: left;">
                <p style="font-size: 20px;font-weight:bold;"><?= $work_experience['position']; ?></p>
            </div> 
            <div style="text-align: right;">
                <p><?= $work_experience['start_date']; ?> - <?= $work_experience['untill_now'] == "yes" ? 'sekarang' : $work_experience['end_date'] ; ?></p>
            </div>
        </div>
        <div>
            <p><?= $work_experience['company_name']; ?></p>
        </div>
        <div>
            <?= $work_experience['about']; ?>
        </div>
    <?php endforeach; ?>
    <br>

    <h1 style="color:#4a90e2;font-size:20px;">PENDIDIKAN FORMAL</h1>
    <hr>
    <?php foreach ($educations as $key => $education): ?>
        <div>
            <div style="float: left;">
                <p style="font-size: 20px;font-weight:bold;"><?= $education['major']; ?></p>
            </div> 
            <div style="text-align: right;">
                <p><?= $education['start_date']; ?> - <?= $education['untill_now'] == "yes" ? 'sekarang' : $education['end_date'] ; ?></p>
            </div>
        </div>
        <div>
            <p><?= $education['school_name']; ?></p>
        </div>
        <div>
            <?= $education['about']; ?>
        </div>
    <?php endforeach; ?>
    <br>

    <h1 style="color:#4a90e2;font-size:20px;">PENGALAMAN ORGANISASI</h1>
    <hr>
    <?php foreach ($organization_experiences as $key => $organization_experience): ?>
        <div>
            <div style="float: left;">
                <p style="font-size: 20px;font-weight:bold;"><?= $organization_experience['position']; ?></p>
            </div> 
            <div style="text-align: right;">
                <p><?= $organization_experience['start_date']; ?> - <?= $organization_experience['untill_now'] == "yes" ? 'sekarang' : $organization_experience['end_date'] ; ?></p>
            </div>
        </div>
        <div>
            <p><?= $organization_experience['organization_name']; ?></p>
        </div>
        <div>
            <?= $organization_experience['about']; ?>
        </div>
    <?php endforeach; ?>

</body>
</html>