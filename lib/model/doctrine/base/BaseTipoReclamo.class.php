<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TipoReclamo', 'doctrine');

/**
 * BaseTipoReclamo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property Doctrine_Collection $Reclamo
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getDescripcion() Returns the current record's "descripcion" value
 * @method Doctrine_Collection getReclamo()     Returns the current record's "Reclamo" collection
 * @method TipoReclamo         setId()          Sets the current record's "id" value
 * @method TipoReclamo         setDescripcion() Sets the current record's "descripcion" value
 * @method TipoReclamo         setReclamo()     Sets the current record's "Reclamo" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTipoReclamo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tipo_reclamo');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tipo_reclamo_id',
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Reclamo', array(
             'local' => 'id',
             'foreign' => 'tipo_reclamo_id'));
    }
}