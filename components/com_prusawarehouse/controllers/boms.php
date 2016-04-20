<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerBoms extends JControllerAdmin
{
    public function getModel($name = 'Bom', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }

}
