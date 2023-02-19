<!-- @todo: add template system -->
<style>
    .header
    {
        text-align: center;
    }

    table
    {
        width: 100%;
    }

    .general-input
    {
        width: 95%;
    }
</style>

<table>
    <tr>
        <td>Title</td>
        <td><input type="text" name="title" value="<?php echo $map->getTitle(); ?>" class="general-input"/></td>
    </tr>
    <tr>
        <td>Program</td>
        <td><textarea name="program" class="general-input" style="height: 300px;"><?php echo $map->getProgram(); ?></textarea></td>
    </tr>
    <a href="javascript:void(0)" onclick="Artifact.Map.Save();">Save</a> &diams;
    <a href="javascript:void(0)" onclick="Artifact.Map.Get();">Cancel</a>
</table>