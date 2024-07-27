<?php
require_once 'conexion.php';

class paciente extends Conexion
{
    public $paciente_id;
    public $paci_nombres;
    public $paci_apellidos;
    public $paci_dpi;
    public $paci_sexo;
    public $paci_referido;
    public $paciente_situacion;


    public function __construct($args = [])
    {
        $this->paciente_id = $args['paciente_id'] ?? null;
        $this->paci_nombres = $args['paci_nombres'] ?? '';
        $this->paci_apellidos = $args['paci_apellidos'] ?? '';
        $this->paci_dpi = $args['paci_dpi'] ?? '';
        $this->paci_sexo = $args['paci_sexo'] ?? '';
        $this->paci_referido = $args['paci_referido'] ?? '';
        $this->paciente_situacion = $args['paciente_situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO paciente(paci_nombres, paci_apellidos, paci_dpi, paci_sexo, paci_referido, paciente_situacion) values('$this->paci_nombres','$this->paci_apellidos','$this->paci_dpi','$this->paci_sexo','$this->paci_referido','$this->paciente_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscar()
    {
        $sql = "SELECT * from paciente where paciente_situacion = 1 ";

        if ($this->paci_nombres != '') {
            $sql .= " and paci_nombres like '%$this->paci_nombres%' ";
        }

        if ($this->paci_apellidos != '') {
            $sql .= " and paci_apellidos  like '%$this->paci_apellidos%' ";
        }

        if ($this->paci_dpi != '') {
            $sql .= " and paci_dpi = %$this->paci_dpi% ";
        }

        if ($this->paci_sexo != '') {
            $sql .= " and paci_sexo = %$this->paci_sexo% ";
        }

        if ($this->paci_referido != '') {
            $sql .= " and paci_referido = %$this->paci_referido% ";
        }

        if ($this->paciente_id != null) {
            $sql .= " and paciente_id = $this->paciente_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE paciente SET paci_nombres = '$this->paci_nombres', paci_apellidos = '$this->paci_apellidos', paci_dpi = '$this->paci_dpi', paci_sexo = '$this->paci_sexo', paci_referido = $this->paci_referido   where paciente_id = $this->paciente_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE paciente SET paciente_situacion = 0 where paciente_id = $this->paciente_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscarPacientes()
    {
        $sql = " SELECT  TRIM(paci_nombres) ||  ' ' || TRIM(paci_apellidos) || ' ' AS nombres, paciente_id FROM paciente where paciente_situacion = 1";

        $resultado = self::servir($sql);


        return $resultado;
    }
}
