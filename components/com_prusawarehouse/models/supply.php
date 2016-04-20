<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelSupply extends JModelList
{
    protected function getListQuery()
    {
        $query = $this->_db->getQuery(true);

        $query->select('id, title_stock, quantity_stock, quantity_min')
            ->from('#__prusawarehouse_stocks');

        return $query;
    }

    public function updateNewQuantity($newQ,$id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->update('#__prusawarehouse_stocks')
            ->set('quantity_stock' . ' = ' . (int)$newQ)
            ->where('id' . ' = ' . (int)$id);

        $db->setQuery($query);
        $result = $db->execute();;

        if ($result)
            return true;
        else
            return false;
    }

}