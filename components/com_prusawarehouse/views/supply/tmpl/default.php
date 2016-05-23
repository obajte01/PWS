<?php
defined('_JEXEC') or die('Restricted access');

$input = new JInput();
$color = (int)$input->get('color', '', 'post');

$options = [
    JHtml::_('select.option', '0', 'Vše'),
    JHtml::_('select.option', '1', 'Dangerous'),
    JHtml::_('select.option', '2', 'Warning'),
    JHtml::_('select.option', '3', 'Normal'),
    JHtml::_('select.option', '4', 'Cool')
];
?>

<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
<h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_SUPPLY_LIST') ?></h1>
<?php if (!count($this->items)): ?>
    <div class="alert-alert-danger">
        <?= JText::_('COM_PRUSAWAREHOUSE_NOTHING_FOUND') ?>
    </div>
<?php else: ?>
    <form method="post" class="pws-form-select">
        <?= JHtml::_('select.genericlist', $options, 'color', '', 'value', 'text'); ?>
        <button type="submit" class="btn btn-default"><?= JText::_('COM_PRUSAWAREHOUSE_SELECT') ?></button>
    </form>

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
                <td colspan="6">
                    <div class="pagination-box">
                        <?= $this->pagination->getPagesLinks() ?>
                    </div>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php
            if ($color == 0)
                echo $this->loadTemplate('all');
            elseif ($color == 1)
                echo $this->loadTemplate('danger');
            elseif ($color == 2)
                echo $this->loadTemplate('warning');
            elseif ($color == 3)
                echo $this->loadTemplate('normal');
            elseif ($color == 4)
                echo $this->loadTemplate('cool');
            ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
