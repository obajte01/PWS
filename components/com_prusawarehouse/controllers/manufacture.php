<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerManufacture extends JControllerAdmin
{
    public function getModel($name = 'Manufacture', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }

    public function discountQuantities()
    {
        $model = $this->getModel();
        $this->items  = $model->getItems();

        $input = new JInput();
        $mp_count = $input->get('mp_count', '', 'post');
        $product_id = $input->get('selid', '', 'post');
        $new_pq = $model->getProductQuantity($product_id) + $mp_count;

        $state = false;
        foreach ($this->items as $item)
        {
            if($item->id_product = $product_id)
            {
                $new_quantity = 0;
                $new_quantity = $item->quantity_stock - ($item->quantity_bom * $mp_count);
                if($model->updateNewQuantity($new_quantity, $item->id_stock))
                {
                    $state = true;
                }
            }
        }

        if($model->updateNewProduct($new_pq, $product_id) && $state)
        {
            $msg = JText::_('COM_PRUSAWAREHOUSE_WARNINGS_MANUFACTURE_SUCCES');
            $this->setRedirect(JRoute::_('index.php?option=com_prusawarehouse&view=manufacture'),JFactory::getApplication()->enqueueMessage($msg));
        }
        else
        {
            $msg = JText::_('COM_PRUSAWAREHOUSE_WARNINGS_MANUFACTURE_FAILTURE');
            $this->setRedirect(JRoute::_('index.php?option=com_prusawarehouse&view=manufacture'),JFactory::getApplication()->enqueueMessage($msg,'warning'));
        }
    }
}
