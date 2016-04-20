<?php defined('_JEXEC') or die('Restricted access'); ?>

<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
<h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_MANUFACTURE_HEADER') ?></h1>

<form method="post" class="spacing-md"
      action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=manufacture'); ?>">
    <select name="selid" class="pws-select ">
        <option value=""><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_MANUFACTURE_SELECT_PRODUCT'); ?></option>
        <?php $value = 1 ?>
        <?php foreach ($this->items as $select): ?>
            <?php if ($value == $select->id_product) : ?>
                <option value="<?= $value++ ?>"><?= $this->escape($select->title_product) ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>
    <input name="mp_count" type="number" min="0" max="999" class="pws-manufacture">
    <button class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_MANUFACTURE_MADE'); ?></button>
    <input type="hidden" name="task" value="manufacture.discountQuantities">
</form>

