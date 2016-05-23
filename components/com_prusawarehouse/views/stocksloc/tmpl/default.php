<?php

defined('_JEXEC') or die('Restricted access');
$user = JFactory::getUser();

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $this->item->id ? JText::_('COM_PRUSAWAREHOUSE_VIEW_STOCKSLOC_EDIT') : JText::_('COM_PRUSAWAREHOUSE_VIEW_STOCKSLOC_NEW') ?></h1>

            <form class="pws-form" action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=stock&id=0'); ?>"
                  method="post">
                <?= $this->form->renderField('id'); ?>
                <?= $this->form->renderField('location'); ?>
                <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_ADD') ?></button>
                <a class="btn btn-default"
                   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=stockslocs'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
                <input type="hidden" value="stocksloc.save" name="task">
                <?= JHtml::_('form.token'); ?>
            </form>
        </div>
    </div>
</div>
