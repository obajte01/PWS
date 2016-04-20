<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerStockslocs extends JControllerAdmin
{
    public function getModel($name = 'Stocksloc', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}
