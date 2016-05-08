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
    JHtml::_('select.option', 'a.title_stock', JText::_('COM_PRUSAWAREHOUSE_FILTER_TITLE')),
    JHtml::_('select.option', 'a.type', JText::_('COM_PRUSAWAREHOUSE_FILTER_TYPE')),
    JHtml::_('select.option', 'a.quantity_stock', JText::_('COM_PRUSAWAREHOUSE_FILTER_QUANTITY')),
    JHtml::_('select.option', 'a.quantity_min', JText::_('COM_PRUSAWAREHOUSE_FILTER_QUANTITY_MIN')),
    JHtml::_('select.option', 'c.location', JText::_('COM_PRUSAWAREHOUSE_FILTER_LOCATION')),
    JHtml::_('select.option', 'a.price_stock', JText::_('COM_PRUSAWAREHOUSE_FILTER_PRICE')),
    JHtml::_('select.option', 'a.delivery', JText::_('COM_PRUSAWAREHOUSE_FILTER_DELIVERY')),
];

?>

<a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=stock&id=0'); ?>"
   class="btn btn-default spacing-md"><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_STOCKS_ADD_NEW') ?></a>
<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
<h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_STOCKS_LIST') ?></h1>
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
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_TITLE') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_SUPPLIER') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_TYPE') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_QUANTITY') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_QUANTITY_MIN') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_LOCATION') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_PRICE') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_DELIVERY') ?></th>
            <th></th>
            <th></th>
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
            <?php foreach ($this->items as $stock) : ?>
                <tr>
                    <td class="text-center">
                        <?= (int)$stock->id; ?>
                    </td>
                    <td><?= $this->escape($stock->title_stock); ?></td>
                    <td><?= $this->escape($stock->name); ?></td>
                    <td><?= $this->escape($stock->type); ?></td>
                    <td><?= $this->escape($stock->quantity_stock); ?></td>
                    <td><?= $this->escape($stock->quantity_min); ?></td>
                    <td><?= $this->escape($stock->location); ?></td>
                    <td><?= $this->escape(number_format($stock->price_stock,0, ',', ' ') . ' Kč'); ?></td>
                    <td><?= $this->escape($stock->delivery); ?></td>
                    <td class="text-center">
                        <a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=stock&id=' . (int)$stock->id); ?>"><i
                                class="fa fa-cog"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=stocks'); ?>"
                              method="post">
                            <button type="submit"><i class="fa fa-trash"></i></button>
                            <input type="hidden" name="task" value="stocks.archive"/>
                            <input type="hidden" name="cid[]" value="<?= (int)$stock->id; ?>"/>
                            <?= JHtml::_('form.token'); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

