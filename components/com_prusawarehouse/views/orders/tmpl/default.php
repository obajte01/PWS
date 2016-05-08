<?php
defined('_JEXEC') or die('Restricted access');

$listDirn = $this->state->get('list.direction');
$listOrd = $this->state->get('list.ordering');

$optionsDir = [
    JHtml::_('select.option', 'asc', JText::_('COM_PRUSAWAREHOUSE_FILTER_ASC')),
    JHtml::_('select.option', 'desc', JText::_('COM_PRUSAWAREHOUSE_FILTER_DESC'))
];

$optionsOrd = [
    JHtml::_('select.option', 'a.id', JText::_('COM_PRUSAWAREHOUSE_FILTER_ID')),
    JHtml::_('select.option', 'b.name', JText::_('COM_PRUSAWAREHOUSE_FILTER_SUPPLIER')),
    JHtml::_('select.option', 'a.content', JText::_('COM_PRUSAWAREHOUSE_FILTER_CONTENT')),
    JHtml::_('select.option', 'a.assumed_delivery', JText::_('COM_PRUSAWAREHOUSE_FILTER_ASSUMD_DELIVERY'))
];

$delivery = new DateTime();
?>

    <a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=order&id=0'); ?>"
       class="btn btn-default spacing-md"><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_ORDERS_ADD_NEW') ?></a>
    <a class="btn btn-default spacing-md"
       href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
    <h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_ORDERS_LIST') ?></h1>
<?php if (!count($this->items)): ?>
    <div class="alert-alert-danger">
        <?= JText::_('COM_PRUSAWAREHOUSE_NOTHING_FOUND') ?>
    </div>
<?php else: ?>
    <form id="adminForm" method="post" name="adminForm" class="spacing-md pws-form-select">
        <?= JHtml::_('select.genericlist', $optionsDir, 'filter_order_Dir', '', 'value', 'text', $listDirn); ?>
        <?= JHtml::_('select.genericlist', $optionsOrd, 'filter_order', '', 'value', 'text', $listOrd); ?>
        <button type="submit" class="btn btn-default"><?= JText::_('COM_PRUSAWAREHOUSE_ORDER')?></button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped pws-table">
            <thead>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_ID') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_SUPPLIER') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_CONTENT') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_ASSUMED_DELIVERY') ?></th>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_EDIT') ?></th>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_DELETE') ?></th
            </thead>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="pagination-box">
                        <?= $this->pagination->getPagesLinks() ?>
                    </div>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($this->items as $order) : ?>
                <?php $date = date_create($order->assumed_delivery)?>
                <tr>
                    <td class="text-center">
                        <?= (int)$order->id; ?>
                    </td>
                    <td><?= $this->escape($order->name); ?></td>
                    <td><?= $this->escape($order->content); ?></td>
                    <td><?= date_format($date, "d. m. Y"); ?></td>
                    <td class="text-center">
                        <a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=order&id=' . (int)$order->id); ?>"><i
                                class="fa fa-cog"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=orders'); ?>"
                              method="post">
                            <button type="submit"><i class="fa fa-trash"></i></button>
                            <input type="hidden" name="task" value="orders.archive"/>
                            <input type="hidden" name="cid[]" value="<?= (int)$order->id; ?>"/>
                            <?= JHtml::_('form.token'); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>