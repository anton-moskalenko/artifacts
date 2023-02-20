<!DOCTYPE html>
<html lang="en">
    <head>
        <script>var Interstate = {};</script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Backbone.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-api/Client/API.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/nexus/Source/API/Ticket/Requests.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/nexus/Source/API/Map/Requests.js'); ?></script>
        <style><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/nexus/Source/Engine/Manager.css'); ?></style>
        <title>Nexus - <?php echo gmdate('Y-m-d H:i:s'); ?></title>
    </head>
    <body>
        <div id="menu">
            <div id="major">
                <a href="javascript:void(0)" onclick="Interstate.Ticket.create();">Create new ticket</a> &diams;
                <a href="javascript:void(0)" onclick="Artifact.Map.Edit();">Edit plan point</a>
            </div>
            <div id="minor">
                <input type="date" id="current-date" value="<?php echo gmdate("Y-m-d"); ?>">
                <a href="javascript:void(0)" onclick="Interstate.Ticket.Collection($('#current-date').val());">Check</a>
            </div>
        </div>

        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;"><div id="page"></div></td>
                <td><div id="map"></div></td>
            </tr>
        </table>

        <div id="bar">

        </div>
        <script>
            Interstate.Ticket.Collection('<?php echo gmdate("Y-m-d"); ?>');
            Artifact.Map.Get();
        </script>
    </body>
</html>