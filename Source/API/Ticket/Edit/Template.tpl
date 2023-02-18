<div id="ticket-edit">
    <a href="javascript:void(0)" onclick="Interstate.Ticket.save(<?php echo $entity->getKey(); ?>);">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>
        <tr><td>Start</td><td>
            <input type="text" name="start" value="<?php echo $entity->getStart(); ?>"/>
            <a href="javascript:void(0)" onclick="$('[name=start]').val('<?php echo gmdate('Y-m-d H:i:s'); ?>');">Now</a>
        </td></tr>
        <tr><td>Finish</td><td>
            <input type="text" name="finish" value="<?php echo $entity->getFinish(); ?>"/>
            <a href="javascript:void(0)" onclick="$('[name=finish]').val('<?php echo gmdate('Y-m-d H:i:s'); ?>');">Now</a>
        </td></tr>
        <tr><td>Type</td><td>
            <select name="type">
                <?php foreach($types as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>
        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>
        <tr><td>Data</td><td><input type="text" name="data" value="<?php echo $entity->getData(); ?>"/></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Interstate.Ticket.save(<?php echo $entity->getKey(); ?>);">Save</a>
</div>