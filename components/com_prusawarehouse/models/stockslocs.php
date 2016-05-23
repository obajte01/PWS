<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelStockslocs extends JModelList
{
    protected function getListQuery()
    {
        $query = $this->_db->getQuery(true);

        $query->select('*')
            ->from('#__prusawarehouse_stocksloc')
            ->where('state=1');

        $query->order($this->_db->escape($this->getState('list.ordering', 'id')) . ' ' .
            $this->_db->escape($this->getState('list.direction', 'ASC')));

        return $query;
    }
}