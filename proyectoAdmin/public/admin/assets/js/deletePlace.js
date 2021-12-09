(function () {

    //mÃ©todo 3
    let modalDelete = document.getElementById('modalDelete');
    let deletePlace = document.getElementById('deletePlace');
    modalDelete.addEventListener('show.bs.modal', function (event) {
        let element = event.relatedTarget;
        let action = element.getAttribute('data-url');
        let name = element.dataset.name;
        if(deletePlace) {
            deletePlace.innerHTML = name;
        }
        let form = document.getElementById('modalDeleteResourceForm');
        form.action = action;
    });

})();