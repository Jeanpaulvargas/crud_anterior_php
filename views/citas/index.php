<?php 
include_once '../../includes/header.php';
include_once '../../models/paciente.php';
include_once '../../models/clinica.php';
?>

<?php

$buscarPaciente = new Paciente();
$pacientes = $buscarPaciente->buscarPacientes();

$buscarClinica = new Clinica();
$clinicas = $buscarClinica->buscarClinicas();
?>

<div class="container">
    <h1 class="text-center">Formulario de citas</h1>
    <div class="row justify-content-center mb-3">
        <form class="col-lg-8 border bg-light p-3" id="formCita" action="../../controllers/citas/index.php" method="POST">
            <input type="hidden" name="tipo" value="1"> <!-- Tipo para insertar -->
            <input type="hidden" name="cita_id" id="cita_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="cit_paciente_id">PACIENTE</label>
                    <select id="cit_paciente_id" name="cit_paciente_id" class="form-control" required>
                        <option value="">SELECCIONE</option>
                        <?php foreach ($pacientes as $paciente) : ?>
                            <option value="<?= $paciente['paciente_id'] ?>">
                                <?= $paciente['nombres'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="cit_fecha">FECHA DE LA CITA</label>
                    <input type="datetime-local" name="cit_fecha" id="cit_fecha" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="cit_clinica_id">CLÍNICA</label>
                    <select id="cit_clinica_id" name="cit_clinica_id" class="form-control" required>
                        <option value="">SELECCIONE</option>
                        <?php foreach ($clinicas as $clinica) : ?>
                            <option value="<?= $clinica['clinica_id'] ?>">
                                <?= $clinica['clin_nombre'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col">
                    <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnCancelar" class="btn btn-secondary w-100">Cancelar</button>
                </div>
                <div class="col">
                    <button type="reset" id="btnLimpiar" class="btn btn-secondary w-100">Limpiar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Listado de citas</h2>
            <table class="table table-bordered table-hover" id="tablacitas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Paciente</th>
                        <th>Fecha</th>
                        <th>Clínica</th>
                        <th>Nombre Médico</th>
                        <th>DPI Paciente</th>
                        <th>Recomendado</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script defer src="/crud_js/src/js/funciones.js"></script>
<script defer src="/crud_js/src/js/citas/index.js"></script>

<?php include_once '../../includes/footer.php'; ?>
