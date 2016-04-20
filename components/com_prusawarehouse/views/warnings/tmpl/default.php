<?php defined('_JEXEC') or die('Restricted access'); ?>

<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=supply'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_SUPPLY') ?></a>
<h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_WARNINGS_LIST') ?></h1>
<?php if (!count($this->items)): ?>
    <div class="alert-alert-danger">
        <?= JText::_('COM_PRUSAWAREHOUSE_ALL_RIGHT') ?>
    </div>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped pws-table">
            <thead>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_ID') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_SUPPLIER') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_TITLE') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_TYPE') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_QUANTITY') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_QUANTITY_MIN') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_LOCATION') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_PRICE') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_DELIVERY') ?></th>
            </thead>
            <tfoot>
            <tr>
                <td colspan="11">
                    <div class="pagination-box">
                        <?= $this->pagination->getPagesLinks() ?>
                    </div>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($this->items as $warning) : ?>
                <?php if ($warning->quantity_stock <= $warning->quantity_min) : ?>
                    <tr class="danger">
                        <td class="text-center">
                            <?= (int)$warning->id; ?>
                        </td>
                        <td><?= $this->escape($warning->name); ?></td>
                        <td><?= $this->escape($warning->title_stock); ?></td>
                        <td><?= $this->escape($warning->type); ?></td>
                        <td><?= $this->escape($warning->quantity_stock); ?></td>
                        <td><?= $this->escape($warning->quantity_min); ?></td>
                        <td><?= $this->escape($warning->location); ?></td>
                        <td><?= $this->escape($warning->price_stock); ?></td>
                        <td><?= $this->escape($warning->delivery); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

