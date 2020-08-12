function initSelect2Editable(selector){
    $(selector).select2({
        tags: true,
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                newOption: true
            }
        },
        templateResult: function (data) {
            var $result = $("<span></span>");
            $result.text(data.text);
            if (data.newOption) {
                $result.append(" <em>(ENTER para agregar)</em>");
            }
            return $result;
        },
    });
}