<?php

/**
 * Song filter form base class.
 *
 * @package    subyt
 * @subpackage filter
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSongFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'       => new sfWidgetFormFilterInput(),
      'artist'      => new sfWidgetFormFilterInput(),
      'videos_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Video')),
    ));

    $this->setValidators(array(
      'title'       => new sfValidatorPass(array('required' => false)),
      'artist'      => new sfValidatorPass(array('required' => false)),
      'videos_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Video', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('song_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addVideosListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('VideoSong.video_id', $values);
  }

  public function getModelName()
  {
    return 'Song';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'title'       => 'Text',
      'artist'      => 'Text',
      'videos_list' => 'ManyKey',
    );
  }
}
