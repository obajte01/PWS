<?php

defined('_JEXEC') or die('Restricted access');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if ($this->item->id): ?>
                <h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_BOM_EDIT'); ?></h1>
                <form class="pws-form"
                      action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=bom&id=' . (int)$this->item->id); ?>"
                      method="post">
                    <?= $this->form->renderField('id'); ?>
                    <?= $this->form->renderField('quantity_bom'); ?>
                    <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_ADD') ?></button>
                    <input type="hidden" value="bom.save" name="task">
                    <a class="btn btn-default" href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=boms'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
                    <?= JHtml::_('form.token'); ?>
                </form>
            <?php else: ?>
                <h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_BOM_NEW') ?></h1>
                <form class="pws-form"
                      action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=bom&id=' . (int)$this->item->id); ?>"
                      method="post">
                    <?= $this->form->renderField('id'); ?>
                    <?= $this->form->renderField('id_product'); ?>
                    <?= $this->form->renderField('id_stock'); ?>
                    <?= $this->form->renderField('quantity_bom'); ?>
                    <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_ADD') ?></button>
                    <input type="hidden" name="task" value="bom.save2new" >
                    <a class="btn btn-default" href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=boms'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
                    <?= JHtml::_('form.token'); ?>
                </form>
            <?php endif ?>
        </div>
    </div>
</div>
