<?php
defined('_JEXEC') or die;

class PrusaWarehouseTableSupplier extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__prusawarehouse_suppliers', 'id', $db);

        $this->setColumnAlias('published', 'state');
    }
}
