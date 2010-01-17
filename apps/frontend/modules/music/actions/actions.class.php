<?php

/**
 * song actions.
 *
 * @package    subyt
 * @subpackage song
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class musicActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('music', 'list');
  }

  public function executeList(sfWebRequest $request)
  {
      $this->songs = Doctrine_Query::create()
              ->from('Song')
              ->orderBy('artist')
              ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
      $this->song = Doctrine_Core::getTable('Song')
              ->find($request->getParameter('id'));
      $this->forward404Unless($this->song);
  }
}
