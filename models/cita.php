<?php

require_once 'conexion.php';

class Cita extends Conexion
{
    public $cita_id;
    public $cit_fecha;
    public $cit_situacion;
    public $cit_clinica_id;
    public $cit_paciente_id;

    public function __construct($args = [])
    {
        $this->cita_id = $args['cita_id'] ?? null;
        $this->cit_fecha = $args['cit_fecha'] ?? '';
        $this->cit_situacion = $args['cit_situacion'] ?? 1;
        $this->cit_clinica_id = $args['cit_clinica_id'] ?? '';
        $this->cit_paciente_id = $args['cit_paciente_id'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO cita (cit_fecha, cit_clinica_id, cit_paciente_id) VALUES ('$this->cit_fecha', '$this->cit_clinica_id', '$this->cit_paciente_id')";
        $resultado = $this->ejecutar($sql);
    
        if ($resultado) {
        
            $sql = "SELECT 
                        clinicas.clin_nombre, 
                        medico.medi_nombres, 
                        paciente.paci_nombres, 
                        paciente.paci_dpi, 
                        cita.cit_fecha,  
                        paciente.paci_referido 
                    FROM cita
                    INNER JOIN clinicas ON cita.cit_clinica_id = clinicas.clinica_id 
                    INNER JOIN paciente ON cita.cit_paciente_id = paciente.paciente_id 
                    INNER JOIN medico ON clinicas.clin_medico_id = medico.medico_id
                    WHERE cita.cit_situacion = 1
                      AND cita.cit_fecha = '$this->cit_fecha'
                      AND cita.cit_clinica_id = '$this->cit_clinica_id'
                      AND cita.cit_paciente_id = '$this->cit_paciente_id'";
                    
            $resultado = self::servir($sql);
        }
    
        return $resultado;
    }
    


    public function buscarPorFecha($fechaCita = '', $pacienteId = '')
    {
        $sql = "SELECT 
                    clinicas.clin_nombre, 
                    medico.medi_nombres, 
                    paciente.paci_nombres, 
                    paciente.paci_dpi, 
                    cita.cit_fecha,  
                    paciente.paci_referido 
                FROM cita
                INNER JOIN clinicas ON cita.cit_clinica_id = clinicas.clinica_id 
                INNER JOIN paciente ON cita.cit_paciente_id = paciente.paciente_id 
                INNER JOIN medico ON clinicas.clin_medico_id = medico.medico_id
                WHERE cita.cit_situacion = 1";
        
        if ($fechaCita != '') {
            $sql .= " AND cita.cit_fecha = '$fechaCita'";
        }
    
        if ($pacienteId != '') {
            $sql .= " AND cita.cit_paciente_id = '$pacienteId'";
        }
    
        $resultado = self::servir($sql);
        return $resultado;
    }
    


    public function buscar()
    {
        $sql = "SELECT 
                    clinicas.clin_nombre, 
                    medico.medi_nombres, 
                    paciente.paci_nombres, 
                    paciente.paci_dpi, 
                    cita.cit_fecha,  
                    paciente.paci_referido 
                FROM cita
                INNER JOIN clinicas ON cita.cit_clinica_id = clinicas.clinica_id 
                INNER JOIN paciente ON cita.cit_paciente_id = paciente.paciente_id 
                INNER JOIN medico ON clinicas.clin_medico_id = medico.medico_id
                WHERE cita.cit_situacion = 1";
        

    
        $resultado = self::servir($sql);
        return $resultado;
    }
}
