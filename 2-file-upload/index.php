<?php if (!$_FILES) : ?>

    <?php include_once "header.php"; ?>
    <section class="container py-5">

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" name="my-file">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

    </section>

<?php else:

    $fileName = basename($_FILES['my-file']['name']);
    move_uploaded_file($_FILES['my-file']['tmp_name'], "./uploads/$fileName");
    header("Location: /2-file-upload/uploads/$fileName");
    exit();

endif;
?>


<?php include_once "footer.php";
