<?php

/**
 * Tag form.
 *
 * @package    wd
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TagForm extends BaseTagForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['videos_list']);
  }
}
