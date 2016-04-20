<?php

defined('_JEXEC') or die;

class PrusaWarehouseControllerSupply extends JControllerAdmin
{
    public function getModel($name = 'Supply', $prefix = 'PrusaWarehouseModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }

    public function addNewQuantity()
    {
        $model = $this->getModel('supply');

        $input = new JInput();
        $new_quantity = $input->get('new_quantity', '', 'post');
        $quantity_min = $input->get('cqmin', '', 'post');
        $id = $input->get('cid', '', 'post');
        if($new_quantity <= $quantity_min)
        {
            $msg = JText::_('COM_PRUSAWAREHOUSE_WARNINGS_QUANTITY');
            $this->setRedirect(JRoute::_('index.php?option=com_prusawarehouse&view=supply'),JFactory::getApplication()->enqueueMessage($msg,'warning'));
        }else{
            if($model->updateNewQuantity($new_quantity,$id))
            {
                $msg = JText::_('COM_PRUSAWAREHOUSE_WARNINGS_QUANTITY_SUCCES');
                $this->setRedirect(JRoute::_('index.php?option=com_prusawarehouse&view=supply'),JFactory::getApplication()->enqueueMessage($msg));
            }
            else
            {
                $msg = JText::_('COM_PRUSAWAREHOUSE_WARNINGS_QUANTITY_FAILTURE');
                $this->setRedirect(JRoute::_('index.php?option=com_prusawarehouse&view=supply'),JFactory::getApplication()->enqueueMessage($msg,'warning'));
            }
        }
    }
}
