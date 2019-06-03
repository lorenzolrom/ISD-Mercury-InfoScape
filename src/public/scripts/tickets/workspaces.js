function getForm()
{
    let name = $('#name').val();
    let teams = $('#teams').val();

    return {
        name: name,
        teams: teams
    };
}

function load()
{
    apiRequest('GET', 'tickets/workspaces', {}).done(function(json){
        let rows = [];
        let refs = [];


        $.each(json.data, function(i, v){
            refs.push(v.id);

            rows.push([
                v.name
            ]);
        });

        setupTable({
            target: 'results',
            header: ['Name'],
            sortColumn: 0,
            sortMethod: 'asc',
            linkColumn: 0,
            href: baseURI + 'tickets/admin/workspaces/',
            refs: refs,
            rows: rows
        });
    });
}

function create()
{
    apiRequest('POST', 'tickets/workspaces', getForm()).done(function(json){
        if(json.code === 201)
        {
            window.location.replace (baseURI + "tickets/admin/workspaces?NOTICE=Workspace created");
        }
        else
        {
            showNotifications('error', json.data.errors);
            unveil();
        }
    });

    return false;
}

function save(id)
{
    apiRequest('PUT', 'tickets/workspaces/' + id, getForm()).done(function(json){
        if(json.code === 204)
        {
            window.location.replace (baseURI + "tickets/admin/workspaces?NOTICE=Workspace saved");
        }
        else
        {
            showNotifications('error', json.data.errors);
            unveil();
        }
    });

    return false;
}

function remove(id)
{
    apiRequest('DELETE', 'tickets/workspaces/' + id, {}).done(function(json){
        if(json.code === 204)
            window.location.replace(baseURI + "tickets/admin/workspaces?NOTICE=Workspace deleted");
        else
        {
            showNotifications('error', json.data.errors);
            unveil();
        }
    });
}

if($('#results').length !== 0)
{
    load();
}