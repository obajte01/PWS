<?php

defined('_JEXEC') or die;

class PrusaWarehouseModelStocksloc extends JModelAdmin
{
    protected function canDelete($record)
    {
        return true;
    }

    public function getTable($type = 'Stocksloc', $prefix = 'PrusaWarehouseTable', $config = [])
    {
        JTable::addIncludePath(JPATH_ROOT . '/components/com_prusawarehouse/tables');

        return JTable::getInstance($type, $prefix, $config);
    }


    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm('com_prusawarehouse.stocksloc', 'stocksloc', ['control' => 'jform', 'load_data' => $loadData]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_prusawarehouse.edit.stocksloc.data', []);

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }
}
