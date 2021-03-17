function getList(url, selector, search = 'all', page = 1, all = 1){
    search = search ? search : 'all';
    $.get(`${url}/${search}?page=${page}&all=${all}`, function(res){
        $(selector).html(res);
    });
}

$(document).ready(function(){

    // Activar boton de reset del buscador
    $('#search-input input[name="search"]').on('keyup', function(){
        let value = $(this).val();
        if(value){
            $('.btn-reset-search').removeClass('hidden');
        }else{
            $('.btn-reset-search').addClass('hidden');
        }
    });
});

function storeFormData(formData, url, callBack){
    $.ajax({
        url: url,
        type: 'post',
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: callBack
    });
}

async function sendNotificationApp(url, FCMToken, tokenDevice, notification, data){
    var notificationContent = {
        to: tokenDevice,
        content_available: true,
        notification: {
            title: notification.title,
            body: notification.message,
            priority: "high"
        },
        data
    };

    return await fetch(url, {
    method: 'POST',
    body: JSON.stringify(notificationContent),
    headers:{
        'Content-Type': 'application/json',
        'Authorization': `key=${FCMToken}`
    }
    }).catch(error => console.error('Error en notificación movil:', error))
}