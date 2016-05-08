<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $this->item->id ? JText::_('Editace dodavatele:') : JText::_('Nový dodavatel:') ?></h1>

            <form class="pws-form"
                  action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=supplier&id=' . (int)$this->item->id); ?>"
                  method="post">
                <?= $this->form->renderField('id'); ?>
                <?= $this->form->renderField('name'); ?>
                <?= $this->form->renderField('email'); ?>
                <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_ADD') ?></button>
                <input type="hidden" value="supplier.save" name="task">
                <a class="btn btn-default"
                   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=suppliers'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
                <?= JHtml::_('form.token'); ?>
            </form>
        </div>
    </div>
</div>
