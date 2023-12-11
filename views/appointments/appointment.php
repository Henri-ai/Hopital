<div class="container">

    <h1 class="text-center py-5">Details du rendez-vous</h1>
    <section>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0 d-flex justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="card-body p-4">
                                <h2>Patient</h2>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Nom :</h6>
                                        <p class="text-muted"><?=$appointments->lastname?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Prénom :</h6>
                                        <p class="text-muted"><?=$appointments->firstname?></p>
                                    </div>
                                    <h2>Horaires du rendez-vous</h2>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1 d-flex justify-content-center">
                                        <div class="col-6 mb-3">
                                            <h6>Date & Heure du rendez-vous :</h6>
                                            <p class="d-flex align-items-center justify-content-center"><?=$formatFrench?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                            <button type="button" class="btn btn-primary mb-2"><a class="text-white text-decoration-none" href="/controllers/updateAppointmentCtrl.php?id=<?=$appointments->idAppointments?>">Modifier le rendez-vous</a></button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>