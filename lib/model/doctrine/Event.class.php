<?php

/**
 * Event
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    subyt
 * @subpackage model
 * @author     Eric Leclerc <eric.leclerc@gmail.com>
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
class Event extends BaseEvent
{
    public function __toString()
    {
        return $this->getName() . ' - ' . $this->getState();
    }
}
