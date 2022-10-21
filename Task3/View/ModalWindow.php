<div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button id="btnDelete" form="" type="submit" name="delete" class="btn btn-primary">
                    Continue
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="text" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="email" class="form-control"
                               id="inputEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" required pattern="[A-Za-z ]{1,32}" name="name" class="form-control"
                               id="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputGender" class="form-label">Gender</label>
                        <select id="inputGender" class="form-select" name="gender">
                            <?php foreach (GENDER as $gen) { ?>
                                <option value="<?php echo $gen ?>"> <?php echo $gen ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus" class="form-label">Status</label>
                        <select id="inputStatus" class="form-select" name="status">
                            <?php foreach (STATUS as $stat) { ?>
                                <option value="<?php echo $stat ?>"> <?php echo $stat ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btn" form="form" type="submit" name="add" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>