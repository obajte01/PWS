<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerWarnings extends JControllerAdmin
{
    public function getModel($name = 'Warning', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}
