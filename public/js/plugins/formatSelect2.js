function formatResultAfiliados(option){
    // Si está cargando mostrar texto de carga
    if (option.loading) {
        return '<span class="text-center"><i class="fas fa-spinner fa-spin"></i> Buscando...</span>';
    }
    // Mostrar las opciones encontradas
    let image = option.user.avatar ? `../../storage/${option.user.avatar.replace('.', '-cropped.')}` : `../../storage/users/default.png`;
    // let image = option.user.avatar ? `../../storage/${option.user.avatar}` : `../../storage/users/default.png`;
    var specialities = '';
    option.specialities.map(value => {
        specialities = specialities+value.name+' - ';
    });
    return $(`<span>
                    <div class="row">
                        <div class="col-sm-12" style="margin:0px">
                            <table>
                                <tr>
                                    <td>
                                        <img src="${image}" width="100px" style="margin-right:10px" />
                                    </td>
                                    <td>
                                        <b class="text-white" style="font-size: 18px">${option.full_name}</b><br>
                                        ${specialities.slice(0, -2)}<br>
                                        ${option.location}<br>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </span>`);
}