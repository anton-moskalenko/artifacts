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
    }
}