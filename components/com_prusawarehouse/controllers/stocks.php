<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerStocks extends JControllerAdmin
{
    public function getModel($name = 'Stock', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}
