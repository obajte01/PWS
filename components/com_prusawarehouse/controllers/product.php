<?php

defined('_JEXEC') or die;


class PrusaWarehouseControllerProduct extends JControllerForm
{
    protected function allowAdd($data = [])
    {
        return true;
    }

    protected function allowEdit($data = [], $key = 'id')
    {
        return true;
    }
}
