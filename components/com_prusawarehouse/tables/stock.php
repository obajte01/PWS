<?php
defined('_JEXEC') or die;

class PrusaWarehouseTableStock extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__prusawarehouse_stocks', 'id', $db);

        $this->setColumnAlias('published', 'state');
    }
}
