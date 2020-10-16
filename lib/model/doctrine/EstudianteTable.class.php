<?php

/**
 * EstudianteTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EstudianteTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object EstudianteTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Estudiante');
    }
/*------------------------- FUNCION FORM = BUSCARUSUARIO  -------------------------*/
    /**
     * @param $personati string variable contentiva del tipo de identificacion
     * @param $persona_id string variable contentiva del numero de identificacion
     * 
     * **/
    public static function buscaPersona($personati, $persona_ide) {
        $sql = "SELECT *
                FROM estudiante
                WHERE tipo_identificacion='$personati'
                AND identificacion='$persona_ide'";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }
/*------------------------- FUNCION FORM = BUSCAR(REGISTRAR)  -------------------------*/
    public static function buscaCorreoAlumno($correo_alumno){
        $sql="SELECT COUNT(correo_electronico)
              FROM estudiante
              WHERE correo_electronico = '$correo_alumno'";
        $q=Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }
    public static function buscarEstudiante($id) {
        $sql = "select a.*,b.descripcion as pais,c.descripcion as sexo,d.descripcion as estado_asic,
            e.descripcion as municipio_asic,f.descripcion as estado,g.descripcion as municipio,
            h.descripcion as parroquia
                from estudiante a 
                left join pais_origen b on a.pais_origen_id=b.id 
                left join sexo c on a.sexo_id=c.id
                left join estado d on a.asic_estado_id=d.id
                left join municipio e on a.asic_municipio_id=e.id
                left join estado f on a.estado_id=f.id
                left join municipio g on a.municipio_id=g.id
                left join parroquia h on a.parroquia_id=h.id
                where a.id=$id";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public static function buscarEse($id) {
        $sql = "select * from estudio_socioeconomico where estudiante_id=$id";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public static function buscarTipo($id) {
        $sql = "select n_ingreso from estudiante where id=$id";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public static function activarEstudiante($id) {
        $sql = "update estudiante set estatus='ACTIVO', verificado=true, fecha_verificacion=now() where id=$id";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public static function licenciaEstudiante($id) {
        $sql = "update estudiante set estatus='LICENCIA', verificado=true, fecha_verificacion=now() where id=$id";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public static function bajaEstudiante($id) {
        $sql = "update estudiante set estatus='BAJA', verificado=true, fecha_verificacion=now() where id=$id";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public function obtenerEstudiante() {
        $id=$this->getUser()->getAttribute('estudiante_id');
        $q = Doctrine_Query::create()
                ->from('Estudiante e')
                ->addWhere('id=?', $id);
        return $q;
    }

    public static function obtener_estudiante($id) {
        $sql = "select * from estudiante where id=$id";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }
    public static function obtener_estudiante_estado($id) {
        $sql = "select * from estudiante where estado_id=$id and notas='SI-9-2'";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }
    public static function obtener_estudiante_estado_ri($id) {
        $sql = "select * from estudiante where estado_id=$id and notas='SI-RI'";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }


        public static function obtener_estudiante_senamecf() {
        $sql = "select * from estudiante where notas='SENAMECF'";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }
    public static function insertaEstudiante($tipo,$nombres,$cedula){
        $nombre=explode(',',$nombres);
        $sql="insert into estudiante (tipo_identificacion, identificacion, primer_nombre, primer_apellido,"
                . "telefono,telefono_casa,correo_electronico,persona_contacto,estado_civil_id,estatus,notas) values"
                . " ('$tipo','$cedula','".trim($nombre[1])."','".trim($nombre[0])."',0,0,' ',' ',1,'ACTIVO','SENAMECF')";
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }
}
