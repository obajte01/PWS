<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelStocks extends JModelList
{
    protected function getListQuery()
    {
        $db = JFactory::getDbo();
        $query = $this->_db->getQuery(true);

        $query->select(array('a.*','b.name', 'c.location'))
            ->from($db->quoteName('#__prusawarehouse_stocks', 'a'))
            ->join('INNER', $db->quoteName('#__prusawarehouse_suppliers', 'b') . ' ON (' . $db->quoteName('a.id_supplier') . ' = ' . $db->quoteName('b.id') . ')')
            ->join('INNER', $db->quoteName('#__prusawarehouse_stocksloc', 'c') . ' ON (' . $db->quoteName('a.id_location') . ' = ' . $db->quoteName('c.id') . ')');

        return $query;
    }
}