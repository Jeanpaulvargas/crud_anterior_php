<?php

require '../../models/cita.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];

try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_POST['tipo'] ?? null; 
            $cita = new Cita($_POST);
            
            switch ($tipo) {
                case '1':
                    $ejecucion = $cita->guardar();
                    $mensaje = "Guardado correctamente";
                    break;


                default:
                    throw new Exception('Tipo de operación no válido');
            }

            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => 1,
            ]);
            break;

        case 'GET':

            $fechaCita = isset($_GET['cit_fecha']) ? $_GET['cit_fecha'] : '';
            $pacienteId = isset($_GET['cit_paciente_id']) ? $_GET['cit_paciente_id'] : '';

            $cita = new Cita([
                'cit_fecha' => $fechaCita,
                'cit_paciente_id' => $pacienteId
            ]);
            
            $citas = $cita->buscar(); 
            http_response_code(200);
            echo json_encode($citas);
            break;

        default:
            http_response_code(405);
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;
