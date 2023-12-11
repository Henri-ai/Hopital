<div class="container">

    <h1 class="text-center py-5">Profil du patient</h1>
    <section>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0 d-flex justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="card-body p-4">
                                <h2>Information</h2>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Nom :</h6>
                                        <p class="text-muted"><?= $patients->getLastname() ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Prénom :</h6>
                                        <p class="text-muted"><?= $patients->getFirstname() ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Date de naissance:</h6>
                                        <p class="text-muted"><?= date('d/m/Y',strtotime($patients->getBirthdate())) ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Rendez-vous le:</h6>
                                        <?php foreach ($infos as $key => $info) {?>
                                            <p class="text-muted"><?=date('d-m-Y H:i',strtotime($info->dateHour))?></p>
                                        <?php }?>
                                            
                                        
                                        
                                    </div>
                                    <h2>Coordonnées</h2>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Adresse mail:</h6>
                                            <a href="mailto:<?=$patients->getMail()?>" class="text-decoration-none"><p class="d-flex align-items-center justify-content-center"><i class=" mx-1 fa-regular fa-envelope fa-lg"></i><?= $patients->getMail() ?></p></a>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Téléphone:</h6>
                                            <a href="tel:<?=$patients->getPhone()?>" class="text-decoration-none"><p class="d-flex align-items-center justify-content-center"><i class="mx-1 fa-solid fa-square-phone fa-lg"></i><?= $patients->getPhone() ?></p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="/controllers/updatePatientCtrl.php?id=<?=$patients->getId()?>">Modifier un patient</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>