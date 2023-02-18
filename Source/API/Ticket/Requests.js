Interstate.Ticket = {};

Interstate.Ticket.Collection = function (dt)
{
    API.request('Interstate.Ticket.Collection', {
        'dt': dt
    }, function (data) {
        $('#page').html(data.render);
    }, function () {

    });
};

Interstate.Ticket.create = function ()
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

Interstate.Ticket.edit = function (key)
{
    API.request('Interstate.Ticket.Edit', {
        'key': key
    }, function (data) {
        $('#page').html(data.render);
    }, function () {

    });
};

Interstate.Ticket.save = function (key)
{
    if(!confirm('Are you sure?'))
    {
        return;
    }
    
    const jq_block = $('#ticket-edit');
    API.request('Interstate.Ticket.Save', {
        'key': key,
        'title': jq_block.find('[name="title"]').val(),
        'start': jq_block.find('[name="start"]').val(),
        'finish': jq_block.find('[name="finish"]').val(),
        'status': jq_block.find('[name="status"]').val(),
        'type': jq_block.find('[name="type"]').val(),
        'data': '{}'
    }, function (data) {
        Interstate.Ticket.Collection();
    }, function () {

    });
};