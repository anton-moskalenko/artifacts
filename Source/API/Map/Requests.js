var Artifact = {};

Artifact.Map = {
    Get: function ()
    {
        API.request('Artifact.Map.Get', {

        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    Edit: function ()
    {
        API.request('Artifact.Map.Edit', {

        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    Save: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Artifact.Map.Save', {
            title: $('#map [name="title"]').val(),
            program: $('#map [name="program"]').val()
        }, function (data) {
            Artifact.Map.Get();
        }, function () {

        });
    }
}