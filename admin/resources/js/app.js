(function(){
    const backGround = document.querySelector('.modal-backdrop');

    function setModalValues(modal, values = ''){
        if(values){
            values = JSON.parse(values);

            const modalForm = modal.querySelector(`form`);

            if('id' in values){
                modalForm.action = (modalForm.dataset.action ? modalForm.dataset.action : '') + values.id;
            }

            for(const name in values){
                if(!values.hasOwnProperty(name)){
                    continue;
                }

                const field = modal.querySelector(`[name="${name}"]`);
                if(field){
                    if(field.tagName.toLowerCase() === 'textarea'){
                        field.innerHTML = values[name];
                        continue;
                    }

                    if(field.getAttribute('type') === 'checkbox'){
                        field.checked = !!values[name];
                    }else if(field.getAttribute('type') === 'file'){
                        field.value = '';

                        const fileLink = document.querySelector(`[data-file="${name}"]`);
                        fileLink.href = (fileLink.dataset.dir ? fileLink.dataset.dir : '') + values[name];
                        fileLink.classList.remove('d-none');
                    }else{
                        field.value = values[name];
                    }
                }
            }
        }
    }

    function showModal(modal){
        backGround.classList.add('show');
        backGround.style.display = 'block';
        modal.classList.add('show');
        modal.style.display = 'block';
    }

    function hideModal(modal){
        modal.classList.remove('show');
        modal.style.display = 'none';
        backGround.classList.remove('show');
        backGround.style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function(){
        const formLinks = document.querySelectorAll('[data-modal]');

        formLinks.forEach(function(link){
            const modalId = link.dataset.modal;

            link.addEventListener('click', function(){
                const modal = document.getElementById(modalId);
                const values = link.dataset.values;

                if(!modal.classList.contains('show')){
                    if(values)
                        setModalValues(modal, values);
                    showModal(modal);
                }
            });
        });

        const formCloseButtons = document.querySelectorAll('[data-action="form-close"]');

        formCloseButtons.forEach(function(link){
            const modal = link.closest('.modal');

            if(!modal)
                return;

            link.addEventListener('click', function(){
                hideModal(modal);
            });
        });

        const formsWithConfirmation = document.querySelectorAll('[data-confirmation]');

        if(formsWithConfirmation){
            formsWithConfirmation.forEach(function(form){

                form.addEventListener('submit', function(e){

                    e.preventDefault();

                    if(confirm('Подтверждаете удаление?')){
                        form.submit();
                    }
                });
            });
        }

        const dropDownTrigger = document.getElementById('navbarDropdown');
        const dropDownMenu = document.querySelector('.dropdown-menu');
        window.addEventListener('click', function(){
            dropDownMenu.style.display = 'none';
        });

        dropDownTrigger.addEventListener('click', function(e){
            e.stopPropagation();
            dropDownMenu.style.display = 'block';
        });
    })
})();
