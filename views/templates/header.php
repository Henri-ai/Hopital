<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="/public/assets/css/styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5b1fd06657.js" crossorigin="anonymous"></script>
    <title>Hopital</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">HOPITAL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../controllers/listPatientCtrl.php">Liste des patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../controllers/listAppointmentCtrl.php">Liste des rendez-vous</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>