var Artifact = {};

Artifact.Map = {
    Get: function ()
    {
        API.request('Artifact.Map.Get', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    Edit: function ()
    {
        API.request('Artifact.Map.Edit', {

        }, function (data) {
            $('#page').html(data.render);
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
            title: $('#page [name="title"]').val(),
            program: $('#page [name="program"]').val()
        }, function (data) {
            Artifact.Map.Get();
        }, function () {

        });
    }
}