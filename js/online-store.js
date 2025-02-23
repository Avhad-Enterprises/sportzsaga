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

$(document).ready(function () {
    // Function to show toast
    function showToast(message, type) {
        let backgroundColor = (type === 'success') ? "#000000" : "linear-gradient(to right, #FF5F6D, #FFC371)";

        Toastify({
            text: message,
            duration: 10000,
            close: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            style: {
                background: backgroundColor,
            },
            onClick: function () { }
        }).showToast();
    }

    // Handle Add New Carousel Form submission
    $('#carouselForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        const form = $(this);
        const url = form.attr('action'); // Get the form action URL
        const formData = new FormData(this); // Create FormData object

        // Disable the submit button
        const submitButton = form.find('button[type="submit"]');
        submitButton.prop('disabled', true).text('Adding...');

        // AJAX request
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    // Display success toast
                    showToast(response.message, 'success');

                    // Reset the form
                    form[0].reset();

                    // Optionally reload or update UI components (like the carousel list)
                    $('#carouselBoxContainer').load(location.href + " #carouselBoxContainer > *");
                } else {
                    // Display error toast
                    showToast(response.message, 'error');
                }
            },
            error: function () {
                // Display error toast
                showToast("An error occurred while adding the carousel.", 'error');
            },
            complete: function () {
                // Re-enable the submit button
                submitButton.prop('disabled', false).text('Add');
            }
        });
    });
});


$(document).ready(function () {
    // Function to show toast
    function showToast(message, type) {
        let backgroundColor = (type === 'success') ? "#000000" : "linear-gradient(to right, #FF5F6D, #FFC371)";

        Toastify({
            text: message,
            duration: 10000,
            close: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            style: {
                background: backgroundColor,
            },
            onClick: function () { }
        }).showToast();
    }

    // Handle form submission for each edit form
    $('.carousel-edit-form form').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        const form = $(this);
        const url = form.attr('action'); // Get the form action URL
        const formData = new FormData(this); // Create FormData object

        // Disable the submit button
        const submitButton = form.find('button[type="submit"]');
        submitButton.prop('disabled', true).text('Updating...');

        // AJAX request
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    // Display success toast
                    showToast(response.message, 'success');

                    // Optionally update the UI with new data
                    const titleHandle = form.closest('.CarouselBox').find('.handle');
                    titleHandle.html(`☰ ${response.updatedTitle}`);
                } else {
                    // Display error toast
                    showToast(response.message, 'error');
                }
            },
            error: function () {
                // Display error toast
                showToast("An error occurred while updating the carousel.", 'error');
            },
            complete: function () {
                // Re-enable the submit button
                submitButton.prop('disabled', false).text('Update');
            }
        });
    });
});



