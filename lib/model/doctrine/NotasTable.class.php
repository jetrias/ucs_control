<?php

/**
 * NotasTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class NotasTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object NotasTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Notas');
    }

    public static function getNotasGrado($id) {
        $sql = "SELECT a.*,b.id as identificador, b.descripcion
FROM notas a
inner join unidad_curricular b on a.unidad_curricular=b.cod_unerg
WHERE pasaporte ilike '%$id%' order by b.id";
//        echo $sql;exit();
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public static function getNotasGrado2($id) {
        $sql = "SELECT a.*,b.id as identificador, b.descripcion,b.cod_ubv
FROM notas a
left join unidad_curricular b on a.unidad_curricular_id::int=b.id
WHERE a.estudiante_id =$id order by b.id";
        
//        echo $sql;exit();
        $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($sql);
        return $q;
    }

    public function obtenerNotasEst() {
        $id = sfContext::getInstance()->getUser()->getAttribute('estudiante_id');
        $q = Doctrine_Query::create()
                ->from('notas n')
                ->addWhere('estudiante_id=?', $id);
        return $q;
    }

}
