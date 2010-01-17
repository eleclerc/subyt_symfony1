<?php

/**
 * VideoSong form base class.
 *
 * @method VideoSong getObject() Returns the current form's model object
 *
 * @package    subyt
 * @subpackage form
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVideoSongForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'video_id' => new sfWidgetFormInputHidden(),
      'song_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'video_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'video_id', 'required' => false)),
      'song_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'song_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('video_song[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VideoSong';
  }

}
