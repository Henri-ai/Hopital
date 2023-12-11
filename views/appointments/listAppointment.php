<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col">
            <section>
                <div class="row py-5">
                    <div class="col-5">
                        <button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="/controllers/addAppointmentCtrl.php">Ajouter un rendez-vous</a></button>
                    </div>
                    <div class="col-7">
                        <h2 class="text-center ">La liste des rendez-vous</h2>
                    </div>
                </div>
                
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr class="text-center">
                            <th>Profil</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date et heure du rendez-vous</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($patients as $key => $patient) { ?>
                            <tr>
                                <td><a class="text-decoration-none" href="/controllers/appointmentCtrl.php?id=<?=$patient->idAppointments?>"><i class="mt-2 fa-solid fa-circle-info fa-lg d-flex justify-content-center"></i></a></td>
                                <td><?= $patient->lastname ?></td>
                                <td><?= $patient->firstname ?></td>
                                <td><?=date('d-m-Y H:i',strtotime($patient->dateHour))?></td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$key?>">
                                        Supprimer
                                    </button>
                                    <div class="modal fade" id="exampleModal<?=$key?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$key?>" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel<?=$key?>">Attention !</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez-vous supprimer le rendez-vous
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-primary"><var onclick="location.href='/controllers/listAppointmentCtrl.php?id=<?=$patient->idAppointments?>&action=delete'">Valider</var></button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</div>