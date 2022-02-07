require('./bootstrap');

var view_bio = document.querySelectorAll('.open-modal'),
    modal = document.querySelector('.modal');
modal.querySelectorAll('.modal-close').forEach(btn => btn.addEventListener('click', e => modal.classList.add('hidden')));
view_bio.forEach(btn =>
    btn.addEventListener('click', e => {
        var bio = btn.dataset.modalContent;
        modal.querySelector('.modal__title').innerHTML = `${btn.dataset.modalTitle}`;
        modal.querySelector('.model-content__inner').innerHTML = bio;
        modal.classList.remove('hidden');
    })
)
