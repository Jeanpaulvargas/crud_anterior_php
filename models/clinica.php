<?php
require_once 'conexion.php';

class clinica extends Conexion
{
    public $clinica_id;
    public $clin_nombre;
    public $clin_sala;
    public $clin_medico_id;
    public $clinica_situacion;


    public function __construct($args = [])
    {
        $this->clinica_id = $args['clinica_id'] ?? null;
        $this->clin_nombre = $args['clin_nombre'] ?? '';
        $this->clin_sala = $args['clin_sala'] ?? '';
        $this->clin_medico_id = $args['clin_medico_id'] ?? '';
        $this->clinica_situacion = $args['clinica_situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO clinicas (clin_nombre, clin_sala, clin_medico_id,  clinica_situacion) values('$this->clin_nombre','$this->clin_sala','$this->clin_medico_id','$this->clinica_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscar()
    {
        $sql = "SELECT clinicas.*, medico.*
        FROM clinicas
        INNER JOIN medico ON clinicas.clin_medico_id = medico.medico_id
        WHERE clinicas.clinica_situacion = 1";

        if ($this->clin_nombre != '') {
            $sql .= " and clin_nombre like '%$this->clin_nombre%' ";
        }

        if ($this->clin_sala != '') {
            $sql .= " and clin_sala  like '%$this->clin_sala%' ";
        }

        if ($this->clin_medico_id != '') {
            $sql .= " and clin_medico_id = %$this->clin_medico_id% ";
        }


        if ($this->clinica_id != null) {
            $sql .= " and clinica_id = $this->clinica_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE clinicas SET clin_nombre = '$this->clin_nombre', clin_sala = '$this->clin_sala', clin_medico_id = '$this->clin_medico_id'  where clinica_id = $this->clinica_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE clinicas SET clinica_situacion = 0 where clinica_id = $this->clinica_id";


        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscarClinicas()
    {
        $sql = " SELECT * FROM clinicas where clinica_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }
}
