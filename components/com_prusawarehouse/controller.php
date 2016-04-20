<?php
defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseController extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = false)
    {
        $user = JFactory::getUser();

        if ($user->guest) {
            $this->setRedirect(JRoute::_(JUri::base(true)));
            return false;
        }

        parent::display($cachable, []);
    }
}