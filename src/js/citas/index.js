const btnGuardar = document.getElementById('btnGuardar');
const btnBuscar = document.getElementById('btnBuscar');
const btnCancelar = document.getElementById('btnCancelar');
const tablacitas = document.getElementById('tablacitas');
const formulario = document.querySelector('form');

btnCancelar.parentElement.style.display = 'none';

const getCitas = async (alerta = 'si') => {
    const pacienteId = formulario.cit_paciente_id.value;
    const fecha = formulario.cit_fecha.value;
    const url = `/crud_js/controllers/citas/index.php?cit_paciente_id=${pacienteId}&cit_fecha=${fecha}`;
    const config = {
        method: 'GET'
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablacitas.tBodies[0].innerHTML = '';
        const fragment = document.createDocumentFragment();
        let contador = 1;

        if (respuesta.status == 200) {
            if (alerta == 'si') {
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Citas encontradas',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }

            if (data.length > 0) {
                data.forEach(cita => {
                    const tr = document.createElement('tr');
                    const celda1 = document.createElement('td');
                    const celda2 = document.createElement('td');
                    const celda3 = document.createElement('td');
                    const celda4 = document.createElement('td');
                    const celda5 = document.createElement('td');
                    const celda6 = document.createElement('td');
                    const celda7 = document.createElement('td');

                    celda1.innerText = contador;
                    celda2.innerText = cita.paci_nombres || 'No disponible';
                    celda3.innerText = cita.cit_fecha || 'No disponible';
                    celda4.innerText = cita.clin_nombre || 'No disponible';
                    celda5.innerText = cita.medi_nombres || 'No disponible';
                    celda6.innerText = cita.paci_dpi || 'No disponible';
                    celda7.innerText = cita.paci_referido || 'No disponible';

                    tr.appendChild(celda1);
                    tr.appendChild(celda2);
                    tr.appendChild(celda3);
                    tr.appendChild(celda4);
                    tr.appendChild(celda5);
                    tr.appendChild(celda6);
                    tr.appendChild(celda7);

                    fragment.appendChild(tr);

                    contador++;
                });
            } else {
                const tr = document.createElement('tr');
                const td = document.createElement('td');
                td.innerText = 'No hay citas disponibles';
                td.colSpan = 7; 

                tr.appendChild(td);
                fragment.appendChild(tr);
            }
        } else {
            console.log('Error al cargar citas');
        }

        tablacitas.tBodies[0].appendChild(fragment);
    } catch (error) {
        console.log(error);
    }
}

const guardarCita = async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;

    const url = '/crud_js/controllers/citas/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 1);
    formData.delete('cita_id');
    

    let fecha = new Date(formulario.cit_fecha.value);
    if (isNaN(fecha.getTime())) {
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Formato de fecha inválido',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
        btnGuardar.disabled = false;
        return;
    }
    formData.set('cit_fecha', fecha.toISOString().slice(0, 16).replace('T', ' '));

    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo } = data;

        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: codigo === 1 ? "success" : "error",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();

        if (codigo === 1) {
            getCitas('no');
            formulario.reset();
        }
    } catch (error) {
        console.log('Error al guardar cita:', error);
    } finally {
        btnGuardar.disabled = false;
    }
}

btnGuardar.addEventListener('click', guardarCita);
btnBuscar.addEventListener('click', getCitas);
btnCancelar.addEventListener('click', () => {
    formulario.reset();
    btnCancelar.parentElement.style.display = 'none';
    btnGuardar.disabled = false;
});
