<?php

defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseViewBoms extends JViewLegacy
{
    protected $items;

    protected $state;

    protected $pagination;

    public function display($tpl = null)
    {
        /** @var PrusaWareHouseModelBoms $model */
        $model = $this->getModel();

        $this->items      = $model->getItems();
        $this->state      = $model->getState();
        $this->pagination = $model->getPagination();

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