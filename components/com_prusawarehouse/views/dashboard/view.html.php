<?php

defined('_JEXEC') or die('Restricted access');

class PrusaWarehouseViewDashboard extends JViewLegacy
{
    protected $totalPrice;

    protected $formatedPrice;

    protected $user;

    protected $warnings;

    public function display($tpl = null)
    {
        $this->totalPrice = $this->stocksPrice() + $this->productsPrice();
        $this->formatedPrice = number_format($this->totalPrice,0, ',', ' ');
        $this->user = JFactory::getUser();
        $this->warnings = $this->checkWarnings();

        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));

            return false;
        }

        parent::display($tpl);
    }

    public function stocksPrice()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('price_stock, quantity_stock')
            ->from($db->quoteName('#__prusawarehouse_stocks'));
        $db->setQuery($query);
        $stocks = $db->loadObjectList();

        $price = 0;
        foreach ($stocks as $stock) {
            $price += ((int)$stock->price_stock) * ((int)$stock->quantity_stock);
        }

        return (int)$price;
    }

    public function productsPrice()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('price_product, quantity_product')
            ->from($db->quoteName('#__prusawarehouse_products'));
        $db->setQuery($query);
        $products = $db->loadObjectList();

        $price = 0;
        foreach ($products as $product) {
            $price += ((int)$product->price_product * ((int)$product->quantity_product));
        }

        return (int)$price;
    }

    public function checkWarnings()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('quantity_stock, quantity_min')
            ->from($db->quoteName('#__prusawarehouse_stocks'));
        $db->setQuery($query);
        $stocks = $db->loadObjectList();

        $warning = false;
        foreach ($stocks as $stock) {
            if ($stock->quantity_stock <= $stock->quantity_min)
                $warning = true;
        }

        return $warning;
    }
}