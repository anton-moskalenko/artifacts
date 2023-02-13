Interstate.Ticket = {};

Interstate.Ticket.Collection = function ()
{
    API.request('Interstate.Ticket.Collection', {
        'debug': true
    }, function (data) {
        $('#page').html(data.render);
    }, function () {

    });
};

Interstate.Ticket.remove = function (key)
{
    if(!confirm('Are you sure?'))
    {
        return;
    }

    API.request('Interstate.Ticket.Remove', {
        'key': key
    }, function (data) {
        Interstate.Ticket.Collection();
    }, function () {

    });
};