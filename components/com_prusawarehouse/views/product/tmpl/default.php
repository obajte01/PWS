<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $this->item->id ? JText::_('COM_PRUSAWAREHOUSE_VIEW_PRODUCT_EDIT') : JText::_('COM_PRUSAWAREHOUSE_VIEW_PRODUCT_NEW') ?></h1>

            <form class="pws-form spacing-md"
                  action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=product&id=' . (int)$this->item->id); ?>"
                  method="post">
                <?= $this->form->renderField('id'); ?>
                <?= $this->form->renderField('title_product'); ?>
                <?= $this->form->renderField('price_product'); ?>
                <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_ADD') ?></button>
                <a class="btn btn-default"
                   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=products'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
                <input type="hidden" value="product.save" name="task">
                <?= JHtml::_('form.token'); ?>
            </form>
        </div>
    </div>
</div>
