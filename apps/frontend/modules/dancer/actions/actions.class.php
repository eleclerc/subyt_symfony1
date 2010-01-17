<?php

/**
 * dancer actions.
 *
 * @package    subyt
 * @subpackage dancer
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dancerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('dancer', 'list');
  }

  public function executeList(sfWebRequest $request)
  {
      $this->dancers = Doctrine_Core::getTable('Dancer')->findAll();
  }

  public function executeShow(sfWebRequest $request)
  {
      $this->dancer = Doctrine_Core::getTable('Dancer')
              ->find($request->getParameter('id'));
      $this->forward404Unless($this->dancer);
  }
}
