<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelOrders extends JModelList
{
    public function __construct($config = array())
    {
        $config['filter_fields'] = array(
            'a.id',
            'b.name',
            'a.content',
            'a.assumed_delivery'
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
        $query = $this->_db->getQuery(true);

        $query->select(array('a.*', 'b.name'))
            ->from($this->_db->quoteName('#__prusawarehouse_orders', 'a'))
            ->join('INNER', $this->_db->quoteName('#__prusawarehouse_suppliers', 'b') . ' ON (' . $this->_db->quoteName('a.id_supplier') . ' = ' . $this->_db->quoteName('b.id') . ')')
            ->where('a.state=1');

        $query->order($this->_db->escape($this->getState('list.ordering', 'id')) . ' ' .
            $this->_db->escape($this->getState('list.direction', 'ASC')));

        return $query;
    }
}