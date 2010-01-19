<?php

/**
 * home actions.
 *
 * @package    subyt
 * @subpackage home
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->videos = Doctrine_Query::create()
          ->from('Video v')
          ->where('Published = ?', true)
          ->leftJoin('v.Dancers d')
          ->leftJoin('v.Songs s')
          ->limit(5)
          ->orderBy('created_at DESC')
          ->execute(array());
  }
}
