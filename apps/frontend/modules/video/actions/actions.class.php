<?php

/**
 * video actions.
 *
 * @package    subyt
 * @subpackage video
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class videoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->forward('list', 'video');
  }

  public function executeList(sfWebRequest $request)
  {
      $this->videos = Doctrine_Query::create()
          ->from('Video v')
          ->where('Published = ?', true)
          ->leftJoin('v.Dancers d')
          ->leftJoin('v.Songs s')
          ->orderBy('created_at DESC')
          ->execute(array());
  }

  public function executeShow(sfWebrequest $request)
  {
      $this->video = Doctrine_Core::getTable('Video')
              ->find($request->getParameter('id'));
      $this->forward404Unless($this->video);
  }
}
