<?php
defined('_JEXEC') or die('Restricted access');

$listDirn = $this->state->get('list.direction');
$listOrd = $this->state->get('list.ordering');

$optionsDir = [
    JHtml::_('select.option', 'desc', 'DESC'),
    JHtml::_('select.option', 'asc', 'ASC')
];

$optionsOrd = [
    JHtml::_('select.option', 'id', 'ID'),
    JHtml::_('select.option', 'name', 'Jméno'),
    JHtml::_('select.option', 'email', 'Email')
];
?>

<a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=supplier&id=0'); ?>"
   class="btn btn-default spacing-md"><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_SUPPLIERS_ADD_NEW'); ?></a>
<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
<h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_SUPPLIERS_ALL_SUPPLIERS') ?></h1>
<?php if (!count($this->items)): ?>
    <div class="alert-alert-danger">
        <?= JText::_('COM_PRUSAWAREHOUSE_NOTHING_FOUND'); ?>
    </div>
<?php else: ?>
    <form id="adminForm" method="post" name="adminForm" class="spacing-md pws-form">
        <?= JHtml::_('select.genericlist', $optionsDir, 'filter_order_Dir', '', 'value', 'text', $listDirn); ?>
        <?= JHtml::_('select.genericlist', $optionsOrd, 'filter_order', '', 'value', 'text', $listOrd); ?>
        <button type="submit" class="btn btn-default">Seřadit</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped pws-table">
            <thead>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_ID'); ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_TITLE'); ?></th>
            <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_EMAIL'); ?></th>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_EDIT'); ?></th>
            <th class="text-center"><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_DELETE'); ?></th>
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
            <?php foreach ($this->items as $supplier) : ?>
                <tr>
                    <td class="text-center">
                        <?= (int)$supplier->id; ?>
                    </td>
                    <td><?= $this->escape($supplier->name); ?></td>
                    <td><?= $this->escape($supplier->email); ?></td>
                    <td class="text-center">
                        <a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=supplier&id=' . (int)$supplier->id); ?>"><i
                                class="fa fa-cog"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=products'); ?>"
                              method="post">
                            <button type="submit"><i class="fa fa-trash"></i></button>
                            <input type="hidden" name="task" value="suppliers.archive"/>
                            <input type="hidden" name="cid[]" value="<?= (int)$supplier->id; ?>"/>
                            <?= JHtml::_('form.token'); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

