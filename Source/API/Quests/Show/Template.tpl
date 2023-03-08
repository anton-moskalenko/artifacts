<style>
    #table-road
    {
        width: 100%;
        border-collapse: collapse;
    }

    .road
    {
        background-image: url("/vendor/anton-moskalenko/nexus/Pool/Images/Road.png");
        width: 200px;
        height: 58px;
        background-size: 30%;
        opacity: 0.5;
    }

    .hint .tooltiptext
    {
        display: none;
        position: absolute;
        background-color: white;
        border: black 1px solid;
        padding: 2px;
    }

    .hint:hover .tooltiptext
    {
        display: block;
    }
</style>

<div style="text-align: center; background-color: #fff4cb; padding: 5px;">
    <h3>Today's total time: <?php echo $collection->getPeriod(); ?></h3>
    <?php foreach($collection->groupCount() as $type => $count): ?>
    <?php echo $types[$type]; ?>: <?php echo $count; ?>;
    <?php endforeach; ?>
</div>

<table id="table-road">

    <?php foreach($group as $key_dt => $collection): ?>
        <?php foreach($collection as $entity): ?>
            <?php if($entity->isVirtual()): ?>
                <tr data-dt="<?php echo $key_dt; ?>">
                    <td></td>
                    <td style="text-align: right;">
                        <div class="hint" style="float: right;">
                            <img src="/vendor/anton-moskalenko/nexus/Pool/Images/Milestone.png" alt="<?php echo $key_dt; ?>" width="30" />
                            <span class="tooltiptext"><?php echo $entity->getVirtual('time'); ?></span>
                        </div>
                    </td>
                    <td class="road"></td>
                    <td></td>
                    <td style="text-align: right;">
                    </td>
                </tr>
            <?php else: ?>
                <tr data-dt="<?php echo $key_dt; ?>">
                    <td></td>
                    <td style="text-align: right;">_</td>
                    <td class="road"></td>
                    <td>
                        <div class="hint" style="float: left;">
                            <span class="<?php echo $entity->getStatusClass(); ?>">&#9724;</span>
                            <span class="tooltiptext">
                                <a href="javascript:void(0)" onclick="Command.copy('<?php echo $entity->getKey(); ?>')"><?php echo $entity->getKey(); ?></a><br/>
                                <?php echo $entity->getTypeCaption(); ?><br/>
                                <a href="<?php echo $entity->getUrl(); ?>" target="_blank">Link</a>
                            </span>
                        </div>
                        &emsp;
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td style="text-align: right;">
                        <a href="javascript:void(0)" onclick="API.Quests.edit('<?php echo $entity->getKey(); ?>');">Edit</a> &diams;
                        <a href="javascript:void(0)" onclick="API.Quests.remove('<?php echo $entity->getKey(); ?>');">Remove</a>
                    </td>
                </tr>
            <?php endif; ?>

        <?php endforeach; ?>
    <?php endforeach; ?>
</table>
