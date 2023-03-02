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

        <script>
            let Tickets = function ()
            {

            };
        </script>

        <div id="header">
            <input type="date" id="current-date" value="<?php echo gmdate("Y-m-d"); ?>">
        </div>

        <table style="width: 100%;height: 96%;">
            <tr>
                <td id="menu">

                </td>
                <td id="map">

                </td>
                <td id="page">

                </td>
            </tr>
        </table>

        <div id="footer">

        </div>
        <script>
            Artifact.Map.Get();
        </script>
    </body>
</html>