<?php
defined('_JEXEC') or die('Restricted access');
define("printerCount", "10");
define("printerSucces", "30");
define("printerWarning", "14");

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