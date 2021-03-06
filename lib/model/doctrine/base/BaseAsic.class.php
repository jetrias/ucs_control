<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Asic', 'doctrine');

/**
 * BaseAsic
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property integer $municipio_id
 * @property integer $estado_id
 * @property integer $parroquia_id
 * @property Doctrine_Collection $Estudiante
 * @property Doctrine_Collection $Estudiante_16
 * @property Doctrine_Collection $Traslado
 * @property Doctrine_Collection $Traslado_7
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getDescripcion()   Returns the current record's "descripcion" value
 * @method integer             getMunicipioId()   Returns the current record's "municipio_id" value
 * @method integer             getEstadoId()      Returns the current record's "estado_id" value
 * @method integer             getParroquiaId()   Returns the current record's "parroquia_id" value
 * @method Doctrine_Collection getEstudiante()    Returns the current record's "Estudiante" collection
 * @method Doctrine_Collection getEstudiante16()  Returns the current record's "Estudiante_16" collection
 * @method Doctrine_Collection getTraslado()      Returns the current record's "Traslado" collection
 * @method Doctrine_Collection getTraslado7()     Returns the current record's "Traslado_7" collection
 * @method Asic                setId()            Sets the current record's "id" value
 * @method Asic                setDescripcion()   Sets the current record's "descripcion" value
 * @method Asic                setMunicipioId()   Sets the current record's "municipio_id" value
 * @method Asic                setEstadoId()      Sets the current record's "estado_id" value
 * @method Asic                setParroquiaId()   Sets the current record's "parroquia_id" value
 * @method Asic                setEstudiante()    Sets the current record's "Estudiante" collection
 * @method Asic                setEstudiante16()  Sets the current record's "Estudiante_16" collection
 * @method Asic                setTraslado()      Sets the current record's "Traslado" collection
 * @method Asic                setTraslado7()     Sets the current record's "Traslado_7" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAsic extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asic');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'asic_id',
             'length' => 4,
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('municipio_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('estado_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('parroquia_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Estudiante', array(
             'local' => 'id',
             'foreign' => 'asic_id'));

        $this->hasMany('Estudiante as Estudiante_16', array(
             'local' => 'id',
             'foreign' => 'asic_hab_id'));

        $this->hasMany('Traslado', array(
             'local' => 'id',
             'foreign' => 'asic_emisor_id'));

        $this->hasMany('Traslado as Traslado_7', array(
             'local' => 'id',
             'foreign' => 'asic_receptor_id'));
    }
}