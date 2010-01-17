<?php

/**
 * Dancer filter form base class.
 *
 * @package    subyt
 * @subpackage filter
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDancerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'website'     => new sfWidgetFormFilterInput(),
      'videos_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Video')),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'website'     => new sfValidatorPass(array('required' => false)),
      'videos_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Video', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dancer_filters[%s]');

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

    $query->leftJoin('r.VideoDancer VideoDancer')
          ->andWhereIn('VideoDancer.video_id', $values);
  }

  public function getModelName()
  {
    return 'Dancer';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'website'     => 'Text',
      'videos_list' => 'ManyKey',
    );
  }
}
