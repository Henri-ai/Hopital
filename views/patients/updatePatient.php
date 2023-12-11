<div class="container d-flex justify-content-center ">
    <div class="col-lg-4 ">
        <section>
            <h1 class="text-center py-5">Modifier le patient</h1>
            <?=$message ?? '' ?>
            <form method="post" action="" novalidate>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom :</label>
                    <input name="lastname" type="text" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" id="lastname" maxlength="25" value="<?=$patients->getLastname()?>" pattern="<?= REGEX_NAME ?>" required>
                    <small id="lastnameError" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom :</label>
                    <input name="firstname" type="text" class="form-control <?= isset($error['firstname']) ? 'errorField' : ''?>" id="firstname" maxlength="25" value="<?=$patients->getFirstname()?>" pattern="<?= REGEX_NAME ?>" required>
                    <small id="firstnameError" class="form-text error"><?= $error['firstname'] ?? ''?></small>
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Date de naissance :</label>
                    <input name="birthdate" type="date" class="form-control <?= isset($error['birthdate']) ? 'errorField' : ''?>" id="birthdate" min="1890-01-01" max="<?=date('Y-m-d')?>" value="<?=$patients->getBirthdate()?>" required>
                    <small id="birthdateError" class="form-text error"><?= $error['birthdate'] ?? ''?></small>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone :</label>
                    <input name="phone" type="text" class="form-control <?= isset($error['phone']) ? 'errorField' : ''?>" id="phone" value="<?=$patients->getPhone()?>" pattern="<?= REGEX_PHONE ?>">
                    <small id="phoneError" class="form-text error"><?= $error['phone'] ?? '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">mail :</label>
                    <input name="mail" type="email" class="form-control <?= isset($error['mail']) ? 'errorField' : ''?>" id="mail" maxlength="100" value="<?=$patients->getMail()?>" required>
                    <small id="mailError" class="form-text error"><?= $error['mail'] ?? ''?></small>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Confirmer" class="btn btn-primary mt-3" id="confirmForm">
                </div>
            </form>
        </section>
    </div>
</div>
