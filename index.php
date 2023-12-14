<?php global $pdo; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Головна сторінка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/js/_header.php") ?>
<main>
    <div class="container">
        <?php include($_SERVER["DOCUMENT_ROOT"] . "/config/conection_database.php"); ?>
        <h1 class="text-center">Список категорій</h1>

        <a href="/js/create.php" class="btn btn-success">Додати</a>
        <?php
        $stmt = $pdo->query("SELECT id, name, description, image FROM categories");
        // Fetch data as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $row) {
                    ?>

                    <tr>
                        <th scope="row"><?php echo $row["id"] ?></th>
                        <td>
                            <img src="/images/<?php echo $row["image"] ?>" alt="Фото" width="100">
                        </td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["description"] ?></td>
                        <td>
                            <a href="#" class="btn btn-info">Змінить</a>
                            <a href="#" class="btn btn-danger">Видалити</a>
                        </td>
                    </tr>


                    <?php
                } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo '<div class="alert alert-primary" role="alert">
                    Категорії відсутні
                  </div>';
        }
        ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
