<?php

defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseViewWarnings extends JViewLegacy
{
    protected $items;

    protected $state;

    protected $pagination;

    protected $user;

    public function display($tpl = null)
    {
        /** @var PrusaWareHouseModelWarnings $model */
        $model = $this->getModel();

        $this->items      = $model->getItems();
        $this->state      = $model->getState();
        $this->pagination = $model->getPagination();
        $this->user       = JFactory::getUser();

        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));

            return false;
        }

        parent::display($tpl);
    }
}