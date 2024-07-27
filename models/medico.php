<?php
require_once 'conexion.php';

class medico extends Conexion
{
    public $medico_id;
    public $medi_nombres;
    public $medi_apellidos;
    public $medi_especialidad;
    public $medico_situacion;


    public function __construct($args = [])
    {
        $this->medico_id = $args['medico_id'] ?? null;
        $this->medi_nombres = $args['medi_nombres'] ?? '';
        $this->medi_apellidos = $args['medi_apellidos'] ?? '';
        $this->medi_especialidad = $args['medi_especialidad'] ?? '';
        $this->medico_situacion = $args['medico_situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO medico(medi_nombres, medi_apellidos, medi_especialidad,  medico_situacion) values('$this->medi_nombres','$this->medi_apellidos','$this->medi_especialidad','$this->medico_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscar()
    {
        $sql = "SELECT * from medico where medico_situacion = 1 ";

        if ($this->medi_nombres != '') {
            $sql .= " and medi_nombres like '%$this->medi_nombres%' ";
        }

        if ($this->medi_apellidos != '') {
            $sql .= " and medi_apellidos  like '%$this->medi_apellidos%' ";
        }

        if ($this->medi_especialidad != '') {
            $sql .= " and medi_especialidad = %$this->medi_especialidad% ";
        }


        if ($this->medico_id != null) {
            $sql .= " and medico_id = $this->medico_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE medico SET medi_nombres = '$this->medi_nombres', medi_apellidos = '$this->medi_apellidos', medi_especialidad = '$this->medi_especialidad'  where medico_id = $this->medico_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    
    public function mostrarMedicos (){
        $sql = "SELECT * FROM medico where medico_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;


    }

    public function eliminar()
    {
        $sql = "UPDATE medico SET medico_situacion = 0 where medico_id = $this->medico_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }


}





