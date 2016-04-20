<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelOrders extends JModelList
{
    protected function getListQuery()
    {
        $db = JFactory::getDbo();
        $query = $this->_db->getQuery(true);

        $query->select(array('a.*','b.name'))
            ->from($db->quoteName('#__prusawarehouse_orders', 'a'))
            ->join('INNER', $db->quoteName('#__prusawarehouse_suppliers', 'b') . ' ON (' . $db->quoteName('a.id_supplier') . ' = ' . $db->quoteName('b.id') . ')');

        return $query;
    }
}