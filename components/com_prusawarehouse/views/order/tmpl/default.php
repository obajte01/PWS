<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $this->item->id ? JText::_('COM_PRUSAWAREHOUSE_VIEW_ORDER_EDIT') : JText::_('COM_PRUSAWAREHOUSE_VIEW_ORDER_NEW') ?></h1>

            <form class="pws-form"
                  action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=order&id=' . (int)$this->item->id); ?>"
                  method="post">
                <?= $this->form->renderField('id'); ?>
                <?= $this->form->renderField('id_supplier'); ?>
                <?= $this->form->renderField('content'); ?>
                <?= $this->form->renderField('assumed_delivery'); ?>
                <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_ADD') ?></button>
                <input type="hidden" value="order.save" name="task">
                <a class="btn btn-default"
                   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=orders'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
                <?= JHtml::_('form.token'); ?>
            </form>
        </div>
    </div>
</div>

