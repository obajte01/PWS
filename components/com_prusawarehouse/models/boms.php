<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelBoms extends JModelList
{
    public function __construct($config = array())
    {
        $config['filter_fields'] = array(
            'a.id',
            'b.title_product',
            'c.title_stock',
            'a.quantity_bom'
        );
        parent::__construct($config);
    }

    protected function populateState($ordering = 'a.id', $direction = 'ASC')
    {
        parent::populateState($ordering, $direction);
    }

    protected function getStoreId($id = '')
    {
        return parent::getStoreId($id);
    }

    protected function getListQuery()
    {   $db = JFactory::getDbo();
        $query = $this->_db->getQuery(true);

        $query->select(array('a.*','b.title_product','c.title_stock'))
            ->from($db->quoteName('#__prusawarehouse_boms', 'a'))
            ->join('INNER', $db->quoteName('#__prusawarehouse_products', 'b') . ' ON (' . $db->quoteName('a.id_product') . ' = ' . $db->quoteName('b.id') . ')')
            ->join('INNER', $db->quoteName('#__prusawarehouse_stocks', 'c') . ' ON (' . $db->quoteName('a.id_stock') . ' = ' . $db->quoteName('c.id') . ')')
            ->where('a.state=1');

        $query->order($this->_db->escape($this->getState('list.ordering', 'id')) . ' ' .
            $this->_db->escape($this->getState('list.direction', 'ASC')));

        return $query;
    }


}