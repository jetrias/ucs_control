<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ProfesionJefe', 'doctrine');

/**
 * BaseProfesionJefe
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
 * @method ProfesionJefe       setId()                    Sets the current record's "id" value
 * @method ProfesionJefe       setDescripcion()           Sets the current record's "descripcion" value
 * @method ProfesionJefe       setEstudioSocioeconomico() Sets the current record's "EstudioSocioeconomico" collection
 * 
 * @package    ucs_control
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfesionJefe extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profesion_jefe');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'profesion_jefe_id',
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
             'foreign' => 'profesion_jefe_id'));
    }
}