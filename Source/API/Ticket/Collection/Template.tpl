<style>
    .table-tickets td
    {
        width: 12%;
    }
</style>
<hr/>
<div style="text-align: center">
    <h3>Today's total time: <?php echo $collection->getPeriod(); ?></h3>
    <?php foreach($collection->groupCount() as $type => $count): ?>
    <?php echo $types[$type]; ?>: <?php echo $count; ?>
    <?php endforeach; ?>
</div>
<hr/>
<table style="width: 100%;">
    <tr>
        <th>Time</th>
        <th>Lesson</th>
    </tr>
    <?php foreach($group as $time => $lesson): ?>
    <tr>
        <td><?php echo $time; ?>:00</td>
        <td>
            <?php if(!empty($lesson)): ?>
                <table style="width: 100%;" class="table-tickets">
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>Finish</th>
                        <th>Period</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                    <?php foreach($lesson as $entity): ?>
                    <tr class="<?php echo $entity->getStatusClass(); ?>">
                        <td><?php echo $entity->getTitle(); ?></td>
                        <td><?php echo $entity->getDate(); ?></td>
                        <td><?php echo $entity->getStartTime(); ?></td>
                        <td><?php echo $entity->getFinishTime(); ?></td>
                        <td><?php echo $entity->getPeriod(); ?></td>
                        <td><?php echo $entity->getStatusString(); ?></td>
                        <td><?php echo $entity->getTypeString(); ?></td>
                        <td style="text-align: right;">
                            <a href="javascript:void(0)" onclick="Interstate.Ticket.edit(<?php echo $entity->getKey(); ?>);">Edit</a> &diams;
                            <a href="javascript:void(0)" onclick="Interstate.Ticket.remove(<?php echo $entity->getKey(); ?>);">Remove</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
