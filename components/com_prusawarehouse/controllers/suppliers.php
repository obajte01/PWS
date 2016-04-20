<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerSuppliers extends JControllerAdmin
{
    public function getModel($name = 'Supplier', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}
