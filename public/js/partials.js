function renderLoader(img = null){
    return `<div class="text-center mt-5 mb-5">
                <img src="${img ? img : '/images/loader.gif'}" alt="loader">
            </div>`
}