<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Formulario de Pacientes</h1>
    <div class="row justify-content-center mb-3">
        <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="paciente_id" id="paciente_id">
            <div class="row mb-3">
            <div class="col">
                <label for="paci_nombres">Nombres</label>
                <input type="text" name="paci_nombres" id="paci_nombres" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_apellidos">Apellidos</label>
                <input type="text" name="paci_apellidos" id="paci_apellidos" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_dpi">DPI</label>
                <input type="text" name="paci_dpi" id="paci_dpi" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="paci_sexo">Género</label>
                <select name="paci_sexo" id="paci_sexo" class="form-select">
                    <option value="">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="col-6">
                <label for="paci_referido">Referencias</label>
                <select name="paci_referido" id="paci_referido" class="form-select">
                    <option value="">Seleccione una Opción</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
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
            <h2 class="text-center">Listado de pacientes</h2>
            <table class="table table-bordered table-hover" id="tablapacientes">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dpi</th>
                        <th>Genero</th>
                        <th>Referido</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay pacientes disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script defer src="/crud_js/src/js/funciones.js"></script> -->

<script defer src="/crud_js/src/js/pacientes/index.js"></script>

<?php include_once '../../includes/footer.php' ?>

