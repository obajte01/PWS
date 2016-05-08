<?php

defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseViewManufacture extends JViewLegacy
{
    protected $items;

    protected $user;

    public function display($tpl = null)
    {
        /** @var PrusaWareHouseModelManufacture $model */
        $model = $this->getModel();

        $this->items      = $model->getItems();
        $this->user       = JFactory::getUser();

        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));

            return false;
        }

        parent::display($tpl);
    }

    public function getProducts()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('id, title_product')
            ->from($db->quoteName('#__prusawarehouse_products'));
        $db->setQuery($query);
        $products = $db->loadObjectList();


        return $products;
    }
}