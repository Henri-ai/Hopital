<div class="container d-flex justify-content-center ">
    <section>
        <h1 class="text-center py-5">Ajouter un patient et un rendez-vous</h1>
        <div class="row">
            <div class="col">
                <form method="post" novalidate>
                    <div class="col">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Nom :</label>
                            <input name="lastname" type="text" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" id="lastname" maxlength="25" value="<?= $lastname ?? '' ?>" pattern="<?= REGEX_NAME ?>" required>
                            <small id="lastnameError" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Prénom :</label>
                            <input name="firstname" type="text" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" id="firstname" maxlength="25" value="<?= $firstname ?? '' ?>" pattern="<?= REGEX_NAME ?>" required>
                            <small id="firstnameError" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Date de naissance :</label>
                            <input name="birthdate" type="date" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" id="birthdate" min="1890-01-01" max="<?= date('Y-m-d') ?>" value="<?= $birthdate ?? '' ?>" required>
                            <small id="birthdateError" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone :</label>
                            <input name="phone" type="text" class="form-control <?= isset($error['phone']) ? 'errorField' : '' ?>" id="phone" value="<?= $phone ?? '' ?>" pattern="<?= REGEX_PHONE ?>">
                            <small id="phoneError" class="form-text error"><?= $error['phone'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">mail :</label>
                            <input name="mail" type="email" class="form-control <?= isset($error['mail']) ? 'errorField' : '' ?>" id="mail" maxlength="100" value="<?= $mail ?? '' ?>" required>
                            <small id="mailError" class="form-text error"><?= $error['mail'] ?? '' ?></small>
                        </div>
                    </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="dateAppointment" class="form-label">Date du rendez-vous :</label>
                    <input name="dateAppointment" type="date" class="form-control <?= isset($error['dateAppointment']) ? 'errorField' : '' ?>" id="dateAppointment" min="<?= date('Y-m-d') ?>" max="" value="<?= $dateAppointment ?? '' ?>" required>
                    <small id="dateAppointmentError" class="form-text error"><?= $error['dateAppointment'] ?? '' ?></small>
                </div>
                <div class="mt-5">
                    <select name="hourAppointment" id="hourAppointment" class="form-select <?= isset($error['hourAppointment']) ? 'errorField' : '' ?>" required>
                        <option value="">Séléctionner l'heure du rendez-vous</option>
                        <?php foreach (HOUR as $key => $hour) { ?>
                            <option value="<?= $hour ?>"><?= $hour ?></option>
                        <?php } ?>
                    </select>
                    <small class="form-text error"><?= $error['hourAppointment'] ?? '' ?></small>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <input type="submit" value="Créer le patient" class="btn btn-primary mt-3" id="validForm">
        </div>
    </form>
    </section>
</div>