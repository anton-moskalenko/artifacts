<!DOCTYPE html>
<html lang="en">
    <head>
        <script>var Interstate = {};</script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Backbone.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-api/Client/API.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/Source/API/Ticket/Requests.js'); ?></script>
        <style><?php echo file_get_contents(ROOT_DIR . '/Source/Engine/Manager.css'); ?></style>
        <title>Interstate - <?php echo date('Y-m-d'); ?></title>
    </head>
    <body>
        <div id="menu">
            <div id="major">
                <a href="javascript:void(0)" onclick="Interstate.Ticket.create();">Create new ticket</a>
            </div>
            <div id="minor">
            </div>
        </div>
        <div id="page"></div>
        <div id="bar">

        </div>
        <script>
            Interstate.Ticket.Collection();
        </script>
    </body>
</html>