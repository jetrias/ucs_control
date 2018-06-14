<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CentroPoblado', 'doctrine');

/**
 * BaseCentroPoblado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $descripcion
 * @property integer $estado_codigo
 * @property integer $municipio_codigo
 * @property integer $parroquia_codigo
 * @property integer $parroquia_id
 * @property string $id
 * @property string $centro_codigo
 * @property Doctrine_Collection $Estudiante
 * 
 * @method string              getDescripcion()      Returns the current record's "descripcion" value
 * @method integer             getEstadoCodigo()     Returns the current record's "estado_codigo" value
 * @method integer             getMunicipioCodigo()  Returns the current record's "municipio_codigo" value
 * @method integer             getParroquiaCodigo()  Returns the current record's "parroquia_codigo" value
 * @method integer             getParroquiaId()      Returns the current record's "parroquia_id" value
 * @method string              getId()               Returns the current record's "id" value
 * @method string              getCentroCodigo()     Returns the current record's "centro_codigo" value
 * @method Doctrine_Collection getEstudiante()       Returns the current record's "Estudiante" collection
 * @method CentroPoblado       setDescripcion()      Sets the current record's "descripcion" value
 * @method CentroPoblado       setEstadoCodigo()     Sets the current record's "estado_codigo" value
 * @method CentroPoblado       setMunicipioCodigo()  Sets the current record's "municipio_codigo" value
 * @method CentroPoblado       setParroquiaCodigo()  Sets the current record's "parroquia_codigo" value
 * @method CentroPoblado       setParroquiaId()      Sets the current record's "parroquia_id" value
 * @method CentroPoblado       setId()               Sets the current record's "id" value
 * @method CentroPoblado       setCentroCodigo()     Sets the current record's "centro_codigo" value
 * @method CentroPoblado       setEstudiante()       Sets the current record's "Estudiante" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCentroPoblado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('centro_poblado');
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('estado_codigo', 'integer', 4, array(
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
        $this->hasColumn('parroquia_codigo', 'integer', 4, array(
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
        $this->hasColumn('id', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'length' => '',
             ));
        $this->hasColumn('centro_codigo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Estudiante', array(
             'local' => 'id',
             'foreign' => 'centro_poblado_id'));
    }
}