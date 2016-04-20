<?php

defined('_JEXEC') or die;

class PrusaWarehouseModelBom extends JModelAdmin
{
    protected function canDelete($record)
    {
        return true;
    }

    public function getTable($type = 'Bom', $prefix = 'PrusaWarehouseTable', $config = [])
    {
        JTable::addIncludePath(JPATH_ROOT . '/components/com_prusawarehouse/tables');

        return JTable::getInstance($type, $prefix, $config);
    }


    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm('com_prusawarehouse.bom', 'bom', ['control' => 'jform', 'load_data' => $loadData]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_prusawarehouse.edit.bom.data', []);

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    function bomCheck($productID, $stockID){
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('COUNT(*)')
            ->from('#__prusawarehouse_boms')
            ->where('id_stock' . '=' . $stockID)
            ->where('id_product' . '=' . $productID);
        $db->setQuery($query);
        $result = $db->loadResult();

        if ($result)
            return false;
        else
            return true;
    }
}
