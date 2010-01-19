<?php

/**
 * Video filter form base class.
 *
 * @package    subyt
 * @subpackage filter
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVideoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'                 => new sfWidgetFormFilterInput(),
      'youtube_id'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'youtube_title'       => new sfWidgetFormFilterInput(),
      'youtube_description' => new sfWidgetFormFilterInput(),
      'youtube_thumbnail'   => new sfWidgetFormFilterInput(),
      'published'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'year'                => new sfWidgetFormFilterInput(),
      'event_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => true)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'dancers_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Dancer')),
      'songs_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Song')),
    ));

    $this->setValidators(array(
      'url'                 => new sfValidatorPass(array('required' => false)),
      'youtube_id'          => new sfValidatorPass(array('required' => false)),
      'youtube_title'       => new sfValidatorPass(array('required' => false)),
      'youtube_description' => new sfValidatorPass(array('required' => false)),
      'youtube_thumbnail'   => new sfValidatorPass(array('required' => false)),
      'published'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'year'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Event'), 'column' => 'id')),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'dancers_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Dancer', 'required' => false)),
      'songs_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Song', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('video_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addDancersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.VideoDancer VideoDancer')
          ->andWhereIn('VideoDancer.dancer_id', $values);
  }

  public function addSongsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.VideoSong VideoSong')
          ->andWhereIn('VideoSong.song_id', $values);
  }

  public function getModelName()
  {
    return 'Video';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'url'                 => 'Text',
      'youtube_id'          => 'Text',
      'youtube_title'       => 'Text',
      'youtube_description' => 'Text',
      'youtube_thumbnail'   => 'Text',
      'published'           => 'Boolean',
      'year'                => 'Number',
      'event_id'            => 'ForeignKey',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
      'dancers_list'        => 'ManyKey',
      'songs_list'          => 'ManyKey',
    );
  }
}
