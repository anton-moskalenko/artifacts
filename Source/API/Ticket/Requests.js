Interstate.Ticket = {};

Interstate.Ticket.Collection = function ()
{
    API.request('Interstate.Ticket.Collection', {
    }, function (data) {
        $('#page').html(data.render);
    }, function () {

    });
};