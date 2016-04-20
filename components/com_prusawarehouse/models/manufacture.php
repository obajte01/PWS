<?php

defined('_JEXEC') or die();

class PrusaWareHouseModelManufacture extends JModelList
{
    protected function getListQuery()
    {   $db = JFactory::getDbo();
        $query = $this->_db->getQuery(true);

        $query->select(array('a.*','b.quantity_product','b.title_product','c.quantity_stock'))
            ->from($db->quoteName('#__prusawarehouse_boms', 'a'))
            ->join('INNER', $db->quoteName('#__prusawarehouse_products', 'b') . ' ON (' . $db->quoteName('a.id_product') . ' = ' . $db->quoteName('b.id') . ')')
            ->join('INNER', $db->quoteName('#__prusawarehouse_stocks', 'c') . ' ON (' . $db->quoteName('a.id_stock') . ' = ' . $db->quoteName('c.id') . ')');

        return $query;
    }

    public function getProductQuantity($id)
    {
        $db = JFactory::getDbo();
        $query = $this->_db->getQuery(true);

        $query->select('quantity_product')
            ->from('#__prusawarehouse_products')
            ->where('id' . ' = ' . (int)$id);

        $db->setQuery($query);
        return $result = $db->loadResult();
    }

    public function updateNewQuantity($newQ,$id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->update('#__prusawarehouse_stocks')
            ->set('quantity_stock' . ' = ' . (int)$newQ)
            ->where('id' . ' = ' . (int)$id);

        $db->setQuery($query);
        $result = $db->execute();

        if ($result)
            return true;
        else
            return false;
    }

    public function updateNewProduct($newQ,$id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->update('#__prusawarehouse_products')
            ->set('quantity_product' . ' = ' . (int)$newQ)
            ->where('id' . ' = ' . (int)$id);

        $db->setQuery($query);
        $result = $db->execute();;

        if ($result)
            return true;
        else
            return false;
    }
}