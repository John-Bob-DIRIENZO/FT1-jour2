<?php include_once "header.php"; ?>

    <section class="container py-5">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="person" class="form-label">CSV Personnes</label>
                <input class="form-control" type="file" id="formFile" name="person">
            </div>
            <div class="mb-3">
                <label for="work" class="form-label">CSV Travail</label>
                <input class="form-control" type="file" id="formFile" name="work">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </section>

<?php

if ($_FILES) {
    $personHandle = fopen($_FILES['person']["tmp_name"], 'r');
    $personArray = [];
    while ($line = fgetcsv($personHandle)) {
        $personArray[$line[0]] = [
            "first_name" => $line[1],
            "last_name" => $line[2],
            "email" => $line[3]
        ];
    }
    fclose($personHandle);

    $workHandle = fopen($_FILES['work']["tmp_name"], 'r');
    $outputHandle = fopen("./output.csv", "c");
    while ($workLine = fgetcsv($workHandle)) {
        fputcsv($outputHandle, [
            $workLine[0],
            $personArray[$workLine[0]]["first_name"],
            $personArray[$workLine[0]]["last_name"],
            $personArray[$workLine[0]]["email"],
            $workLine[1],
        ]);
    }

    fclose($workHandle);
}


include_once "footer.php";
