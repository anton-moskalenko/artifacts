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
    }
}