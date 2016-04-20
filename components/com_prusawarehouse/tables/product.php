<?php
defined('_JEXEC') or die;

class PrusaWarehouseTableProduct extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__prusawarehouse_products', 'id', $db);

    }
}
