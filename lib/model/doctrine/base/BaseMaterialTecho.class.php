<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('MaterialTecho', 'doctrine');

/**
 * BaseMaterialTecho
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property Doctrine_Collection $EstudioSocioeconomico
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method string              getDescripcion()           Returns the current record's "descripcion" value
 * @method Doctrine_Collection getEstudioSocioeconomico() Returns the current record's "EstudioSocioeconomico" collection
 * @method MaterialTecho       setId()                    Sets the current record's "id" value
 * @method MaterialTecho       setDescripcion()           Sets the current record's "descripcion" value
 * @method MaterialTecho       setEstudioSocioeconomico() Sets the current record's "EstudioSocioeconomico" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMaterialTecho extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('material_techo');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'material_techo_id',
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
        $this->hasMany('EstudioSocioeconomico', array(
             'local' => 'id',
             'foreign' => 'material_techo_id'));
    }
}