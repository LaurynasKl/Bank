<?php if (isset($_SESSION['succes'])) : ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">

                <?php if(isset($_SESSION['succes'])) :?>
                    <div class="alert alert-success">
                        <?= $_SESSION['succes'] ?>
                    </div>
                    <?php unset($_SESSION['succes']) ?>
                <?php endif ?>

            </div>
        </div>
    </div>
<?php endif ?>