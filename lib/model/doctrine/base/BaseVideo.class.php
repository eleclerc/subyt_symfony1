<?php

/**
 * BaseVideo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $url
 * @property string $youtube_id
 * @property string $youtube_title
 * @property string $youtube_description
 * @property string $youtube_thumbnail
 * @property boolean $published
 * @property integer $year
 * @property integer $event_id
 * @property Event $Event
 * @property Doctrine_Collection $Dancers
 * @property Doctrine_Collection $Songs
 * @property Doctrine_Collection $VideoDancers
 * @property Doctrine_Collection $VideoSongs
 * 
 * @method string              getUrl()                 Returns the current record's "url" value
 * @method string              getYoutubeId()           Returns the current record's "youtube_id" value
 * @method string              getYoutubeTitle()        Returns the current record's "youtube_title" value
 * @method string              getYoutubeDescription()  Returns the current record's "youtube_description" value
 * @method string              getYoutubeThumbnail()    Returns the current record's "youtube_thumbnail" value
 * @method boolean             getPublished()           Returns the current record's "published" value
 * @method integer             getYear()                Returns the current record's "year" value
 * @method integer             getEventId()             Returns the current record's "event_id" value
 * @method Event               getEvent()               Returns the current record's "Event" value
 * @method Doctrine_Collection getDancers()             Returns the current record's "Dancers" collection
 * @method Doctrine_Collection getSongs()               Returns the current record's "Songs" collection
 * @method Doctrine_Collection getVideoDancers()        Returns the current record's "VideoDancers" collection
 * @method Doctrine_Collection getVideoSongs()          Returns the current record's "VideoSongs" collection
 * @method Video               setUrl()                 Sets the current record's "url" value
 * @method Video               setYoutubeId()           Sets the current record's "youtube_id" value
 * @method Video               setYoutubeTitle()        Sets the current record's "youtube_title" value
 * @method Video               setYoutubeDescription()  Sets the current record's "youtube_description" value
 * @method Video               setYoutubeThumbnail()    Sets the current record's "youtube_thumbnail" value
 * @method Video               setPublished()           Sets the current record's "published" value
 * @method Video               setYear()                Sets the current record's "year" value
 * @method Video               setEventId()             Sets the current record's "event_id" value
 * @method Video               setEvent()               Sets the current record's "Event" value
 * @method Video               setDancers()             Sets the current record's "Dancers" collection
 * @method Video               setSongs()               Sets the current record's "Songs" collection
 * @method Video               setVideoDancers()        Sets the current record's "VideoDancers" collection
 * @method Video               setVideoSongs()          Sets the current record's "VideoSongs" collection
 * 
 * @package    subyt
 * @subpackage model
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVideo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('video');
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('youtube_id', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 40,
             ));
        $this->hasColumn('youtube_title', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('youtube_description', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
        $this->hasColumn('youtube_thumbnail', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('published', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('year', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('event_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Event', array(
             'local' => 'event_id',
             'foreign' => 'id'));

        $this->hasMany('Dancer as Dancers', array(
             'refClass' => 'VideoDancer',
             'local' => 'video_id',
             'foreign' => 'dancer_id'));

        $this->hasMany('Song as Songs', array(
             'refClass' => 'VideoSong',
             'local' => 'video_id',
             'foreign' => 'song_id'));

        $this->hasMany('VideoDancer as VideoDancers', array(
             'local' => 'id',
             'foreign' => 'video_id'));

        $this->hasMany('VideoSong as VideoSongs', array(
             'local' => 'id',
             'foreign' => 'video_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}