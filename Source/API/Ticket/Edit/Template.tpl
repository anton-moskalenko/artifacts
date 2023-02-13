<table style="width: 100%;">
    <tr>
        <th>Name</th>
        <th>Value</th>
    </tr>
    <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>
    <tr><td>Start</td><td><input type="text" name="start" value="<?php echo $entity->getStart(); ?>"/></td></tr>
    <tr><td>Finish</td><td><input type="text" name="finish" value="<?php echo $entity->getFinish(); ?>"/></td></tr>
    <tr><td>Type</td><td><input type="text" name="type" value="<?php echo $entity->getType(); ?>"/></td></tr>
    <tr><td>Status</td><td><input type="text" name="status" value="<?php echo $entity->getStatus(); ?>"/></td></tr>
    <tr><td>Data</td><td><input type="text" name="data" value="<?php echo $entity->getData(); ?>"/></td></tr>
</table>