<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerProducts extends JControllerAdmin
{
    public function getModel($name = 'Product', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}
