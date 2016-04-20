<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelBoms extends JModelList
{
    protected function getListQuery()
    {   $db = JFactory::getDbo();
        $query = $this->_db->getQuery(true);

        $query->select(array('a.*','b.title_product','c.title_stock'))
            ->from($db->quoteName('#__prusawarehouse_boms', 'a'))
            ->join('INNER', $db->quoteName('#__prusawarehouse_products', 'b') . ' ON (' . $db->quoteName('a.id_product') . ' = ' . $db->quoteName('b.id') . ')')
            ->join('INNER', $db->quoteName('#__prusawarehouse_stocks', 'c') . ' ON (' . $db->quoteName('a.id_stock') . ' = ' . $db->quoteName('c.id') . ')');

        return $query;
    }
}