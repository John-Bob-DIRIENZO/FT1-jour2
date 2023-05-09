<?php include_once "header.php"; ?>

<?php

if ($_POST) {
    $handle = fopen("./users.csv", "a+");
    $res = fputcsv($handle, $_POST);
    fclose($handle);
}

$handle = fopen("./users.csv", "r");
?>

    <section class="container py-5">
        <form method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

        <hr class="m-5">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($user = fgetcsv($handle)) : ?>
                <tr>
                    <td><?= $user[0]; ?></td>
                    <td><?= $user[1]; ?></td>
                    <td><?= $user[2]; ?></td>
                </tr>
            <?php
            endwhile;
            fclose($handle);
            ?>
            </tbody>
        </table>

    </section>

<?php include_once "footer.php";
