<!-- js -->
<script src="<?= base_url(); ?>vendors/scripts/core.js"></script>
<script src="<?= base_url(); ?>js/formvalidator.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/script.min.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/process.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/drop-zone-js.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/layout-settings.js"></script>
<script src="<?= base_url(); ?>src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/dashboard3.js"></script>
<script src="<?= base_url(); ?>src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<!-- bootstrap-touchspin js -->
<script src="<?= base_url(); ?>src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<!-- switchery js -->
<script src="<?= base_url(); ?>src/plugins/switchery/switchery.min.js"></script>
<!-- buttons for Export datatable -->
<script src="<?= base_url(); ?>src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/datatables/js/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/steps-setting.js"></script>
<script src="<?= base_url(); ?>js/control.js"></script>
<script src="<?= base_url(); ?>src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="<?= base_url(); ?>src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
<script src="<?= base_url(); ?>src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?= base_url(); ?>src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/dashboard2.js"></script>
<script src="<?= base_url(); ?>vendors/scripts/dashboard.js"></script>
<script src="<?= base_url(); ?>js/form-validation.js"></script>
<script src="<?= base_url(); ?>js/online-store.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<!-- Include dragscroll library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dragscroll/0.0.8/dragscroll.min.js"></script>
<!-- Quill.js JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Datatable Setting js -->
<script src="<?= base_url(); ?>vendors/scripts/datatable-setting.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
    style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script type="text/javascript" src="<?= base_url(); ?>js/custom.js"></script>

<script>
  $(document).ready(function() {
    // Function to show toast
    function showToast(message, type) {
      let backgroundColor = (type === 'success') ?
        "#000000" // Solid black for success
        :
        "linear-gradient(to right, #FF5F6D, #FFC371)";

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
        onClick: function() {}
      }).showToast();
    }

    // Check for flash data and show appropriate toast
    <?php if (session()->getFlashdata('success')): ?>
      showToast('<?= session()->getFlashdata('success') ?>', 'success');
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      showToast('<?= session()->getFlashdata('error') ?>', 'error');
    <?php endif; ?>
  });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.1/classic/ckeditor.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    ClassicEditor
      .create(document.querySelector('#editor'), {
        toolbar: [
          'heading', '|',
          'bold', 'italic', 'underline', 'link', '|',
          'bulletedList', 'numberedList', 'blockQuote', '|',
          'undo', 'redo', 'imageUpload', 'insertTable', 'mediaEmbed', '|',
          'codeBlock', 'htmlEmbed'
        ],
        placeholder: 'Write the product description here...'
      })
      .then(editor => {
        console.log('Editor initialized', editor);
      })
      .catch(error => {
        console.error('There was a problem initializing the editor:', error);
      });
  });
</script>


<script>
  function fetchTrackingUpdates() {
    fetch("<?= base_url('update-tracking'); ?>")
      .then(response => response.json())
      .then(data => {
        if (data.status === "success") {
          console.log("Tracking updated", data.updated_shipments);

          // Refresh the tracking details on the page

        }
      })
      .catch(error => console.error("Error fetching tracking updates:", error));
  }

  function fetchEmails() {
    fetch("<?= base_url('fetchEmails'); ?>")
      .then(response => response.json())
      .then(data => {
        if (data.status === "success") {
          console.log("mails updated");

          // Refresh the tracking details on the page

        }
      })
      .catch(error => console.error("Error fetching tracking updates:", error));
  }



  // Start auto-fetch every 30 seconds
  setInterval(() => {
    fetchTrackingUpdates();
    fetchEmails();
  }, 30000);
</script>

<!-- Include Quill Editor -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize Quill Editor
    const quill = new Quill('#quillEditor', {
      theme: 'snow',
      placeholder: 'Write Full Product Description Here!',
      modules: {
        toolbar: [
          [{
            'header': [1, 2, 3, false]
          }],
          ['bold', 'italic', 'underline', 'strike'], // Formatting options
          [{
            'list': 'ordered'
          }, {
            'list': 'bullet'
          }],
          [{
            'align': []
          }],
          ['link', 'image', 'blockquote', 'code-block'],
          [{
            'color': []
          }, {
            'background': []
          }], // Color options
          ['clean'] // Remove formatting
        ]
      }
    });

    // Sync content to hidden textarea on form submit
    const form = document.getElementById('AddnewProductsForm');
    const textarea = document.getElementById('product-description');

    form.addEventListener('submit', function() {
      textarea.value = quill.root.innerHTML; // Set Quill content to textarea
    });
  });
</script>

<script>
  document.getElementById('metaFieldsToggle').addEventListener('click', function() {
    var metaFieldsCollapse = document.getElementById('metaFieldsCollapse');
    if (metaFieldsCollapse.classList.contains('show')) {
      metaFieldsCollapse.classList.remove('show');
      this.textContent = 'Show Meta Fields';
    } else {
      metaFieldsCollapse.classList.add('show');
      this.textContent = 'Hide Meta Fields';
    }
  });
</script>

<script>
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('image-preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<script>
  function previewLogo(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('logo-image-preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<script>
  function dripspotpreviewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('dripspot-image-preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<script>
  function confirmbblogDelete(blog_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'blogs/deleteblog/' + blog_id;
      }
    });
  }
</script>

<script>
  function confirmbstoryDelete(blog_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'stories/deletestory/' + blog_id;
      }
    });
  }
</script>

<script>
  function confirmbdripspotDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'dripspot/deletedripspot/' + id;
      }
    });
  }
</script>

<script>
  function confirmbbrandDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'brands/deletebrand/' + id;
      }
    });
  }
</script>

<script>
  function confirmbcatDelete(cat_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'category/deletecat/' + cat_id;
      }
    });
  }
</script>

<script>
  function confirmbcollectionprodDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'deleteprod/' + id;
      }
    });
  }
</script>

<script>
  function confirmSocialMediaDelete(link_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '<?= base_url('delete_social_media_link/') ?>' + link_id;
      }
    });
  }
</script>

<script>
  function confirmbdiscountcodeDelete(dis_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete/' + dis_id;
      }
    });
  }
</script>

<script>
  document.getElementById("productType").addEventListener("change", function() {
    var selectedType = this.value;
    var additionalFields = document.querySelectorAll(".additional-fields");

    // Hide all additional fields initially
    additionalFields.forEach(function(field) {
      field.style.display = "none";
    });

    // Show fields corresponding to the selected product type
    if (selectedType) {
      document.getElementById(selectedType + "-fields").style.display = "block";
    }
  });
</script>

<script>
  document.getElementById('productCategory').addEventListener('change', function() {
    // Hide all additional fields
    document.querySelectorAll('.additional-fields').forEach(function(element) {
      element.style.display = 'none';
    });

    // Show the fields corresponding to the selected category
    const selectedCategory = this.value;
    if (selectedCategory) {
      document.getElementById(selectedCategory.toLowerCase() + '-fields').style.display = 'block';
    }
  });
</script>

<script>
  function confirmbproductDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'admin-products/deleteproduct/' + id;
      }
    });
  }
</script>

<script>
  document.getElementById('main-category').addEventListener('change', function() {
    var clothingSubcategories = document.getElementById('clothing-subcategories');
    if (this.value === 'clothing') {
      clothingSubcategories.classList.remove('hidden');
    } else {
      clothingSubcategories.classList.add('hidden');
      document.getElementById('clothing-category').value = '';
      document.getElementById('topwear-subcategories').classList.add('hidden');
    }
  });

  document.getElementById('clothing-category').addEventListener('change', function() {
    var topwearSubcategories = document.getElementById('topwear-subcategories');
    if (this.value === 'topwear') {
      topwearSubcategories.classList.remove('hidden');
    } else {
      topwearSubcategories.classList.add('hidden');
      document.getElementById('topwear-category').value = '';
    }
  });

  document.getElementById('topwear-category').addEventListener('change', function() {
    var tshirtsSubcategories = document.getElementById('shirt-subcategories');
    if (this.value === 'tshirt') {
      tshirtsSubcategories.classList.remove('hidden');
    } else {
      tshirtsSubcategories.classList.add('hidden');
      document.getElementById('topwear-category').value = '';
    }
  });
</script>

<script>
  function confirmbcollectionDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'collections/deletecollection/' + id;
      }
    });
  }
</script>

<script>
  function confirmdripvisionDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'deletedripvision/' + id;
      }
    });
  }
</script>

<script>
  document.querySelectorAll('.image-input').forEach(function(input) {
    input.addEventListener('change', function(event) {
      var previewId = 'image-preview' + event.target.id.replace('image', '');
      var previewElement = document.getElementById(previewId);

      var reader = new FileReader();
      reader.onload = function() {
        previewElement.src = reader.result;
        previewElement.style.display = 'block';
      };
      reader.readAsDataURL(event.target.files[0]);
    });
  });
</script>


<script>
  document.getElementById("image1").addEventListener("change", function() {
    // Show the next image upload field
    document.getElementById("image2Upload").style.display = "block";
  });

  document.getElementById("image2").addEventListener("change", function() {
    // Show the next image upload field
    document.getElementById("image3Upload").style.display = "block";
  });

  document.getElementById("image3").addEventListener("change", function() {
    // Show the next image upload field
    document.getElementById("image4Upload").style.display = "block";
  });

  document.getElementById("image4").addEventListener("change", function() {
    // Show the next image upload field
    document.getElementById("image5Upload").style.display = "block";
  });

  document.getElementById("image5").addEventListener("change", function() {
    // Show the next image upload field
    document.getElementById("image6Upload").style.display = "block";
  });
</script>

<script>
  document.getElementById('tier-1').addEventListener('change', function() {
    var tier2 = document.getElementById('tier-2');
    if (this.value === 'Clothing') {
      tier2.removeAttribute('disabled');
      // Add additional logic to filter tier2 based on tier1 selection if needed
    } else {
      tier2.setAttribute('disabled', 'disabled');
      tier2.value = '';
    }
  });

  document.getElementById('tier-2').addEventListener('change', function() {
    var tier3 = document.getElementById('tier-3');
    if (this.value === 'Topwear') {
      tier3.removeAttribute('disabled');
      // Add additional logic to filter tier3 based on tier2 selection if needed
    } else {
      tier3.setAttribute('disabled', 'disabled');
      tier3.value = '';
    }
  });

  document.getElementById('tier-3').addEventListener('change', function() {
    var tier4 = document.getElementById('tier-4');
    if (this.value === 'T-Shirt') {
      tier4.removeAttribute('disabled');
      // Add additional logic to filter tier4 based on tier3 selection if needed
    } else {
      tier4.setAttribute('disabled', 'disabled');
      tier4.value = '';
    }
  });
</script>

<script>
  $(document).ready(function() {
    $('#submitNewFieldBtn').click(function() {
      var title = $('#newFieldTitle').val();
      if (title) {
        $.ajax({
          url: '<?= base_url("admin/addFieldAjax") ?>',
          type: 'POST',
          data: {
            title: title
          },
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              $('#dynamicFields').append('<div class="form-group"><label>' + response.field_label + '</label><input type="text" class="form-control" name="' + response.field_name + '" placeholder="Enter ' + response.field_label + '" required></div>');
              $('#newFieldTitle').val(''); // Clear the input field
            } else {
              alert(response.message);
            }
          },
          error: function(xhr, status, error) {
            console.error(xhr, status, error);
            alert('Request failed: ' + status);
          }
        });
      } else {
        alert('Please enter a field title');
      }
    });
  });
</script>

<script>
  function confirmorderDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'ordermanagement/deleteorder/' + id;
      }
    });
  }
</script>

<script>
  function confirmimgsectionDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'blogs/deletesubsection/' + id;
      }
    });
  }
</script>

<script>
  function confirmbtierDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'tier-1/deletetier1/' + id;
      }
    });
  }
</script>

<script>
  function confirmbtier2Delete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'tier-2/deletetier2/' + id;
      }
    });
  }
</script>

<script>
  function confirmbtier3Delete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'tier-3/deletetier3/' + id;
      }
    });
  }
</script>

<script>
  function confirmbtier4Delete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'tier-4/deletetier4/' + id;
      }
    });
  }
</script>

<script>
  function confirmdripcelebDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'blogs/dripsubsection/' + id;
      }
    });
  }
</script>

<script>
  function confirmbPincodeDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete-pincode/' + id;
      }
    });
  }
</script>

<script>
  function deleteProductcarousel(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete_product/' + id;
      }
    });
  }
</script>

<script>
  $(document).ready(function() {
    $('.swiper-slide').on('click', function() {
      var storyId = $(this).data('story-id');

      $.ajax({
        url: '<?= base_url('stories/getStoryContent') ?>/' + storyId,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          $('.storymainshow').removeClass('hidden').html(response.content);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
</script>


<script>
  window.onload = function() {
    var successMessage = document.getElementById('success-message');
    if (successMessage) {
      successMessage.style.display = 'block';
      setTimeout(function() {
        successMessage.style.display = 'none';
      }, 2000); // 2000 milliseconds = 2 seconds
    }
  }
</script>


<script>
  "use strict";
  const containerEl = document.getElementById("container");
  const registerBtn = document.getElementById("register");
  const loginBtn = document.getElementById("login");
  registerBtn.addEventListener("click", () =>
    containerEl.classList.add("active"),
  );
  loginBtn.addEventListener("click", () =>
    containerEl.classList.remove("active"),
  );
</script>

<script>
  $(document).ready(function() {
    $('#tags').change(function(e) {
      e.preventDefault(); // Prevent the default form submission
      $('#newcollectionsview').submit(); // Manually submit the form
    });
  });
</script>

<script>
  function toggleVisibility(id) {
    fetch(`<?= base_url(); ?>toggleSection/${id}`).then(response => {
      if (response.ok) {
        location.reload();
      }
    });
  }
</script>

<script>
  // JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>

<script>
  $(document).ready(function() {
    // Function to filter products based on search input
    $('#productSearch').on('keyup', function() {
      var searchText = $(this).val().toLowerCase();

      $('.product-item').each(function() {
        var productTitle = $(this).text().toLowerCase();
        var isVisible = productTitle.indexOf(searchText) > -1;
        $(this).toggle(isVisible); // Show/hide based on search match
      });
    });
  });

  $(document).ready(function() {
    // Handle product selection checkboxes
    $('.product-checkbox').change(function() {
      updateSelectedProductsTable();
    });

    // Update table when product checkboxes change
    function updateSelectedProductsTable() {
      $('#productTableBody').empty();
      var totalPrice = 0;

      $('.product-checkbox:checked').each(function() {
        var productId = $(this).val();
        var productName = $(this).next('label').text().split(' - ')[0]; // Extract product name
        var productPrice = parseFloat($(this).data('price'));
        totalPrice += productPrice;

        // Add row to table
        $('#productTableBody').append(`
                <tr>
                    <td>${productId}</td>
                    <td>${productName}</td>
                    <td>&#8377;${productPrice.toFixed(2)}</td>
                </tr>
            `);
      });

      // Update total price
      $('#totalPrice').text(totalPrice.toFixed(2));
    }

    // Initialize table on page load
    updateSelectedProductsTable();
  });
</script>

<script>
  $(document).ready(function() {
    $('#table_name').change(function() {
      var tableName = $(this).val();
      $('#loader').show(); // Show the loader
      $('#columns_container').html(''); // Clear the columns container
      $.ajax({
        url: '<?= base_url('gettablecolumns') ?>',
        type: 'post',
        data: {
          table_name: tableName
        },
        success: function(response) {
          var columns = response;
          var columnsHtml = '';
          for (var i = 0; i < columns.length; i++) {
            var displayName = columns[i].replace(/_/g, ' ').replace(/\b\w/g, function(char) {
              return char.toUpperCase();
            });
            columnsHtml += '<div class="col-md-6"><div class="custom-control custom-checkbox mb-3">' +
              '<input type="checkbox" class="custom-control-input" id="column' + i + '" name="columns[]" value="' + columns[i] + '">' +
              '<label class="custom-control-label" for="column' + i + '">' + displayName + '</label></div></div>';
          }
          $('#columns_container').html(columnsHtml);
          $('#loader').hide(); // Hide the loader
        },
        error: function() {
          $('#loader').hide(); // Hide the loader in case of an error
          alert('Failed to fetch columns.');
        }
      });
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.task-row').forEach(function(row) {
      row.addEventListener('click', function(event) {
        if (event.target.closest('.no-modal')) {
          event.stopPropagation();
        } else {
          var modalId = row.getAttribute('data-target');
          $(modalId).modal('show');
        }
      });
    });
  });
</script>

<script>
  function showEmail(id) {
    document.querySelectorAll('.email-body').forEach(body => body.style.display = 'none');
    document.getElementById(id).style.display = 'block';
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    const productTableBody = document.getElementById('productTableBody');
    const totalPriceEl = document.getElementById('totalPrice');

    productCheckboxes.forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        updateProductTable();
        updateTotalPrice();
      });
    });

    function updateProductTable() {
      productTableBody.innerHTML = '';
      productCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
          const productRow = document.createElement('tr');
          productRow.innerHTML = `
                        <td>${checkbox.id.replace('product', '')}</td>
                        <td>${checkbox.nextElementSibling.innerText.split(' - ')[0]}</td>
                        <td>&#8377;${checkbox.dataset.price}</td>
                    `;
          productTableBody.appendChild(productRow);
        }
      });
    }

    function updateTotalPrice() {
      let total = 0;
      productCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
          total += parseFloat(checkbox.dataset.price);
        }
      });
      totalPriceEl.innerText = `&#8377;${total.toFixed(2)}`;
    }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const confirmSelectionBtn = document.getElementById('confirmSelectionBtn');
    const productTableBody = document.getElementById('productTableBody');
    const totalPriceEl = document.getElementById('totalPrice');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const displayProducts = document.getElementById('displayProducts');
    const applyDiscountBtn = document.getElementById('applyDiscount');
    const discountAmountInput = document.getElementById('discountAmount');

    function updateProductTable() {
      const selectedProducts = document.querySelectorAll('.modal-product-checkbox:checked');
      productTableBody.innerHTML = ''; // Clear existing table rows
      displayProducts.innerHTML = ''; // Clear existing display list
      let totalPrice = 0;

      selectedProducts.forEach(checkbox => {
        const productId = checkbox.id.replace('modalProduct', '');
        const productLabel = checkbox.nextElementSibling;
        const productName = productLabel.childNodes[2].nodeValue.trim();
        const productPrice = parseFloat(checkbox.dataset.price);
        const productQuantity = parseInt(document.querySelector(`input[name="modal_quantity[${productId}]"]`).value, 10);

        // Calculate total price for this product
        const subtotal = productPrice * productQuantity;
        totalPrice += subtotal;

        // Create and append table row
        const productRow = document.createElement('tr');
        productRow.innerHTML = `
                <td>${productId}</td>
                <td>${productName}</td>
                <td>${productQuantity}</td>
                <td>&#8377;${subtotal.toFixed(2)}</td>
                <td><button type="button" class="btn btn-danger btn-sm remove-product-btn" data-product-id="${productId}">Remove</button></td>
            `;
        productTableBody.appendChild(productRow);

        // Create and append list item for display
        const productListItem = document.createElement('li');
        productListItem.textContent = `${productName} - ₹${subtotal.toFixed(2)}`;
        displayProducts.appendChild(productListItem);
      });

      // Save the total price in a data attribute for later use
      totalPriceEl.dataset.totalPrice = totalPrice.toFixed(2);

      // Update total price display
      updateTotalPrice();

      // Add event listeners to the remove buttons
      document.querySelectorAll('.remove-product-btn').forEach(button => {
        button.addEventListener('click', removeProduct);
      });
    }

    function removeProduct(event) {
      const productId = event.target.dataset.productId;
      const checkbox = document.getElementById(`modalProduct${productId}`);
      checkbox.checked = false; // Uncheck the corresponding checkbox
      updateProductTable(); // Update the product table and display list
    }

    function loadMoreProducts() {
      const hiddenProducts = document.querySelectorAll('#modalProductList .product-item[style*="display: none;"]');
      let count = 0;
      hiddenProducts.forEach(product => {
        if (count < 5) {
          product.style.display = 'block';
          count++;
        }
      });

      // Hide Load More button if no more hidden products
      if (document.querySelectorAll('#modalProductList .product-item[style*="display: none;"]').length === 0) {
        loadMoreBtn.style.display = 'none';
      }
    }

    // Apply discount
    $('#applyDiscount').on('click', function() {
      let discountAmount = parseFloat($('#discountAmount').val());
      let totalPrice = parseFloat($('#totalPrice').data('original-total'));

      if (isNaN(discountAmount) || discountAmount < 0) {
        alert('Please enter a valid discount amount.');
        return;
      }

      let discountedPrice = totalPrice - discountAmount;
      $('#totalPrice').text('₹' + discountedPrice.toFixed(2));
      $('#discountModal').modal('hide');
    });

    // Update total price in the table
    function updateTotalPrice() {
      let totalPrice = 0;
      $('#productTableBody tr').each(function() {
        let productPrice = parseFloat($(this).find('td:nth-child(4)').text().replace('₹', ''));
        totalPrice += productPrice;
      });

      $('#totalPrice').text('₹' + totalPrice.toFixed(2));
      $('#totalPrice').data('original-total', totalPrice); // Store the original total before discount
    }

    confirmSelectionBtn.addEventListener('click', () => {
      updateProductTable();
      $('#productModal').modal('hide'); // Hide the modal
    });
  });
</script>

<script>
  $(document).ready(function() {
    // Update customer name and email
    $('input[name="order-customer-name"]').on('input', function() {
      $('#displayCustomerName').text($(this).val());
    });

    $('input[name="order-customer-email"]').on('input', function() {
      $('#displayCustomerEmail').text($(this).val());
    });

    $('input[name="order-customer-phone"]').on('input', function() {
      $('#displayCustomerPhone').text($(this).val());
    });

    $('textarea[name="customer-address"]').on('input', function() {
      $('#displayCustomerAddress').text($(this).val());
    });

    // Update selected products and total price
    $(document).on('change', '.product-checkbox', function() {
      var selectedProducts = '';
      var totalPrice = 0;

      $('.product-checkbox:checked').each(function() {
        var productId = $(this).val();
        var productTitle = $(this).closest('.product-item').find('label').text();
        var productPrice = parseFloat($(this).data('price'));

        selectedProducts += '<li>' + productTitle + '</li>';
        totalPrice += productPrice;
      });

      $('#displayProducts').html(selectedProducts);
      $('#totalPrice').text('₹' + totalPrice.toFixed(2));
    });

    // Update payment method
    $('#paymentMethodSelect').change(function() {
      $('#displayPaymentMethod').text($(this).find('option:selected').text());
    });
  });
</script>

<script>
  let colorIndex = 1;

  document.getElementById('add-color-option').addEventListener('click', function() {
    const colorOptionsContainer = document.getElementById('color-options');
    const newColorOption = document.createElement('div');
    newColorOption.classList.add('row', 'color-option');
    newColorOption.dataset.index = colorIndex;

    newColorOption.innerHTML = `
            <div class="col-md-6">
                <div class="form-group">
                    <label>Color Name</label>
                    <input class="form-control" name="colors[${colorIndex}][name]" type="text" placeholder="Color Name" required>
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Color Image</label>
                    <input type="file" class="form-control image-input" name="colors[${colorIndex}][image]" accept="image/*" required>
                    <img class="image-preview" src="#" alt="Image Preview">
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>
        `;

    colorOptionsContainer.appendChild(newColorOption);
    colorIndex++;
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const sectionsContainer = document.getElementById('sections-container');
    const addSectionBtn = document.getElementById('add-section-btn');
    let sectionCount = 1;

    // Initialize Quill for the first section
    initializeQuill(sectionCount);

    addSectionBtn.addEventListener('click', function() {
      if (sectionCount >= 10) {
        alert('You can only add up to 10 sections.');
        return;
      }

      sectionCount++;
      const newSection = document.createElement('div');
      newSection.classList.add('form-section');
      newSection.id = 'section-' + sectionCount;
      newSection.innerHTML = `
                <div class="form-group">
                    <label>Title ${sectionCount}</label>
                    <input class="form-control" type="text" name="section_title[]" placeholder="Title ${sectionCount}">
                    <i>
                        <p style="font-size: 12px; margin-left:10px; margin-top:5px">Max 70 chars, Min 10 chars, Exclude %, &, $, Avoid 'Free', 'Sale', 'Best'</p>
                    </i>
                </div>

                <div class="form-group">
                    <label>Description ${sectionCount}</label>
                    <div id="editor-${sectionCount}" class="quill-editor"></div>
                    <input type="hidden" name="section_description[]" id="description-${sectionCount}">
                    <i>
                        <p style="font-size: 12px; margin-left:10px; margin-top:5px">No contact info, Exclude emails, phones, links</p>
                    </i>
                </div>

                <div class="form-group">
                    <label>Section Image ${sectionCount}</label>
                    <input type="file" class="form-control-file form-control height-auto" name="section_image[]" onchange="previewSectionImage(event, ${sectionCount})">
                    <i>
                        <p style="font-size: 12px; margin-left:10px; margin-top:5px">Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 720 x 560 px.</p>
                    </i>
                    <div id="image-preview-container-${sectionCount}" style="position: relative; display: none;">
                        <img id="image-preview-${sectionCount}" src="#" alt="Image Preview" style="width: 100%; max-width: 500px;">
                        <button type="button" onclick="removeSectionImage(${sectionCount})" style="position: absolute; top: 5px; right: 5px; border: none; background: transparent; cursor: pointer;">
                            <i class="fa-solid fa-circle-xmark" style="color: #ffffff;"></i>
                        </button>
                    </div>
                </div>
            `;
      sectionsContainer.appendChild(newSection);

      // Initialize Quill for the new section
      initializeQuill(sectionCount);
    });

    function initializeQuill(count) {
      const quill = new Quill(`#editor-${count}`, {
        theme: 'snow',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline'], // toggled buttons
            [{
              'list': 'ordered'
            }, {
              'list': 'bullet'
            }],
            ['clean'] // remove formatting button
          ]
        }
      });

      // Handle the hidden input value
      quill.on('text-change', function() {
        const descriptionInput = document.getElementById(`description-${count}`);
        descriptionInput.value = quill.root.innerHTML; // Store HTML content in the hidden input
      });
    }
  });

  // Preview and remove image functions
  function previewSectionImage(event, sectionId) {
    const reader = new FileReader();
    reader.onload = function() {
      const imagePreview = document.getElementById(`image-preview-${sectionId}`);
      const previewContainer = document.getElementById(`image-preview-container-${sectionId}`);
      imagePreview.src = reader.result;
      previewContainer.style.display = 'inline-block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function removeSectionImage(sectionId) {
    const imageInput = document.querySelector(`#section-${sectionId} input[type='file']`);
    const imagePreview = document.getElementById(`image-preview-${sectionId}`);
    const previewContainer = document.getElementById(`image-preview-container-${sectionId}`);
    imageInput.value = ''; // Clear the file input
    imagePreview.src = '#'; // Reset the image preview
    previewContainer.style.display = 'none'; // Hide the container
  }
</script>

<script>
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var imagePreview = document.getElementById('image-preview');
      var imageRemoveBtn = document.getElementById('image-remove-btn');
      imagePreview.src = reader.result;
      imagePreview.style.display = 'block';
      imageRemoveBtn.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
  }

  function removeImage() {
    var imagePreview = document.getElementById('image-preview');
    var imageRemoveBtn = document.getElementById('image-remove-btn');
    var fileInput = document.querySelector('input[name="blog-main-image"]');

    imagePreview.src = '#';
    imagePreview.style.display = 'none';
    imageRemoveBtn.style.display = 'none';
    fileInput.value = '';
  }
</script>

<script>
  document.getElementById('meta-title').addEventListener('input', function() {
    document.getElementById('serp-title').textContent = this.value || 'Sample Meta Title';
  });

  document.getElementById('meta-description').addEventListener('input', function() {
    document.getElementById('serp-description').textContent = this.value || 'Sample Meta Description goes here. It includes your target keyword naturally and is under 160 characters.';
  });

  const urlPrefix = "https://www.driphunter.in/";

  document.getElementById('meta-url').addEventListener('input', function() {
    const userUrl = this.value || 'sample-title';
    document.getElementById('serp-url').textContent = urlPrefix + userUrl;
    document.getElementById('serp-url').href = urlPrefix + userUrl;
  });
</script>

<script>
  function previewMedia() {
    const [file] = document.getElementById("media").files;
    if (file) {
      const mediaPreview = document.getElementById("media_preview");
      const mediaPreviewImage = document.getElementById("media_preview_image");
      const mediaPreviewVideo = document.getElementById("media_preview_video");

      if (file.type.startsWith('image/')) {
        // If the file is an image, display it in the image preview
        mediaPreview.src = URL.createObjectURL(file);
        mediaPreviewImage.style.display = 'block';
        mediaPreviewVideo.style.display = 'none';
      } else if (file.type.startsWith('video/')) {
        // If the file is a video, display it in the video preview
        mediaPreviewVideo.src = URL.createObjectURL(file);
        mediaPreviewImage.style.display = 'none';
        mediaPreviewVideo.style.display = 'block';
      } else {
        // If the file is neither an image nor a video, display an error message or handle it accordingly
        console.error('Unsupported file type:', file.type);
      }
    }
  }
</script>

<script>
  function previewMedia(postId) {
    const [file] = document.getElementById("media" + postId).files;
    if (file) {
      const mediaPreviewImage = document.getElementById("media_preview_image" + postId);
      const mediaPreviewVideo = document.getElementById("media_preview_video" + postId);

      if (file.type.startsWith('image/')) {
        mediaPreviewImage.src = URL.createObjectURL(file);
        mediaPreviewImage.style.display = 'block';
        mediaPreviewVideo.style.display = 'none';
      } else if (file.type.startsWith('video/')) {
        mediaPreviewVideo.src = URL.createObjectURL(file);
        mediaPreviewImage.style.display = 'none';
        mediaPreviewVideo.style.display = 'block';
      } else {
        console.error('Unsupported file type:', file.type);
      }
    }
  }

  let postCount = 1;

  function addNewPostForm() {
    const expandedCard = document.querySelector('.collapse.show');
    if (expandedCard) {
      expandedCard.classList.remove('show');
    }
    postCount++;
    const newPostForm = `
        <div class="card" id="postCard${postCount}">
            <div class="card-header" id="heading${postCount}">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse${postCount}" aria-expanded="false" aria-controls="collapse${postCount}">
                    Schedule post #${postCount}
                    </button>
                    <button class="btn btn-primary" onclick="removePostForm(${postCount})">REMOVE</button>
                </h2>
            </div>
            <div id="collapse${postCount}" class="collapse show" aria-labelledby="heading${postCount}" data-parent="#accordionExample">
                <div class="card-body">
                    <form id="form${postCount}" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Example file input</label>
                                    <input type="file" id="media${postCount}" class="form-control-file form-control height-auto" name="media[]" required onchange="previewMedia(${postCount})">
                                    <img class="card-img max-height-200px" style="display: none;" id="media_preview_image${postCount}" alt="Media Preview (Image)">
                                    <video class="card-img max-height-200px" style="display: none;" id="media_preview_video${postCount}" controls alt="Media Preview (Video)"></video>
                                </div>
                                <div class="form-group">
                                    <label>CAPTION</label>
                                    <textarea class="form-control" placeholder="Enter Caption" id="caption${postCount}" type="text" name="caption[]" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>PUBLISH AT</label>
                                    <input type="datetime-local" id="Publish_at${postCount}" name="Publish_at[]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>PUBLISH_TO</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="FEED${postCount}" value="FEED" name="PUBLISH_TO[${postCount}]" class="custom-control-input">
                                        <label class="custom-control-label" for="FEED${postCount}">FEED</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="STORIES${postCount}" value="STORIES" name="PUBLISH_TO[${postCount}]" class="custom-control-input">
                                        <label class="custom-control-label" for="STORIES${postCount}">STORIES</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>MEDIA_TYPE</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="IMAGE${postCount}" value="IMAGE" name="MEDIA_TYPE[${postCount}]" class="custom-control-input">
                                        <label class="custom-control-label" for="IMAGE${postCount}">IMAGE</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="REELS${postCount}" value="REELS" name="MEDIA_TYPE[${postCount}]" class="custom-control-input">
                                        <label class="custom-control-label" for="REELS${postCount}">REELS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>`;

    document.getElementById('accordionExample').insertAdjacentHTML('beforeend', newPostForm);
  }

  function removePostForm(postId) {
    document.getElementById('postCard' + postId).remove();
  }

  function validateForm(form, postId) {
    const media = form.querySelector('input[name="media[]"]').files[0];
    const caption = form.querySelector('textarea[name="caption[]"]').value.trim();
    const publishAt = form.querySelector('input[name="Publish_at[]"]').value;
    const publishTo = form.querySelector(`input[name="PUBLISH_TO[${postId}]"]:checked`);
    const mediaType = form.querySelector(`input[name="MEDIA_TYPE[${postId}]"]:checked`);

    if (!media || !caption || !publishAt || !publishTo || !mediaType) {
      return false;
    }
    return true;
  }

  function ScheduleAllPost() {
    let allFormsValid = true;
    let formData = new FormData();
    let existingForms = 0;

    for (let i = 1; i <= postCount; i++) {
      const form = document.getElementById('form' + i);
      if (form) {
        existingForms++;
        if (!validateForm(form, i)) {
          allFormsValid = false;
          alert(`Please fill in all required fields for post #${i}.`);
          return;
        }

        let mediaFile = form.querySelector('input[name="media[]"]').files[0];
        formData.append('media[]', mediaFile);

        let caption = form.querySelector('textarea[name="caption[]"]').value;
        formData.append('caption[]', caption);

        let publishAt = form.querySelector('input[name="Publish_at[]"]').value;
        formData.append('Publish_at[]', publishAt);

        let publishTo = form.querySelector(`input[name="PUBLISH_TO[${i}]"]:checked`).value;
        formData.append('PUBLISH_TO[]', publishTo);

        let mediaType = form.querySelector(`input[name="MEDIA_TYPE[${i}]"]:checked`).value;
        formData.append('MEDIA_TYPE[]', mediaType);
      }
    }

    if (existingForms === 0) {
      alert('Please add at least one post before scheduling.');
      return;
    }

    if (!allFormsValid) {
      return;
    }

    // Show loading modal
    $('#loading-modal').modal('show');

    fetch("<?= site_url('public/instagram/scheduleAllPosts') ?>", {
        method: "POST",
        body: formData
      })
      .then(response => {
        if (response.ok) {
          return response.json();
        }
        throw new Error('Network response was not ok.');
      })
      .then(data => {
        // Hide loading modal
        $('#loading-modal').modal('hide');

        if (data.success) {
          window.location.href = "<?= site_url('public/instagram') ?>";
        } else {
          alert('Error: ' + data.message);
        }
      })
      .catch(error => {
        // Hide loading modal
        $('#loading-modal').modal('hide');

        console.error('Error:', error);
        alert('An error occurred while scheduling posts. Please try again.');
      });
  }

  // Add event listener to the "Save Schedule post" button
  document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('a[onclick="ScheduleAllPost()"]');
    if (saveButton) {
      saveButton.addEventListener('click', function(event) {
        event.preventDefault();
        ScheduleAllPost();
      });
    }
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector('.carousel');
    const indicators = document.querySelectorAll('.indicator');

    let currentIndex = 0;
    const totalImages = carousel.children.length;

    function updateCarousel() {
      // Calculate the correct offset based on the current index
      const offset = -currentIndex * 100;
      carousel.style.transform = `translateX(${offset}%)`;

      // Update active indicator
      indicators.forEach((indicator, index) => {
        if (index === currentIndex) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });
    }

    // Add event listeners to the indicators
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        currentIndex = index;
        updateCarousel();
      });
    });

    // Optionally, you can add auto-slide functionality
    setInterval(() => {
      currentIndex = (currentIndex + 1) % totalImages;
      updateCarousel();
    }, 3000); // Slide every 3 seconds

    // Initial update
    updateCarousel();
  });
</script>

<script>
  function previewImages(event) {
    const previewContainer = document.getElementById('carousel-preview');
    previewContainer.innerHTML = ''; // Clear previous previews

    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const reader = new FileReader();

      reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.width = '100px'; // Adjust width as needed
        img.style.margin = '10px'; // Adjust margin as needed
        previewContainer.appendChild(img);
      };

      reader.readAsDataURL(file);
    }
  }
</script>

<script>
  document.querySelector('.left-chevron').addEventListener('click', function() {
    document.querySelector('.Allcategorypills').scrollBy({
      left: -200, // Adjust the value as needed
      behavior: 'smooth'
    });
  });

  document.querySelector('.right-chevron').addEventListener('click', function() {
    document.querySelector('.Allcategorypills').scrollBy({
      left: 200, // Adjust the value as needed
      behavior: 'smooth'
    });
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    const desktopCarousel = document.querySelector('.carousel-desktop');
    const mobileCarousel = document.querySelector('.carousel-mobile');
    const indicators = document.querySelectorAll('.indicator');

    let currentIndex = 0;
    const totalImages = desktopCarousel.children.length;

    function updateCarousel(carousel) {
      const offset = -currentIndex * 100;
      carousel.style.transform = `translateX(${offset}%)`;

      indicators.forEach((indicator, index) => {
        if (index === currentIndex) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });
    }

    // Add event listeners to the indicators
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        currentIndex = index;
        updateCarousel(desktopCarousel);
        updateCarousel(mobileCarousel);
      });
    });

    // Optionally, you can add auto-slide functionality
    setInterval(() => {
      currentIndex = (currentIndex + 1) % totalImages;
      updateCarousel(desktopCarousel);
      updateCarousel(mobileCarousel);
    }, 3000); // Slide every 3 seconds

    // Initial update
    updateCarousel(desktopCarousel);
    updateCarousel(mobileCarousel);
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const swiperWrapper = document.querySelector('.custom-swiper-wrapper');
    const slides = document.querySelectorAll('.custom-swiper-slide');
    const rightArrow = document.querySelector('.right-arrow');
    const leftArrow = document.querySelector('.left-arrow');
    const galleryWrapper = document.querySelector('.gallery-wrapper');
    const containerWidth = galleryWrapper.offsetWidth;

    let currentIndex = 0;
    const slideWidth = slides[0].offsetWidth + 24; // Including margin
    const totalSlides = slides.length;

    function updateSwiperPosition() {
      const maxTranslateX = Math.max((totalSlides * slideWidth) - containerWidth, 0);
      const translateX = Math.min(currentIndex * slideWidth, maxTranslateX);
      swiperWrapper.style.transform = `translateX(-${translateX}px)`;
    }

    rightArrow.addEventListener('click', () => {
      if (currentIndex < totalSlides - 1) {
        currentIndex++;
        updateSwiperPosition();
      }
    });

    leftArrow.addEventListener('click', () => {
      if (currentIndex > 0) {
        currentIndex--;
        updateSwiperPosition();
      }
    });

    // Initialize position
    updateSwiperPosition();
  });
</script>

<script>
  $(document).ready(function() {

    $('.BrandShow img').on('click', function() {
      $('#brandModal').fadeIn();
      $('body').css('overflow', 'hidden');
    });

    $('.Brands-Close-Button').on('click', function() {
      $('#brandModal').fadeOut();
      $('body').css('overflow', 'auto');
    });

    $(window).on('click', function(event) {
      if ($(event.target).is('#brandModal')) {
        $('#brandModal').fadeOut();
        $('body').css('overflow', 'auto');
      }
    });
  });
</script>

<script>
  var captchaCode = "";

  // Function to generate and display CAPTCHA
  function generateCaptcha() {
    var canvas = document.getElementById("captchaCanvas");
    var ctx = canvas.getContext("2d");

    // Clear the canvas first
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Set background color of the CAPTCHA
    ctx.fillStyle = "#f2f2f2";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Characters allowed in CAPTCHA
    var charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var captchaLength = 6; // Length of CAPTCHA
    captchaCode = "";

    // Generate random CAPTCHA
    for (var i = 0; i < captchaLength; i++) {
      var index = Math.floor(Math.random() * charsArray.length);
      captchaCode += charsArray[index];
    }

    // Draw random lines to increase CAPTCHA complexity
    for (var j = 0; j < 5; j++) {
      ctx.beginPath();
      ctx.moveTo(Math.random() * canvas.width, Math.random() * canvas.height);
      ctx.lineTo(Math.random() * canvas.width, Math.random() * canvas.height);
      ctx.strokeStyle = "#ccc"; // Light gray color for the lines
      ctx.stroke();
    }

    // Set font and color for the CAPTCHA text
    ctx.font = "bold 30px Arial";
    ctx.fillStyle = "#333"; // Dark color for the text

    // Draw each character of the CAPTCHA with slight rotation and positioning
    for (var i = 0; i < captchaCode.length; i++) {
      var x = 20 + i * 30;
      var y = 30 + Math.random() * 10;
      var angle = Math.random() * 0.2 - 0.1; // Slight random rotation for each character
      ctx.save();
      ctx.translate(x, y);
      ctx.rotate(angle);
      ctx.fillText(captchaCode[i], 0, 0);
      ctx.restore();
    }
  }

  // Generate CAPTCHA when the page loads
  window.onload = function() {
    generateCaptcha(); // Automatically show CAPTCHA on page load
  }

  // Function to validate the CAPTCHA entered by the user
  function validateCaptcha() {
    var userInputCaptcha = document.getElementById("captchaInput").value;
    if (userInputCaptcha === captchaCode) {
      alert("Captcha matched");
      return true;
    } else {
      alert("Captcha did not match. Try again!");
      return false;
    }
  }
</script>

<script>
  document.getElementById('inviteType').addEventListener('change', function() {
    var type = this.value;
    document.getElementById('employeeFields').style.display = (type === 'employee') ? 'block' : 'none';
    document.getElementById('sellerFields').style.display = (type === 'seller') ? 'block' : 'none';
  });
</script>

<script>
  function dripspotpcpreviewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('dripspot-pc-image-preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function dripspotmobilepreviewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('dripspot-mobile-image-preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const celebrityPosts = document.querySelectorAll('.celebrity-post');
    const mainPostImage = document.getElementById('main-post-image');
    const mainPostDetails = document.getElementById('main-post-details');
    const totalPriceElement = document.querySelector('.totalPrice');

    celebrityPosts.forEach(post => {
      post.addEventListener('click', function() {
        const celebImage = this.getAttribute('data-image');
        const celebName = this.getAttribute('data-name');
        const dateOfUpload = this.getAttribute('data-date_of_upload');

        mainPostImage.src = celebImage;
        mainPostDetails.innerHTML = `
                    <h3 class="dripSpotHeading Celibrityname">
                        <span class="date_of_upload">${dateOfUpload}</span>
                        <span class="nameofceleb Celibrityname">${celebName}</span>
                    </h3>
                `;

        let totalPrice = 0;

        for (let i = 1; i <= 3; i++) {
          const brandImage = this.getAttribute(`data-brand_image_${i}`);
          const brandName = this.getAttribute(`data-brand_name_${i}`);
          const articleName = this.getAttribute(`data-article_name_${i}`);
          const price = this.getAttribute(`data-price_${i}`);
          totalPrice += parseFloat(price);

          document.querySelector(`.brand-image-${i}`).src = brandImage;
          document.querySelector(`.brand-name-${i}`).textContent = brandName;
          document.querySelector(`.article-name-${i}`).textContent = articleName;
          document.querySelector(`.price-${i}`).innerHTML = `&#8360;.${price}`;
        }

        totalPriceElement.innerHTML = `Total: &#8377;${totalPrice}`;

        // Scroll to the main div
        document.getElementById('dripSpotMain').scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const productNameInput = document.querySelector('input[name="product-name"]');
    const productDescriptionInput = document.querySelector('textarea[name="product-short-description"]');
    const seoUrlInput = document.querySelector('input[name="url"]');
    const seoTitleInput = document.querySelector('input[name="meta-tag"]');
    const seoDescriptionInput = document.querySelector('input[name="meta-description"]');

    function generateSlug(text) {
      return text
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    }

    productNameInput.addEventListener('input', function() {
      const title = productNameInput.value;
      seoTitleInput.value = title;
      seoUrlInput.value = generateSlug(title);
    });

    productDescriptionInput.addEventListener('input', function() {
      const description = productDescriptionInput.value;
      seoDescriptionInput.value = description;
    });
  });
</script>

<script>
  function dripspotpreviewImagemobile(event) {
    var reader = new FileReader();
    var imagePreview = document.getElementById('dripspot-image-preview-mobile');

    reader.onload = function() {
      imagePreview.src = reader.result;
      imagePreview.style.display = 'block';
    };

    if (event.target.files && event.target.files[0]) {
      reader.readAsDataURL(event.target.files[0]);
    }
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const titleInput = document.querySelector("input[name='blog-title']");
    const metaUrlInput = document.querySelector("input[name='blog-meta-url']");

    function generateSlug(text) {
      return text
        .toLowerCase()
        .trim()
        .replace(/\s+/g, "-")
        .replace(/[^a-z0-9\-]/g, "")
        .replace(/-+/g, "-");
    }

    titleInput.addEventListener("input", function() {
      let title = titleInput.value;

      if (title.length > 0) {
        let slug = generateSlug(title);
        metaUrlInput.value = slug;
      } else {
        metaUrlInput.value = "";
      }
    });
  });
</script>


<script>
  function previewImage(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('image-preview-container');
    const imagePreview = document.getElementById('desktop-image-preview');
    const removeIcon = document.getElementById('remove-image');

    if (file) {
      const reader = new FileReader();

      reader.onload = function(e) {
        imagePreview.src = e.target.result;
        removeIcon.style.display = 'block';
      }

      reader.readAsDataURL(file);
    }
  }
</script>

<script>
  const linkPrefix = 'https://driphunter.in/collections/';

  const tierNameInput = document.getElementById('tier_name');
  const tierValueInput = document.getElementById('tier_value');
  const linkInput = document.getElementById('link');

  tierNameInput.addEventListener('input', function() {
    // Get the current value and transform it
    const tierName = this.value.toLowerCase().replace(/'/g, ''); // Remove apostrophes
    const tierValueTransformed = tierName.replace(/\s+/g, '_');
    const tierLinkTransformed = tierName.replace(/\s+/g, '-');

    // Update the input fields
    tierValueInput.value = tierValueTransformed;
    linkInput.value = linkPrefix + tierLinkTransformed;
  });
</script>

<script>
  document.getElementById('editAddress').addEventListener('click', function() {
    var form = document.getElementById('addressForm');
    if (form.style.display === "none") {
      form.style.display = "block";
    } else {
      form.style.display = "none";
    }
  });
</script>

<script>
  $(document).ready(function() {
    $('#edit-password-btn').click(function() {
      if ($('#new-password-fields').is(':visible')) {
        $('#new-password-fields').slideUp();
        $('#current-password').attr('disabled', 'disabled');
        $(this).text('Edit');
      } else {
        $('#new-password-fields').slideDown();
        $('#current-password').removeAttr('disabled');
        $(this).text('Cancel');
      }
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>

<script>
  const tagsWrapper = document.querySelector(".tags-wrapper ul"),
    input = tagsWrapper.querySelector("input"),
    maxTags = 10;
  let tags = [];

  function countTags() {
    input.focus();
  }

  function createTag() {
    tagsWrapper.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag => {
      let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="removeTag(this, '${tag}')"></i></li>`;
      tagsWrapper.insertAdjacentHTML("afterbegin", liTag);
    });
    countTags();
  }

  function removeTag(element, tag) {
    let index = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTags();
  }

  function addTag(event) {
    if (event.key === "Enter" || event.key === ",") {
      let tag = event.target.value.trim();
      if (tag.length > 0 && !tags.includes(tag)) {
        if (tags.length < maxTags) {
          tag.split(',').forEach(t => {
            if (t) tags.push(t.trim());
          });
          createTag();
        }
      }
      event.target.value = "";
    }
  }

  input.addEventListener("keyup", addTag);
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Select all forms in the admin panel
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
      // Add an event listener for 'keypress' on the form
      form.addEventListener('keypress', function(event) {
        // Check if the pressed key is Enter
        if (event.key === 'Enter') {
          // Prevent form submission when Enter is pressed
          event.preventDefault();
        }
      });
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the modal and elements
    var modal = document.getElementById('imageModal');
    var modalImage = document.getElementById('modalImage');
    var closeButton = document.querySelector('.close');

    // Get all the images to add event listeners
    var images = document.querySelectorAll('.img-thumbnail');

    // When an image is clicked, open the modal and display the image
    images.forEach(function(img) {
      img.addEventListener('click', function() {
        modal.style.display = "block";
        modalImage.src = this.src;
      });
    });

    // Close the modal when the close button is clicked
    closeButton.addEventListener('click', function() {
      modal.style.display = "none";
    });

    // Close the modal when anywhere outside the image is clicked
    window.addEventListener('click', function(event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  });
</script>

<script>
  function previewpccollectionImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('image-collpc-preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function previewmobilecollectionImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('image-collmob-preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const fileInput = document.getElementById("profile-picture");
    const errorMessage = document.getElementById("error-message");
    const form = document.getElementById("profile-picture-form");

    fileInput.addEventListener("change", function() {
      const file = this.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function(e) {
        const img = new Image();
        img.src = e.target.result;

        img.onload = function() {
          // Validate Dimensions
          if (img.width !== 300 || img.height !== 300) {
            errorMessage.innerText = "Image must be exactly 300 x 300 pixels.";
            fileInput.value = ""; // Clear file input
            return;
          }

          // Validate File Size (1 MB Max)
          if (file.size > 1048576) {
            errorMessage.innerText = "File size must be under 1 MB.";
            fileInput.value = ""; // Clear file input
            return;
          }

          // Clear error if everything is valid
          errorMessage.innerText = "";
        };
      };
    });

    form.addEventListener("submit", function(event) {
      if (errorMessage.innerText !== "") {
        event.preventDefault(); // Prevent form submission if error exists
      }
    });
  });
</script>





<!-------------------------------------------------------------------- Home Carousel SweetDelete ----------------------------------------------------------------------------------->

<script>
  function confirmcarouseldelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete_carousel/' + id;
      }
    });
  }
</script>

<script>
  function confirmCarouselRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this carousel?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/restore_carousel/') ?>" + id;
      }
    });
  }
</script>




<!-------------------------------------------------------------------- Header Pages ----------------------------------------------------------------------------------->

<script>
  function confirmheaderdelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete_page/' + id;
      }
    });
  }
</script>

<script>
  function confirmRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this carousel?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/restore_page/') ?>" + id;
      }
    });
  }
</script>



<!-------------------------------------------------------------------- marquee  ----------------------------------------------------------------------------------->

<script>
  function deletemarquee(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete_marquee/' + id;
      }
    });
  }
</script>

<script>
  function confirmMarqueeRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this carousel?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/restore_marquee/') ?>" + id;
      }
    });
  }
</script>




<script>
  function AllblogsDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete-all-blogs/' + id;
      }
    });
  }
</script>



<script>
  function confirmblogsRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this carousel?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/restore-all-blogs/') ?>" + id;
      }
    });
  }
</script>


<script>
  function AlllogoDelete(logoId) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        fetch(`<?= base_url('online_store/delete-all-logo/') ?>${logoId}`, {
            method: 'GET'
          })
          .then(response => response.json())
          .then(data => {
            Swal.fire('Deleted!', data.message, 'success');
            location.reload(); // Refresh page to update UI
          })
          .catch(error => {
            Swal.fire('Error!', 'Something went wrong.', 'error');
            console.error('Delete Error:', error);
          });
      }
    });
  }
</script>


<script>
  function confirmlogoRestore(logoId) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this carousel?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/delete-all-logos/') ?>" + logoId;
      }
    });
  }
</script>




<script>
  function ourteamDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/deletemember/') ?>" + id;
      }
    });
  }
</script>


<script>
  function memberRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this Member?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/restore-all-members/') ?>" + id;
      }
    });
  }
</script>


<script>
  function policyDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/delete_policy/') ?>" + id;
      }
    });
  }
</script>


<script>
  function policyRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this Member?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('online_store/restore-policy/') ?>" + id;
      }
    });
  }
</script>




<!------------------------------------------------------------------------ Bundle line ------------------------------------------------------------------------------------->
<script>
  function confirmGiftCardRestore(gift_card_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this Member?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('bundlecollection/restoreGiftCard/') ?>" + gift_card_id;
      }
    });
  }
</script>







<!------------------------------------------------------------- Discount Code ------------------------------------------------------------------------------------------------------>

<script>
  function confirmDiscountCodeDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('discountcode/delete/') ?>" + id;
      }
    });
  }

  function confirmDiscountCodeRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this discount code?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('discountcode/restore/') ?>" + id;
      }
    });
  }
</script>




<!--------------------------------------------------------------- Supplier --------------------------------------------------------------------------------------------------------->
<script>
  function confirmSupplierDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('suppliers/delete/') ?>" + id;
      }
    });
  }

  function confirmSupplierRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this supplier?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('suppliers/restore/') ?>" + id;
      }
    });
  }
</script>






<!--------------------------------------------------------------- Catalog --------------------------------------------------------------------------------------------------------->

<script>
  function confirmCatalogDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This action will mark the catalog as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('catalog/delete/') ?>" + id;
      }
    });
  }

  function confirmCatalogRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this catalog?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green color for restore action
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('catalog/restore/') ?>" + id;
      }
    });
  }
</script>



<!--------------------------------------------------------------- Related Products --------------------------------------------------------------------------------------------------------->

<script>
  function confirmRelatedProductDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the product as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.post("<?= base_url('relatedproduct/deleteProduct') ?>", {
          product_id: id
        }, function(response) {
          if (response.status === 'success') {
            Swal.fire('Deleted!', response.message, 'success').then(() => location.reload());
          } else {
            Swal.fire('Error!', response.message, 'error');
          }
        }, 'json');
      }
    });
  }

  function confirmRelatedProductRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this product?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('relatedproduct/restore/') ?>" + id;
      }
    });
  }
</script>

<!------------------------------------------------------------------------- Inventory ------------------------------------------------------------------------------------------->

<script>
  function confirmInventoryDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the inventory record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('inventory/delete/') ?>" + id;
      }
    });
  }

  function confirmInventoryRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this inventory record?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('inventory/restore/') ?>" + id;
      }
    });
  }
</script>

<!---------------------------------------------------- Transfer Inventory Soft Delete Script ----------------------------------------------------->

<script>
  function confirmTransferDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the transfer record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red color for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('transfer/delete/') ?>" + id;
      }
    });
  }

  function confirmTransferRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this transfer record?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('transfer/restore/') ?>" + id;
      }
    });
  }
</script>

<!---------------------------------------------------- Purchase Order Soft Delete Script ----------------------------------------------------->

<script>
  function confirmPurchaseOrderDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the purchase order as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('purchase-order/delete/') ?>" + id;
      }
    });
  }

  function confirmPurchaseOrderRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this purchase order?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('purchase-order/restore/') ?>" + id;
      }
    });
  }
</script>



<!-------------------------------------------------------------------------------------------- Tier 1 Soft Delete Script ----------------------------------------------------------------------->

<script>
  function confirmTierDelete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the Tier 1 record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tier/delete/') ?>" + id;
      }
    });
  }

  function confirmTierRestore(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this Tier 1 record?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tier/restore/') ?>" + id;
      }
    });
  }
</script>



<!----------------------------------------------------------------------------------- Tier 2 Soft Delete Script ------------------------------------------------------------------------------->
<script>
  function confirmTier2Delete(tier_2_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the Tier 2 record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tiers/delete_tier_2/') ?>" + tier_2_id;
      }
    });
  }

  function confirmTier2Restore(tier_2_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this Tier 2 record?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tiers/restore_tier_2/') ?>" + tier_2_id;
      }
    });
  }
</script>


<!------------------------------------------------------------------------------------ Tier 3 Soft Delete Script ------------------------------------------------------------------------------------->
<script>
  function confirmTier3Delete(tier_3_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the Tier 3 record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tiers/delete_tier_3/') ?>" + tier_3_id;
      }
    });
  }

  function confirmTier3Restore(tier_3_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this Tier 3 record?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tiers/restore_tier_3/') ?>" + tier_3_id;
      }
    });
  }
</script>





<!---------------------------------------------------------------------------------------- Tier 4 Soft Delete Script --------------------------------------------------------------------------------->
<script>
  function confirmTier4Delete(tier_4_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the Tier 4 record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tiers/delete_tier_4/') ?>" + tier_4_id;
      }
    });
  }

  function confirmTier4Restore(tier_4_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this Tier 4 record?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('tiers/restore_tier_4/') ?>" + tier_4_id;
      }
    });
  }
</script>




<!---------------------------------------------------- Collection Soft Delete Script ----------------------------------------------------->
<script>
  function confirmCollectionDelete(collection_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the collection record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('collections/deletecollection/') ?>" + collection_id;
      }
    });
  }

  function confirmCollectionRestore(collection_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this collection?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        let restoreUrl = "<?= base_url('restorecollection/') ?>" + collection_id;
        console.log("Restoring Collection:", restoreUrl); // Debugging
        window.location.href = restoreUrl;
      }
    });
  }
</script>




<!---------------------------------------------------- Product Soft Delete Script ----------------------------------------------------->
<script>
  function confirmProductDelete(product_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "This will mark the product record as deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33', // Red for delete
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('admin-products/deleteproduct/(:num)') ?>" + product_id;
      }
    });
  }

  function confirmProductRestore(product_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to restore this product?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745', // Green for restore
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore it!'
    }).then((result) => {
      if (result.isConfirmed) {
        let restoreUrl = "<?= base_url('products/restoreproduct/') ?>" + product_id;
        console.log("Restoring Product:", restoreUrl); // Debugging
        window.location.href = restoreUrl;
      }
    });
  }
</script>