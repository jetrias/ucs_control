<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Titulo', 'doctrine');

/**
 * BaseTitulo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property Doctrine_Collection $Preinscripcion
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method string              getDescripcion()    Returns the current record's "descripcion" value
 * @method Doctrine_Collection getPreinscripcion() Returns the current record's "Preinscripcion" collection
 * @method Titulo              setId()             Sets the current record's "id" value
 * @method Titulo              setDescripcion()    Sets the current record's "descripcion" value
 * @method Titulo              setPreinscripcion() Sets the current record's "Preinscripcion" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTitulo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('titulo');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'titulo_id',
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
        $this->hasMany('Preinscripcion', array(
             'local' => 'id',
             'foreign' => 'titulo_id'));
    }
}