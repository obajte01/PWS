<?php
defined('_JEXEC') or die;

class PrusaWarehouseTableStocksloc extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__prusawarehouse_stocksloc', 'id', $db);

        $this->setColumnAlias('published', 'state');
    }
}
