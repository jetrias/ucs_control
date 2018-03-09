<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PaisOrigen', 'doctrine');

/**
 * BasePaisOrigen
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property string $iso
 * @property Doctrine_Collection $Estudiante
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getDescripcion() Returns the current record's "descripcion" value
 * @method string              getIso()         Returns the current record's "iso" value
 * @method Doctrine_Collection getEstudiante()  Returns the current record's "Estudiante" collection
 * @method PaisOrigen          setId()          Sets the current record's "id" value
 * @method PaisOrigen          setDescripcion() Sets the current record's "descripcion" value
 * @method PaisOrigen          setIso()         Sets the current record's "iso" value
 * @method PaisOrigen          setEstudiante()  Sets the current record's "Estudiante" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePaisOrigen extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pais_origen');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'pais_origen_id',
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
        $this->hasColumn('iso', 'string', null, array(
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
             'foreign' => 'pais_origen_id'));
    }
}