<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelStocks extends JModelList
{
    public function __construct($config = array())
    {
        $config['filter_fields'] = array(
            'a.id',
            'b.name',
            'a.title_stock',
            'a.type',
            'a.quantity_stock',
            'a.quantity_min',
            'c.location',
            'a.price_stock',
            'a.delivery'
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
    {
        $db = JFactory::getDbo();
        $query = $this->_db->getQuery(true);

        $query->select(array('a.*','b.name', 'c.location'))
            ->from($db->quoteName('#__prusawarehouse_stocks', 'a'))
            ->join('INNER', $db->quoteName('#__prusawarehouse_suppliers', 'b') . ' ON (' . $db->quoteName('a.id_supplier') . ' = ' . $db->quoteName('b.id') . ')')
            ->join('INNER', $db->quoteName('#__prusawarehouse_stocksloc', 'c') . ' ON (' . $db->quoteName('a.id_location') . ' = ' . $db->quoteName('c.id') . ')')
            ->where('a.state=1');

        $query->order($this->_db->escape($this->getState('list.ordering', 'id')) . ' ' .
            $this->_db->escape($this->getState('list.direction', 'ASC')));

        return $query;
    }
}