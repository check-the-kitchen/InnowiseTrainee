<?php

namespace Task3;

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script><script>src="script.js"</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Database Editor</a>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" data-bs-toggle="modal" data-bs-target="#addModal" >Add Record</button>
    </nav>

            <div class="row form-inline">
                <div class="col">
                        Email
                </div>
                <div class="col">
                        Name
                </div>
                <div class="col">
                    Gender
                </div>
                <div class="col">
                    Status
                </div>
                <div class="col">
                    Edit Record
                </div>
                <div class="col">
                    Delete Record
                </div>
            </div>

            <?php
            require ("Model.php");
            $model=new Model();
            //var_dump($model->getUserList());
            $arrayOfUsers = $model->getUserList();

            foreach ($arrayOfUsers as $row){
            ?>
                <form  class="form-control" method="POST" id="<?php echo "form".$row['id']  ?>">
                    <div class="row">
                        <div class="col">
                            <input type="email" class="form-control form-control-plaintext" name="email" value="<?php echo $row['email']?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-control-plaintext" name="name" value="<?php echo $row['name']?>">
                        </div>
                        <div class="col">
                            <select class="form-control form-control-plaintext" name="gender">
                                <option value="male" <?php if($row['gender']=='male') echo "selected"?>>male</option>
                                <option value="female" <?php if($row['gender']=='female') echo "selected"?>>female</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control form-control-plaintext" name="status">
                                <option value="active" <?php if($row['status']=='active') echo "selected"?>>Active</option>
                                <option value="inactive" <?php if($row['status']=='inactive') echo "selected"?>>Inactive</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" name="edit" class="btn btn-primary" id="<?php echo $row['id']?>" value="<?php echo $row['id']?>">Edit</button>
                        </div>
                        <div class="col">
                            <button type="button" name="openModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" id="<?php echo $row['id']?>" onclick="deleteButtonOnclick(this.id)">Delete</button>
                        </div>
                    </div>
                </form>

            <?php } ?>

</div>


<div class="modal"  id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btnDelete" form="" type="submit" name="delete" class="btn btn-primary" value="">Continue</button>
            </div>
        </div>
    </div>
</div>




<div class="modal"  id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="addForm">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="inputName">
                        </div>
                        <div class="mb-3">
                            <label for="inputGender" class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputStatus" class="form-label" >Status</label>
                            <select class="form-select" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btnAdd" form="addForm" type="submit" name="add" class="btn btn-primary">Continue</button>
            </div>
        </div>
    </div>
</div>
<?php
require ("Controller.php");
?>


</body>



