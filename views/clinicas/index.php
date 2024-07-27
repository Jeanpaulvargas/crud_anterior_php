<?php 
include_once '../../includes/header.php';
include_once '../../models/medico.php';
?>

<?php
$verMedico = new medico();
$medicos = $verMedico->mostrarMedicos();

?>

<div class="container">
    <h1 class="text-center">Formulario de clinicas</h1>
    <div class="row justify-content-center mb-3">
        <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="clinica_id" id="clinica_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="clin_nombre">Nombre de la Clínica</label>
                    <input type="text" name="clin_nombre" id="clin_nombre" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="clin_sala">Número de Sala</label>
                    <input type="text" name="clin_sala" id="clin_sala" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="clin_medico_id">Médico Asignado</label>
                    <select id="clin_medico_id" name="clin_medico_id" class="form-control">
                    <option value="">SELECCIONE</option>
                    <?php foreach ($medicos as $medico) : ?>
                        <option value="<?= $medico['medico_id'] ?>">
                            <?= $medico['medi_nombres'] ?>
                            <?= $medico['medi_apellidos'] ?>
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
                    <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
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
            <h2 class="text-center">Listado de clinicas</h2>
            <table class="table table-bordered table-hover" id="tablaclinicas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Clinica</th>
                        <th>Sala</th>
                        <th>Medico</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay medicos disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script defer src="/crud_js/src/js/funciones.js"></script> -->

<script defer src="/crud_js/src/js/clinicas/index.js"></script>

<?php include_once '../../includes/footer.php' ?>