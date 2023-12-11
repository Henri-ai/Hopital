
<div class="container d-flex justify-content-center ">
    <div class="col-lg-4">
        <section>
            <h1 class="text-center py-5">Modifier le rendez-vous</h1>

            <form method="post" novalidate>
                <div class="mb-3">
                    <select name="patientAppointment" id="patientAppointment" class="form-select <?= isset($error['patientAppointment']) ? 'errorField' : '' ?>" value="<?= $patientAppointment ?? '' ?>" aria-describedby="patientAppointmentHelp" required>
                        <option value="">Séléctionner le patient</option>
                        <?php foreach ($patients as $patient) { 
                                $isSelectedIdentity = ($appointment->idPatients==$patient->id) ? 'selected' : '';?>
                            <option value="<?= $patient->id ?>"<?=$isSelectedIdentity?>><?= $patient->lastname . ' ' . $patient->firstname ?></option>
                        <?php } ?>
                    </select>
                    <small class="form-text error"><?= $error['patientAppointment'] ?? '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="dateAppointment" class="form-label">Date du rendez-vous :</label>
                    <input name="dateAppointment" type="date" class="form-control <?= isset($error['dateAppointment']) ? 'errorField' : '' ?>" id="dateAppointment" min="<?= date('Y-m-d') ?>" max="" value="<?=date('Y-m-d',strtotime($appointment->dateHour))?>" required>
                    <small id="dateAppointmentError" class="form-text error"><?= $error['dateAppointment'] ?? '' ?></small>
                </div>
                <div>

                    <select name="hourAppointment" id="hourAppointment" class="form-select <?= isset($error['hourAppointment']) ? 'errorField' : '' ?>" required>
                        <option value="">Séléctionner l'heure du rendez-vous</option>
                        <?php foreach (HOUR as  $hour) { 
                            $isSelectedHour = ($hour == date('H:i',strtotime($appointment->dateHour))) ? 'selected' : '';?>
                            <option value="<?=$hour?>" <?=$isSelectedHour?>><?= date('H:i',strtotime($hour))?></option>
                        <?php }?>
                    </select>
                    <small class="form-text error"><?= $error['hourAppointment'] ?? '' ?></small>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Ajouter" class="btn btn-primary mt-3" id="validFormAppointment">
                </div>
            </form>
        </section>
    </div>
</div>



