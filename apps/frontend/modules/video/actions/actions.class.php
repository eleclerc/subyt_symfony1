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
      $this->forward('video', 'list');
  }

  public function executeList(sfWebRequest $request)
  {
      $q = Doctrine_Query::create()
          ->from('Video v')
          ->where('published = ?', true)
          ->leftJoin('v.Dancers d')
          ->leftJoin('v.Songs s')
          ->orderBy('created_at DESC');

      if ($request->hasParameter('year')) {
          $q->where('year = ?', $request->getParameter('year'));
          $this->filter = 'year = ' . $request->getParameter('year');
      }
      
      $this->videos = $q->execute();
  }

  public function executeShow(sfWebrequest $request)
  {
      $this->video = Doctrine_Core::getTable('Video')
              ->find($request->getParameter('id'));
      $this->forward404Unless($this->video);
  }

  public function executeSubmit(sfWebRequest $request)
  {
      ProjectConfiguration::registerZend();

      $this->video = new Video();
      $this->video->url = $request->getParameter('url');
      try { 
        $this->video->populateFromUrl();
        $this->video->save();
      } catch (Exception $e) {
          $this->error = $e->getMessage();
          return sfView::ERROR;
      }
  }
}
