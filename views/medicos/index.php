<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Formulario de Medicos</h1>
    <div class="row justify-content-center mb-3">
        <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="medico_id" id="medico_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="medi_nombres">Nombres</label>
                    <input type="text" name="medi_nombres" id="medi_nombres" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">

                    <label for="medi_apellidos">Apellidos</label>
                    <input type="text" name="medi_apellidos" id="medi_apellidos" class="form-control" required>



                </div>
            </div>
            <div class="row mb-3">
                <div class="col">

                    <label for="medi_especialidad">Especialidad</label>
                    <input type="text" name="medi_especialidad" id="medi_especialidad" class="form-control" required>

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
            <h2 class="text-center">Listado de medicos</h2>
            <table class="table table-bordered table-hover" id="tablamedicos">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>

                        <th>Especialidad</th>

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

<script defer src="/crud_js/src/js/medicos/index.js"></script>

<?php include_once '../../includes/footer.php' ?>



