<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelStockslocs extends JModelList
{
    protected function getListQuery()
    {
        $query = $this->_db->getQuery(true);

        $query->select('*')
            ->from('#__prusawarehouse_stocksloc');

        return $query;
    }
}