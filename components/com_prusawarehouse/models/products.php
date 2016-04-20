<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelProducts extends JModelList
{
    protected function getListQuery()
    {
        $query = $this->_db->getQuery(true);

        $query->select('*')
            ->from('#__prusawarehouse_products');

        return $query;
    }
}