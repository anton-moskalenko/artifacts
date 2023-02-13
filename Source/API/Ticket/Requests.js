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