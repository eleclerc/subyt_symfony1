<?php

/**
 * event actions.
 *
 * @package    subyt
 * @subpackage event
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('event', 'list');
  }

  public function executeList(sfWebRequest $request)
  {
      $this->events = Doctrine_Query::create()
              ->from('Event')
              ->orderBy('name')
              ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
      $this->event = Doctrine_Core::getTable('Event')
              ->find($request->getParameter('id'));
      $this->forward404Unless($this->event);
  }
}
