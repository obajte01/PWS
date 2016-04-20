<?php defined('_JEXEC') or die('Restricted access'); ?>

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
                <tr>
                    <td class="text-center">
                        <?= (int)$order->id; ?>
                    </td>
                    <td><?= $this->escape($order->name); ?></td>
                    <td><?= $this->escape($order->content); ?></td>
                    <td><?= $this->escape($order->assumed_delivery); ?></td>
                    <td class="text-center">
                        <a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=order&id=' . (int)$order->id); ?>"><i
                                class="fa fa-cog"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=orders'); ?>"
                              method="post">
                            <button type="submit"><i class="fa fa-trash"></i></button>
                            <input type="hidden" name="task" value="orders.delete"/>
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