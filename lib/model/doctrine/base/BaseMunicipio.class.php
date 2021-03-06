<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Municipio', 'doctrine');

/**
 * BaseMunicipio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property integer $estado_id
 * @property integer $municipio_codigo
 * @property Doctrine_Collection $Estudiante
 * @property Doctrine_Collection $Estudiante_7
 * @property Doctrine_Collection $Preinscripcion
 * @property Doctrine_Collection $Traslado
 * @property Doctrine_Collection $Traslado_5
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getDescripcion()      Returns the current record's "descripcion" value
 * @method integer             getEstadoId()         Returns the current record's "estado_id" value
 * @method integer             getMunicipioCodigo()  Returns the current record's "municipio_codigo" value
 * @method Doctrine_Collection getEstudiante()       Returns the current record's "Estudiante" collection
 * @method Doctrine_Collection getEstudiante7()      Returns the current record's "Estudiante_7" collection
 * @method Doctrine_Collection getPreinscripcion()   Returns the current record's "Preinscripcion" collection
 * @method Doctrine_Collection getTraslado()         Returns the current record's "Traslado" collection
 * @method Doctrine_Collection getTraslado5()        Returns the current record's "Traslado_5" collection
 * @method Municipio           setId()               Sets the current record's "id" value
 * @method Municipio           setDescripcion()      Sets the current record's "descripcion" value
 * @method Municipio           setEstadoId()         Sets the current record's "estado_id" value
 * @method Municipio           setMunicipioCodigo()  Sets the current record's "municipio_codigo" value
 * @method Municipio           setEstudiante()       Sets the current record's "Estudiante" collection
 * @method Municipio           setEstudiante7()      Sets the current record's "Estudiante_7" collection
 * @method Municipio           setPreinscripcion()   Sets the current record's "Preinscripcion" collection
 * @method Municipio           setTraslado()         Sets the current record's "Traslado" collection
 * @method Municipio           setTraslado5()        Sets the current record's "Traslado_5" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMunicipio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('municipio');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'municipio_id',
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
        $this->hasColumn('estado_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('municipio_codigo', 'integer', 4, array(
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
             'foreign' => 'asic_municipio_id'));

        $this->hasMany('Estudiante as Estudiante_7', array(
             'local' => 'id',
             'foreign' => 'municipio_id'));

        $this->hasMany('Preinscripcion', array(
             'local' => 'id',
             'foreign' => 'municipio_id'));

        $this->hasMany('Traslado', array(
             'local' => 'id',
             'foreign' => 'municipio_emisor_id'));

        $this->hasMany('Traslado as Traslado_5', array(
             'local' => 'id',
             'foreign' => 'municipio_receptor_id'));
    }
}