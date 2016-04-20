<?php
defined('_JEXEC') or die;

class PrusaWarehouseTableBom extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__prusawarehouse_boms', 'id', $db);

    }
}
