
function getUrl()
{
	var url = window.location.href.split('/');
    url.pop();
    url.pop();
    return url.join('/');
}

function getContent(timestamp, callback)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: getUrl()+'/test_polling',
            data: queryString,
            success: function(data){
                // put result data into "obj"
                var obj = jQuery.parseJSON(data);
                // put the data_from_file
                callback(obj.data_from_file);
                // call the function again, this time with the timestamp we just got from server.php
                getContent(obj.timestamp, callback);
            }
        }
    );
}


function PollingEvent( callback )
{
	getContent(0,callback);
}