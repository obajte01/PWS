<?php defined('_JEXEC') or die('Restricted access'); ?>

<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
<h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_SUPPLY_LIST') ?></h1>
<?php if (!count($this->items)): ?>
    <div class="alert-alert-danger">
        <?= JText::_('COM_PRUSAWAREHOUSE_NOTHING_FOUND') ?>
    </div>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped pws-table">
            <thead>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_ID') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_TITLE') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_QUANTITY') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_QUANTITY_MIN') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_NEW_QUANTITY') ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_ADD') ?></th>
            </thead>
            <tfoot>
            <tr>
                <td colspan="5">
                    <div class="pagination-box">
                        <?= $this->pagination->getPagesLinks() ?>
                    </div>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($this->items as $stock) : ?>
                <tr class="<?= $this->escape($this->returnRowColor($stock->id)); ?>">
                    <td class="text-center">
                        <?= (int)$stock->id; ?>
                    </td>
                    <td><?= $this->escape($stock->title_stock); ?></td>
                    <td><?= $this->escape($stock->quantity_stock); ?></td>
                    <td><?= $this->escape($stock->quantity_min); ?></td>
                    <form action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=supply'); ?>"
                          method="post">
                        <td><input type="number" name="new_quantity"></td>
                        <td>
                            <button type="submit"><i class="fa fa-plus"></i></button>
                            <input type="hidden" name="task" value="supply.addNewQuantity"/>
                            <input type="hidden" name="cid" value="<?= (int)$stock->id; ?>"/>
                            <input type="hidden" name="cqmin" value="<?= $this->escape($stock->quantity_min); ?>"/>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
