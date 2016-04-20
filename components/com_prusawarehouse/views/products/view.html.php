<?php

defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseViewProducts extends JViewLegacy
{
    protected $items;

    protected $state;

    protected $pagination;

    public function display($tpl = null)
    {
        /** @var PrusaWareHouseModelProducts $model */
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
}