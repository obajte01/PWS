<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelSuppliers extends JModelList
{
    public function __construct($config = array())
    {
        $config['filter_fields'] = array(
            'id',
            'name',
            'email'
        );
        parent::__construct($config);
    }

    protected function populateState($ordering = 'id', $direction = 'ASC')
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

        $query->select('*')
            ->from('#__prusawarehouse_suppliers');

        $query->order($this->_db->escape($this->getState('list.ordering', 'id')).' '.
            $this->_db->escape($this->getState('list.direction', 'ASC')));

        return $query;
    }
}