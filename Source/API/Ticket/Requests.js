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

Interstate.Ticket.Create = function ()
{
    if(!confirm('Are you sure?'))
    {
        return;
    }

    API.request('Interstate.Ticket.Create', {
        'debug': true
    }, function (data) {
        Interstate.Ticket.Collection();
    }, function () {

    });
};