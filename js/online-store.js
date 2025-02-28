document.addEventListener('DOMContentLoaded', () => {
    const toggleCarouselFormButton = document.getElementById('toggleCarouselFormButton');
    const carouselForm = document.getElementById('carouselAddForm');

    if (toggleCarouselFormButton) {
        toggleCarouselFormButton.addEventListener('click', () => {
            if (carouselForm.style.display === 'none' || carouselForm.style.display === '') {
                carouselForm.style.display = 'block';
            } else {
                carouselForm.style.display = 'none';
            }
        });
    }

    document.querySelectorAll('.CarouselBox').forEach((box) => {
        const chevron = box.querySelector('.fa-chevron-down');
        const editForm = box.querySelector('.carousel-edit-form');

        chevron.addEventListener('click', () => {
            if (editForm.style.display === 'none' || editForm.style.display === '') {
                editForm.style.display = 'block';
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-up');
            } else {
                editForm.style.display = 'none';
                chevron.classList.remove('fa-chevron-up');
                chevron.classList.add('fa-chevron-down');
            }
        });
    });
});




