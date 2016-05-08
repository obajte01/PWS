<?php defined('_JEXEC') or die('Restricted access');

$selid = isset($_POST['selid']) ? $_POST['selid'] : 1;

$listDirn = $this->state->get('list.direction');
$listOrd = $this->state->get('list.ordering');

$optionsDir = [
    JHtml::_('select.option', 'asc', JText::_('COM_PRUSAWAREHOUSE_FILTER_ASC')),
    JHtml::_('select.option', 'desc', JText::_('COM_PRUSAWAREHOUSE_FILTER_DESC'))
];

$optionsOrd = [
    JHtml::_('select.option', 'c.title_stock', JText::_('COM_PRUSAWAREHOUSE_FILTER_TITLE')),
    JHtml::_('select.option', 'a.quantity_bom', JText::_('COM_PRUSAWAREHOUSE_FILTER_QUANTITY'))
];

?>

<a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=bom&id=0'); ?>"
   class="btn btn-default spacing-md"><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_BOMS_ADD_STOCK'); ?></a>
<a class="btn btn-default spacing-md"
   href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=dashboard'); ?>"><?= JText::_('COM_PRUSAWAREHOUSE_BACK') ?></a>
<h1><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_BOMS_LIST') ?></h1>
<?php if (!count($this->items)): ?>
    <div class="alert-alert-danger">
        <?= JText::_('COM_PRUSAWAREHOUSE_NOTHING_FOUND'); ?>
    </div>
<?php else: ?>
    <form method="post" class="spacing-md">
        <select name="selid" class="pws-select ">
            <option value="1"><?= JText::_('COM_PRUSAWAREHOUSE_VIEW_BOMS_SELECT_BOM'); ?></option>
            <?php foreach ($this->getProducts() as $select): ?>
                    <option value="<?= (int)$select->id ?>" selected="<?= isset($_POST["select_button"]) ? 'selected' : '';?>"><?= $this->escape($select->title_product) ?></option>
            <?php endforeach ?>
        </select>
        <button name="select_button" class="btn btn-default" type="submit"><?= JText::_('COM_PRUSAWAREHOUSE_SELECT'); ?></button>
    </form>
    <?php $index = 0 ?>
    <?php foreach ($this->items as $head): ?>
        <?php if ($selid == $head->id_product): ?>
            <h2><?= $this->escape($head->title_product) ?></h2>
            <?php break; ?>
        <?php endif ?>
    <?php endforeach ?>

    <form id="adminForm" method="post" name="adminForm" class="spacing-md pws-form-select">
        <?= JHtml::_('select.genericlist', $optionsDir, 'filter_order_Dir', '', 'value', 'text', $listDirn); ?>
        <?= JHtml::_('select.genericlist', $optionsOrd, 'filter_order', '', 'value', 'text', $listOrd); ?>
        <button type="submit" class="btn btn-default"><?= JText::_('COM_PRUSAWAREHOUSE_ORDER')?></button>
    </form>
    <table class="table table-striped pws-table">
        <thead>
        <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_TITLE'); ?></th>
        <th><?= JText::_('COM_PRUSAWAREHOUSE_TABLE_QUANTITY'); ?></th>
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
        <?php foreach ($this->items as $bom) : ?>
            <?php if ($selid == $bom->id_product): ?>
                <tr>
                    <td><?= $this->escape($bom->title_stock); ?></td>
                    <td><?= $this->escape($bom->quantity_bom); ?></td>
                    <td class="text-center">
                        <a href="<?= JRoute::_('index.php?option=com_prusawarehouse&view=bom&id=' . (int)$bom->id); ?>"><i
                                class="fa fa-cog"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="<?= JRoute::_('index.php?option=com_prusawarehouse&view=boms'); ?>"
                              method="post">
                            <button type="submit"><i class="fa fa-trash"></i></button>
                            <input type="hidden" name="task" value="boms.archive"/>
                            <input type="hidden" name="cid[]" value="<?= (int)$bom->id; ?>"/>
                            <?= JHtml::_('form.token'); ?>
                        </form>
                    </td>
                </tr>
            <?php endif ?>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

