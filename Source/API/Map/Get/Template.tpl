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
<div id="list-artifact"></div>
<script>Artifact.Artifacts.Collection(<?php echo $map->getKey(); ?>)</script>