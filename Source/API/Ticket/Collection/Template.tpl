<table style="width: 100%;">
    <tr>
        <th>Title</th>
        <th style="text-align: right;">Actions</th>
    </tr>
    <?php foreach($collection as $entity): ?>
    <tr>
        <td><?php echo $entity->getTitle(); ?></td>
        <td style="text-align: right;">
            <a href="javascript:void(0)" onclick="Interstate.Ticket.edit(<?php echo $entity->getKey(); ?>);">Edit</a> &diams;
            <a href="javascript:void(0)" onclick="Interstate.Ticket.remove(<?php echo $entity->getKey(); ?>);">Remove</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>