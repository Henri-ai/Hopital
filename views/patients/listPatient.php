<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col">
            <section>
                <div class="row py-4 ">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="/controllers/addPatientCtrl.php">Ajouter un patient</a></button>
                    </div>
                    <div class="col-4 text-center">
                        <h2>La liste des patients</h2>
                    </div>
                    <div class="col-5 d-flex justify-content-center">
                        <form role="search" action="/controllers/listPatientCtrl.php">
                            <div class="d-flex">
                                <input name="search" class="form-control" type="search" placeholder="Rechercher un patient" aria-label="Search">
                                <button class="btn btn-outline-primary m-1" type="submit">Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-success fst-italic"><?=$message ?? ''?></div>
                </div>
                
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr class="text-center">
                            <th>Profil</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Téléphone</th>
                            <th>Adresse mail</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($patients as $patient) { ?>
                        
                            <tr>
                                <td><a href="/controllers/profilPatientCtrl.php?id=<?=$patient->id?>"><i class="fa-solid fa-user d-flex justify-content-center"></i></a></td>
                                <td><?= $patient->lastname ?></td>
                                <td><?= $patient->firstname ?></td>
                                <td><?= date('d/m/Y', strtotime($patient->birthdate))?></td>
                                <td><a class="text-decoration-none " href="tel:<?=$patient->phone?>"><?= $patient->phone ?></a></td>
                                <td><a class="text-decoration-none " href="mailto:<?=$patient->mail?>"><?= $patient->mail ?></a></td>
                                <td><button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="/controllers/listPatientCtrl.php?id=<?=$patient->id?>">Supprimer</a></button></td>
                            </tr>
                        <?php }
                            ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav>
                        <ul class="pagination">
                            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                            <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
                                <a href="/controllers/listPatientCtrl.php?page=<?= $page - 1 ?>" class="page-link">Précédente</a>
                            </li>
                            <?php for($i = 1; $i <= $pages; $i++): ?>
                                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                <li class="page-item <?= ($page == $i) ? "active" : "" ?>">
                                    <a href="/controllers/listPatientCtrl.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                                </li>
                            <?php endfor ?>
                                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                                <li class="page-item <?= ($page == $pages) ? "disabled" : "" ?>">
                                <a href="/controllers/listPatientCtrl.php?page=<?= $page + 1 ?>" class="page-link">Suivante</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
    </div>
</div>