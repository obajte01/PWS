<?php defined('_JEXEC') or die('Restricted access'); ?>

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
                <input type="hidden" name="cq" value="<?= $this->escape($stock->quantity_stock); ?>"/>
            </td>
        </form>
    </tr>
<?php endforeach; ?>