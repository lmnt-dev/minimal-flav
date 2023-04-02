<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css?family=Titillium Web|Roboto" rel="stylesheet">
    <style>
        body {
            font-family: 'Titillium Web';
        }
        h1 {
            font-family: Roboto;
        }
    </style>

    <script src="https://unpkg.com/tachyonjs@1.0.1/tachyon.min.js" integrity="sha384-YzRhaEvO+tu7clAuAStGkSR0bVr2+IIq1gXxi28k2Wj0gGAdPOuruYnTSFOXLv0I" type="module" crossorigin defer></script>
</head>

<body>
    <main role="main" class="container-fluid pt-3">
        <?= ui::slot('header') ?>
        <?= $body ?>
        <?= ui::slot('aside') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>