<?php

/**
 * Dancer form base class.
 *
 * @method Dancer getObject() Returns the current form's model object
 *
 * @package    subyt
 * @subpackage form
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDancerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'videos_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Video')),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'videos_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Video', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dancer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dancer';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['videos_list']))
    {
      $this->setDefault('videos_list', $this->object->Videos->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveVideosList($con);

    parent::doSave($con);
  }

  public function saveVideosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['videos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Videos->getPrimaryKeys();
    $values = $this->getValue('videos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Videos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Videos', array_values($link));
    }
  }

}
