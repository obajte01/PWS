<?php

defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseViewSuppliers extends JViewLegacy
{
    protected $items;

    protected $state;

    protected $pagination;

    public function display($tpl = null)
    {
        /** @var PrusaWareHouseModelSuppliers $model */
        $model = $this->getModel();

        $this->items      = $model->getItems();
        $this->state      = $model->getState();
        $this->pagination       = $model->getPagination();

        $this->sortDirection = $this->state->get('list.direction');
        $this->sortColumn = $this->state->get('list.ordering');

        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));

            return false;
        }

        parent::display($tpl);
    }
}