<?php

defined('_JEXEC') or die;

class PrusaWarehouseModelStock extends JModelAdmin
{
    protected function canDelete($record)
    {
        return true;
    }

    public function getTable($type = 'Stock', $prefix = 'PrusaWarehouseTable', $config = [])
    {
        JTable::addIncludePath(JPATH_ROOT . '/components/com_prusawarehouse/tables');

        return JTable::getInstance($type, $prefix, $config);
    }


    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm('com_prusawarehouse.stock', 'stock', ['control' => 'jform', 'load_data' => $loadData]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_prusawarehouse.edit.stock.data', []);

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }
}
