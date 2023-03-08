<!DOCTYPE html>
<html lang="en">
    <head>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Backbone.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-api/Client/API.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/Source/Client/Command.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/Source/API/Quests/Requests.js'); ?></script>
        <style><?php echo file_get_contents(ROOT_DIR . '/Source/Engine/Manager.css'); ?></style>
        <title>Nexus - <?php echo gmdate('Y-m-d H:i:s'); ?></title>
    </head>
    <body>
        <div id="header">
            <a href="javascript::void(0)" onclick="$('#page').toggle();">Info</a> &diams;
            <a href="javascript::void(0)" onclick="API.Quests.create();">Create</a> &diams;
            <input type="date" id="current-date" value="<?php echo gmdate("Y-m-d"); ?>">
        </div>
        <table style="width: 100%;height: 96%;">
            <tr>
                <td id="map">

                </td>
                <td id="page">

                </td>
            </tr>
        </table>
        <script>
            API.Quests.show();
        </script>
    </body>
</html>