<?php

require __DIR__ . '/vendor/autoload.php';

use database\migration\CreateTaskTable;

$migration = new CreateTaskTable();
$migration->up();

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
            rel="stylesheet"
    />
</head>
<body>
<section class="w-100 py-5 px-4 gradient-custom" style="border-radius: .5rem .5rem 0 0;">
    <div class="row d-flex justify-content-center py-5">
        <div class="col col-xl-10">

            <div class="card">
                <div class="card-body p-5">

                    <form class="d-flex justify-content-center align-items-center mb-4" data-gtm-form-interact-id="0">
                        <div data-mdb-input-init="" class="form-outline flex-fill" data-mdb-input-initialized="true">
                            <input type="text" id="taskInput" class="form-control active" data-gtm-form-interact-field-id="0">
                            <label class="form-label" for="taskInput" style="margin-left: 0px;">New task...</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 71.2px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <button onclick="addTask()" data-mdb-button-init="" data-mdb-ripple-init="" class="btn btn-info ms-2" data-mdb-button-initialized="true" style="" aria-pressed="false">Add</button>
                    </form>

                    <?php include 'tabs.php'; ?>

                </div>
            </div>

        </div>
    </div>
</section>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- MDB -->
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
</body>
</html>

