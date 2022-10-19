<!DOCTYPE html>

<html lang="en">
<head>
    <title>Task 3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="View/script.js"></script>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Database Editor</a>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" data-bs-toggle="modal"
                data-bs-target="#modal" onclick="clearModal()">Add Record
        </button>
    </nav>

    <div class="row form-inline">
        <div class="col">Email</div>
        <div class="col">Name</div>
        <div class="col">Gender</div>
        <div class="col">Status</div>
        <div class="col">Edit Record</div>
        <div class="col">Delete Record</div>
    </div>


    <?php
    if (isset($arrayOfUsers)) {
        foreach ($arrayOfUsers as $row) {
            ?>
            <form class="form-control" method="POST" id="<?php echo "form" . $row['id'] ?>">
                <div class="row">
                    <div class="col">
                        <input type="text" disabled pattern="[^@\s]+@[^@\s]+\.[^@\s]+" class="form-control
                        form-control-plaintext" value="<?php echo $row['email'] ?>"
                               id="<?php echo $row['id'] . '_email' ?>">
                    </div>
                    <div class="col">
                        <input type="text" disabled pattern="[A-Za-z ]{1,32}"
                               class="form-control form-control-plaintext"
                               value="<?php echo $row['name'] ?>" id="<?php echo $row['id'] . '_name' ?>">
                    </div>
                    <div class="col">
                        <select class="form-control form-control-plaintext" disabled
                                id="<?php echo $row['id'] . '_gender' ?>">
                            <?php foreach (GENDER as $gen) { ?>
                                <option value="<?php echo $gen ?>" <?php if ($row['gender'] === $gen) echo "selected" ?>> <?php echo $gen ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control form-control-plaintext" disabled
                                id="<?php echo $row['id'] . '_status' ?>">
                            <?php foreach (STATUS as $stat) { ?>
                                <option value="<?php echo $stat ?>" <?php if ($row['status'] === $stat) echo "selected" ?>><?php echo $stat ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <button type="button" name="openEditModal" class="btn btn-primary" data-bs-target="#modal"
                                data-bs-toggle="modal" id="<?php echo $row['id'] . '_edit' ?>"
                                onclick="editButtonOnclick(this.id)">Edit
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" name="openModal" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" id="<?php echo $row['id'] ?>"
                                onclick="deleteButtonOnclick(this.id)">Delete
                        </button>
                    </div>
                </div>
            </form>

        <?php }
    }

    require_once 'View/ModalWindow.php';
    ?>

</div>
</body>
