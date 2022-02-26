(function() {

    const UP = document.querySelector('.up_js')
    const categoriesButton = document.querySelectorAll('.category-button_js')
    const itemsContainer = document.querySelectorAll('.items-container_js')
    const union = document.querySelector('.union_js')
    const close = document.querySelector('.close_js')
    const navigation = document.querySelector('.mobile_navigation_js')

    UP.addEventListener('click', () => {
        window.scrollTo(0, 0)
    })

    categoriesButton.forEach(category => category.addEventListener('click', ev => {
        const categoryId = ev.target.dataset.id
        categoriesButton.forEach(_category => _category.dataset.id === categoryId
            ? _category.classList.add('active')
            : _category.classList.remove('active'))
        itemsContainer.forEach(container => container.dataset.id === categoryId
            ? container.classList.add('active')
            : container.classList.remove('active'))
    }))

    union.addEventListener('click', ev => {
        ev.target.classList.add('hide')
        close.classList.remove('hide')
        navigation.classList.remove('hide')
    })
    close.addEventListener('click', ev => {
        ev.target.classList.add('hide')
        union.classList.remove('hide')
        navigation.classList.add('hide')
    })

    window.addEventListener('scroll', ev => {
        if(window.scrollY === 0) {
            UP.classList.add('hide')
        } else {
            UP.classList.remove('hide')
        }
    })
})()
