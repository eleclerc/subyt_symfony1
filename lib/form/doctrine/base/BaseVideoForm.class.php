<?php

/**
 * Video form base class.
 *
 * @method Video getObject() Returns the current form's model object
 *
 * @package    subyt
 * @subpackage form
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVideoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'url'                 => new sfWidgetFormInputText(),
      'youtube_id'          => new sfWidgetFormInputText(),
      'youtube_title'       => new sfWidgetFormInputText(),
      'youtube_description' => new sfWidgetFormTextarea(),
      'youtube_thumbnail'   => new sfWidgetFormInputText(),
      'published'           => new sfWidgetFormInputCheckbox(),
      'year'                => new sfWidgetFormInputText(),
      'event_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => true)),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'dancers_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Dancer')),
      'songs_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Song')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'url'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'youtube_id'          => new sfValidatorString(array('max_length' => 40)),
      'youtube_title'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'youtube_description' => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'youtube_thumbnail'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'published'           => new sfValidatorBoolean(array('required' => false)),
      'year'                => new sfValidatorInteger(array('required' => false)),
      'event_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'dancers_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Dancer', 'required' => false)),
      'songs_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Song', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Video', 'column' => array('youtube_id')))
    );

    $this->widgetSchema->setNameFormat('video[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Video';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['dancers_list']))
    {
      $this->setDefault('dancers_list', $this->object->Dancers->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['songs_list']))
    {
      $this->setDefault('songs_list', $this->object->Songs->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveDancersList($con);
    $this->saveSongsList($con);

    parent::doSave($con);
  }

  public function saveDancersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['dancers_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Dancers->getPrimaryKeys();
    $values = $this->getValue('dancers_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Dancers', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Dancers', array_values($link));
    }
  }

  public function saveSongsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['songs_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Songs->getPrimaryKeys();
    $values = $this->getValue('songs_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Songs', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Songs', array_values($link));
    }
  }

}
