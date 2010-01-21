<?php

/**
 * year actions.
 *
 * @package    subyt
 * @subpackage year
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class yearActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('year', 'list');
  }

  public function executeList(sfWebrequest $request)
  {
      $this->years = Doctrine_Query::create()
              ->select('DISTINCT year as year')
              ->from('Video')
              ->orderBy('year')
              ->execute();
  }
}
