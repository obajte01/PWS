<?php
defined('_JEXEC') or die;

class PrusaWarehouseTableOrder extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__prusawarehouse_orders', 'id', $db);

    }
}
