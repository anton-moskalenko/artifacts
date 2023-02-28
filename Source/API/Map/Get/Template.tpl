<style>
    .header
    {
        text-align: center;
    }
</style>
<h1 class="header"><?php echo $map->getTitle(); ?></h1>
<hr/>
<?php echo $map->getParse(); ?>
<hr/>

<table style="width: 100%;" class="table-tickets">
    <tr>
        <th>Project (Version)</th>
        <th>Title</th>
        <th>Date</th>
        <th>URL</th>
        <th>Period</th>
        <th>Status</th>
        <th style="text-align: right;">Actions</th>
    </tr>
    <?php foreach($tickets as $entity): ?>
    <tr class="<?php echo $entity->getStatusClass(); ?>">
        <td><?php echo $entity->getVersion(); ?></td>
        <td><?php echo $entity->getTitle(); ?></td>
        <td><?php echo $entity->getDate(); ?></td>
        <td>
            <a href="<?php echo $entity->getURL(); ?>"><?php echo $entity->getURL(); ?></a>
        </td>
        <td><?php echo $entity->getPeriod(); ?></td>
        <td><?php echo $entity->getStatusString(); ?></td>
        <td style="text-align: right;">
            <a href="javascript:void(0)" onclick="Interstate.Ticket.edit(<?php echo $entity->getKey(); ?>);">Edit</a> &diams;
            <a href="javascript:void(0)" onclick="Interstate.Ticket.remove(<?php echo $entity->getKey(); ?>);">Remove</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
