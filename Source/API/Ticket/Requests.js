Interstate.Ticket = {};

Interstate.Ticket.Collection = function (key_rune)
{
    API.request('Interstate.Ticket.Collection', {
    }, function (data) {
        $('#page').html(data.render);
    }, function () {

    });
};