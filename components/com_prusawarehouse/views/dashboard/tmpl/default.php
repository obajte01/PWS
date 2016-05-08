<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="row">
    <div class="col-md-offset-1 col-md-2 col-sm-3 col-xs-5">
        <button id="button" class="dashboard-box"
                onclick="window.location.href='<?= JRoute::_('index.php?option=com_prusawarehouse&view=stocks'); ?>'">
            <div class="dashboard-box-icon" id="warehouse">
                <img class="img-responsive"
                     src="<?= JUri::base(true) . "/images/icons/Warehouse-icon.png"; ?>">
            </div>
            <div class="dashboard-box-text">
                <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_STOCKS"); ?>
            </div>
        </button>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-5">
        <button class="dashboard-box"
                onclick="window.location.href='<?= JRoute::_('index.php?option=com_prusawarehouse&view=products'); ?>'">
            <div class="dashboard-box-icon">
                <img class="img-responsive" src="<?= JUri::base(true) . "/images/icons/boc.png"; ?>">
            </div>
            <div class="dashboard-box-text">
                <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_PRODUCTS"); ?>
            </div>
        </button>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-5">
        <button class="dashboard-box"
                onclick="window.location.href='<?= JRoute::_('index.php?option=com_prusawarehouse&view=manufacture'); ?>'">
            <div class="dashboard-box-icon">
                <img class="img-responsive" src="<?= JUri::base(true) . "/images/icons/wrench.png"; ?>">
            </div>
            <div class="dashboard-box-text">
                <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_MANUFACTURE"); ?>
            </div>
        </button>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-5">
        <button class="dashboard-box">
            <div class="dashboard-box-value">
                <?= $this->escape($this->formatedPrice . " Kč"); ?>
            </div>
            <div class="dashboard-box-text">
                <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_STOCKS_VALUE"); ?>
            </div>
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-1 col-md-2 col-sm-3 col-xs-5">
        <button class="dashboard-box"
                onclick="window.location.href='<?= JRoute::_('index.php?option=com_prusawarehouse&view=suppliers'); ?>'">
            <div class="dashboard-box-icon">
                <img class="img-responsive" src="<?= JUri::base(true) . "/images/icons/supplier.png"; ?>">
            </div>
            <div class="dashboard-box-text">
                <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_SUPPLIERS"); ?>
            </div>
        </button>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-5">
        <button class="dashboard-box"
                onclick="window.location.href='<?= JRoute::_('index.php?option=com_prusawarehouse&view=orders'); ?>'">
            <div class="dashboard-box-icon">
                <img class="img-responsive" src="<?= JUri::base(true) . "/images/icons/list.png"; ?>">
            </div>
            <div class="dashboard-box-text">
                <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_ORDERS"); ?>
            </div>
        </button>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-5">
        <button class="dashboard-box"
                onclick="window.location.href='<?= JRoute::_('index.php?option=com_prusawarehouse&view=supply'); ?>'">
            <div class="dashboard-box-icon">
                <img class="img-responsive" src="<?= JUri::base(true) . "/images/icons/truck.png"; ?>">
            </div>
            <div class="dashboard-box-text">
                <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_SUPPLY_STOCKS"); ?>
            </div>
        </button>
    </div>
    <?php if ($this->warnings) : ?>
        <div class="col-md-2 col-sm-3 col-xs-5">
            <button class="dashboard-box"
                    onclick="window.location.href='<?= JRoute::_('index.php?option=com_prusawarehouse&view=warnings'); ?>'">
                <div class="dashboard-box-icon">
                    <img class="img-responsive" src="<?= JUri::base(true) . "/images/icons/vykricnik-cerveny.png"; ?>">
                </div>
                <div class="dashboard-box-text">
                    <?= JText::_("COM_PRUSAWAREHOUSE_VIEW_DASHBOARD_LOW_STOCKS"); ?>
                </div>
            </button>
        </div>
    <?php endif ?>
</div>
