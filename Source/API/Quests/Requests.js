API.Quests = {
    show: function ()
    {
        API.request('Nexus.Quests.Show', {

        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    }
}