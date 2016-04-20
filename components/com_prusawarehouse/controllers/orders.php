<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerOrders extends JControllerAdmin
{
    public function getModel($name = 'Order', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}
