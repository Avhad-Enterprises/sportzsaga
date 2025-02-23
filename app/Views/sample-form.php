<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validator Sample</title>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .file-preview {
            margin-top: 10px;
        }

        .file-preview img {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid #ccc;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <h1>Form Validator Sample</h1>
    <p>This form demonstrates the usage of the FormValidator library with various validations and file preview functionality.</p>

    <form id="exampleForm" class="validate-form">
        <!-- Text Input -->
        <div class="form-group">
            <label for="username">Username (Min 5 characters):</label>
            <input
                type="text"
                id="username"
                class="form-control validate-required validate-minLength"
                data-min-length="5"
                data-error-message-required="Username is required."
                data-error-message-minLength="Username must be at least 5 characters." />
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                class="form-control validate-required validate-email"
                data-error-message-required="Email is required."
                data-error-message-email="Please enter a valid email address." />
        </div>

        <!-- Checkbox -->
        <div class="form-group">
            <input
                type="checkbox"
                id="agreeTerms"
                class="validate-required"
                data-error-message-required="You must agree to the terms." />
            <label for="agreeTerms">I agree to the terms and conditions</label>
        </div>

        <!-- Dropdown -->
        <div class="form-group">
            <label for="country">Country (Required):</label>
            <select
                id="country"
                class="form-control validate-required"
                data-error-message-required="Please select a country.">
                <option value="">Select</option>
                <option value="us">United States</option>
                <option value="uk">United Kingdom</option>
                <option value="in">India</option>
            </select>
        </div>

        <!-- File Upload with Preview -->
        <div class="form-group">
            <label for="profileImage">Profile Image (JPEG/PNG, Max 2MB):</label>
            <input
                type="file"
                id="profileImage"
                class="form-control validate-required validate-file validate-fileType"
                data-max-size="2097152"
                data-allowed-types="image/jpeg,image/png"
                data-preview-width="100"
                data-preview-height="100"
                data-error-message-required="Banner image is required!"
                data-error-message-imageDimensions="The banner image must be exactly 990 x 1272 pixels."
                data-error-message-fileSize="File size must not exceed 2MB." />
        </div>

        <!-- Conditional Validation -->
        <div class="form-group">
            <label for="preorderTag">Preorder Tag:</label>
            <select
                id="preorderTag"
                class="form-control validate-required"
                data-error-message-required="Please select a Preorder Tag.">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="form-group" id="preorderDateContainer" style="display: none;">
            <label for="preorderDate">Preorder Date:</label>
            <input
                type="date"
                id="preorderDate"
                class="form-control validate-required validate-conditional"
                data-conditional-field="#preorderTag"
                data-conditional-value="yes"
                data-error-message-required="Preorder Date is required when Preorder Tag is 'Yes'." />
        </div>

        <div class="form-group">
            <label for="profileImage">Profile Image (990x1272, JPEG/PNG, Max 2MB):</label>
            <input
                type="file"
                id="profileImage"
                class="form-control validate-required validate-file validate-fileType validate-imageDimensions"
                data-max-size="2097152"
                data-allowed-types="image/jpeg,image/png"
                data-image-width="990"
                data-image-height="1272"
                data-preview-width="100"
                data-preview-height="100"
                data-error-message-required="Profile image is required."
                data-error-message-fileType="Only JPEG or PNG images are allowed."
                data-error-message-fileSize="File size must not exceed 2MB."
                data-error-message-imageDimensions="Image must be exactly 990x1272 pixels." />
        </div>

        <!-- Dynamic File Inputs with Image Dimension Validation -->
        <div class="form-group">
            <label>Add Product Images (990x1272 px):</label>
            <div class="row" id="imageUploadContainer">
                <div class="col-md-6 image-upload-row">
                    <input
                        type="file"
                        name="product_images[]"
                        accept="image/*"
                        class="form-control validate-imageDimensions"
                        data-image-width="990"
                        data-image-height="1272"
                        data-preview-width="100"
                        data-preview-height="100"
                        data-error-message-imageDimensions="Product images must be 990x1272 pixels." />
                </div>
            </div>
            <button type="button" id="addMoreImages" class="btn btn-dark">Add More Images</button>
        </div>

        <!-- Dynamic File Input -->
        <div class="form-group">
            <label>Add Product Images:</label>
            <div class="row" id="imageUploadContainer">
                <div class="col-md-6 image-upload-row">
                    <input
                        type="file"
                        name="product_images[]"
                        accept="image/*"
                        class="form-control"
                        data-preview-width="100"
                        data-preview-height="100" />
                </div>
            </div>
            <button type="button" id="addMoreImages" class="btn btn-dark">Add More Images</button>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script src="form-validator.js"></script>
    <script>
        // Initialize FormValidator
        new FormValidator('#exampleForm', {
            onSuccess: (form) => {
                alert('Form submitted successfully!');
            },
        });

        // Show/Hide Conditional Field
        document.getElementById('preorderTag').addEventListener('change', function() {
            const preorderDateContainer = document.getElementById('preorderDateContainer');
            if (this.value === 'yes') {
                preorderDateContainer.style.display = 'block';
            } else {
                preorderDateContainer.style.display = 'none';
            }
        });

        // Add Dynamic File Input
        document.getElementById('addMoreImages').addEventListener('click', function() {
            const container = document.getElementById('imageUploadContainer');
            const newRow = document.createElement('div');
            newRow.className = 'col-md-6 image-upload-row';
            newRow.innerHTML = `
                <input type="file" name="product_images[]" accept="image/*" class="form-control" data-preview-width="100" data-preview-height="100"/>
            `;
            container.appendChild(newRow);
        });
    </script>
</body>

</html>