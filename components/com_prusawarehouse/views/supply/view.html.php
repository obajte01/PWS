<?php

defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseViewSupply extends JViewLegacy
{
    protected $items;

    protected $state;

    protected $pagination;

    public function display($tpl = null)
    {
        /** @var PrusaWareHouseModelSupply $model */
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

    public function returnRowColor($id)
    {   $model = $this->getModel();
        $items = $model->getItems();
        $statement = '';
        foreach ($items as $item)
        {
            $onePrinter = (int)$item->quantity_min / 10;
            if($item->id == (int)$id){
                if($item->quantity_stock <= ($onePrinter*10))
                    $statement = 'danger';
                else if ($item->quantity_stock >= ($onePrinter*30))
                    $statement = 'success';
                else if (($item->quantity_stock > ($onePrinter*10)) && ($item->quantity_stock < ($onePrinter*14)))
                    $statement = 'warning';
                else if (($item->quantity_stock >= ($onePrinter*14)) && ($item->quantity_stock < ($onePrinter*30)))
                    $statement = 'info';
            }
        }
        return $statement;
    }
}