<?php

/**
 * BaseDancer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $website
 * @property Doctrine_Collection $Videos
 * @property Doctrine_Collection $VideoDancers
 * 
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getWebsite()      Returns the current record's "website" value
 * @method Doctrine_Collection getVideos()       Returns the current record's "Videos" collection
 * @method Doctrine_Collection getVideoDancers() Returns the current record's "VideoDancers" collection
 * @method Dancer              setName()         Sets the current record's "name" value
 * @method Dancer              setWebsite()      Sets the current record's "website" value
 * @method Dancer              setVideos()       Sets the current record's "Videos" collection
 * @method Dancer              setVideoDancers() Sets the current record's "VideoDancers" collection
 * 
 * @package    subyt
 * @subpackage model
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDancer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dancer');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('website', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Video as Videos', array(
             'refClass' => 'VideoDancer',
             'local' => 'dancer_id',
             'foreign' => 'video_id'));

        $this->hasMany('VideoDancer as VideoDancers', array(
             'local' => 'id',
             'foreign' => 'dancer_id'));
    }
}