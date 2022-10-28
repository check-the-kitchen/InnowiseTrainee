


<div class="error-modal-window" id="errorModalWindow">
    <div class="error-modal-window-content">
        <button type="button" class="btn-close" id="btnCloseErrorModal"onclick="closeModal()"></button>
        <?php foreach ($_SESSION['errors'] as $error) {?>
            <p> <?php echo $error?></p>
        <?php }?>
    </div>
</div>
