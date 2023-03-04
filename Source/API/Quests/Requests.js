API.Quests = {
    show: function ()
    {
        API.request('Nexus.Quests.Show', {

        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Nexus.Quests.Create', {
            'debug': true
        }, function (data) {
            API.Quests.show();
        }, function () {

        });
    },

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Nexus.Quests.Remove', {
            'key': key
        }, function (data) {
            API.Quests.show();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Nexus.Quests.Edit', {
            'key': key
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    save: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#ticket-edit');
        API.request('Nexus.Quests.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'goal': jq_block.find('[name="goal"]').val(),
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            API.Quests.show();
        }, function () {

        });
    }
}