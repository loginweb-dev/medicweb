function getList(url, selector, search = 'all', page = 1){
    search = search ? search : 'all';
    $.get(`${url}/${search}?page=${page}`, function(res){
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
})