<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $this->item->id ? JText::_('COM_PRUSAWAREHOUSE_VIEW_STOCK_EDIT') : JText::_('COM_PRUSAWAREHOUSE_VIEW_STOCK_NEW') ?></h1>

            <form class="pws-form spacing-md"
                  action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=stock&id=' . (int)$this->item->id); ?>"
                  method="post">
                <?= $this->form->renderField('id'); ?>
                <?= $this->form->renderField('id_supplier'); ?>
                <?= $this->form->renderField('title_stock'); ?>
                <?= $this->form->renderField('type'); ?>
                <?= $this->form->renderField('quantity_stock'); ?>
                <?= $this->form->renderField('quantity_min'); ?>
                <?= $this->form->renderField('id_location'); ?>
                <?= $this->form->renderField('price_stock'); ?>
                <?= $this->form->renderField('delivery'); ?>
                <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_ADD') ?></button>
                <a class="btn btn-default"
                   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=stocks'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
                <input type="hidden" value="stock.save" name="task">
                <?= JHtml::_('form.token'); ?>
            </form>
        </div>
    </div>
</div>
