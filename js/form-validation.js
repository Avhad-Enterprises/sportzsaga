/**
 * FormValidator Class with Validation and File Previews
 */
class FormValidator {
    constructor(formSelector, options = {}) {
        this.form = document.querySelector(formSelector); // The form element
        this.options = options; // User-provided options
        this.validationClass = 'validate-form'; // Class required for validation
        this.language = options.language || 'en'; // Default language for error messages

        // Default error messages
        this.messages = {
            en: {
                required: 'This field is required.',
                email: 'Please enter a valid email address.',
                file: 'Please select a file.',
                fileSize: 'File size exceeds the allowed limit.',
                fileType: 'Invalid file type.',
                imageDimensions: 'Image dimensions must match the required size.',
            },
        };

        // Default file size limits (in bytes)
        this.fileSizeLimits = {
            default: 400 * 1024, // 400 KB
            image: 2 * 1024 * 1024, // 2 MB
            video: 20 * 1024 * 1024, // 20 MB
            document: 400 * 1024, // 400 KB
        };

        // Validation rules
        this.rules = {
            conditional: {
                validate: (value, input) => {
                    const conditionField = document.querySelector(input.dataset.conditionalField);
                    const conditionValue = input.dataset.conditionalValue;
                    if (conditionField && conditionField.value === conditionValue) {
                        return value.trim() !== ''; // Validate only if the condition is met
                    }
                    return true; // Skip validation if the condition is not met
                },
                message: 'required',
            },
            // Required field validation
            required: {
                validate: (value, input) => {
                    if (input.type === 'checkbox') {
                        return input.checked; // For checkboxes, ensure it is checked
                    } else if (input.tagName.toLowerCase() === 'select') {
                        return value !== ''; // For select fields, ensure a non-empty value is selected
                    }
                    return value.trim() !== ''; // For other fields, ensure non-empty value
                },
                message: 'required',
            },
            // Email field validation
            email: {
                validate: (value) =>
                    /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(value),
                message: 'email',
            },
            // File size validation
            file: {
                validate: (value, input) => {
                    const file = input.files[0];
                    if (!file) return false; // No file selected
                    const customMaxSize = input.dataset.maxSize
                        ? parseInt(input.dataset.maxSize, 10)
                        : this.getFileSizeLimit(file.type);
                    return file.size <= customMaxSize;
                },
                message: 'fileSize',
            },
            // File type validation
            fileType: {
                validate: (value, input) => {
                    const file = input.files[0];
                    if (!file) return false; // No file selected
                    const allowedTypes = input.dataset.allowedTypes?.split(',') || [];
                    return allowedTypes.length === 0 || allowedTypes.includes(file.type);
                },
                message: 'fileType',
            },
            // Image dimension validation
            imageDimensions: {
                validate: async (value, input) => await this.validateImageDimensions(input),
                message: 'imageDimensions',
            },
        };

        // Initialize the validator
        this.init();
    }

    /**
     * Initialize the validator
     */
    init() {
        if (!this.form) throw new Error('Form not found!');
        if (!this.form.classList.contains(this.validationClass)) return;

        // Add event listeners for form validation and reset
        this.form.addEventListener('submit', async (e) => await this.validateForm(e));
        this.form.addEventListener('reset', () => this.clearAllErrors());

        // Enable real-time validation
        this.enableRealTimeValidation();

        // Enable file previews for file inputs
        this.enableFilePreview();
    }

    /**
     * Validate the form on submit
     */
    async validateForm(e) {
        e.preventDefault(); // Prevent default form submission
        const inputs = this.form.querySelectorAll('input, textarea, select');
        let isValid = true;

        for (const input of inputs) {
            const classes = input.className.split(' ');
            for (const className of classes) {
                if (className.startsWith('validate-')) {
                    const rule = className.replace('validate-', '');
                    if (this.rules[rule]) {
                        const attrValue = input.dataset[rule];
                        const isFieldValid = await this.rules[rule].validate(input.value, input, attrValue);

                        if (!isFieldValid) {
                            isValid = false;
                            const customMessage = this.getCustomErrorMessage(input, rule);
                            this.showError(input, customMessage || this.getMessage(rule, attrValue));
                        } else {
                            this.clearError(input);
                        }
                    }
                }
            }
        }

        if (isValid) {
            this.options.onSuccess && this.options.onSuccess(this.form);
        }
    }

    /**
     * Get custom error message for a specific field
     */
    getCustomErrorMessage(input, rule) {
        const customMessageAttr = `errorMessage${rule.charAt(0).toUpperCase() + rule.slice(1)}`;
        return input.dataset[customMessageAttr] || null;
    }

    /**
     * Show an error message below an input field
     */
    showError(input, message) {
        this.clearError(input);
        const error = document.createElement('div');
        error.className = 'error-message';
        error.innerText = message;
        input.parentElement.appendChild(error);
    }

    /**
     * Clear an error message from an input field
     */
    clearError(input) {
        const error = input.parentElement.querySelector('.error-message');
        if (error) error.remove();
    }

    /**
     * Clear all error messages and file previews
     */
    clearAllErrors() {
        this.form.querySelectorAll('.error-message').forEach((msg) => msg.remove());
        this.form.querySelectorAll('.file-preview-container').forEach((preview) => preview.remove());
    }

    /**
     * Enable real-time validation
     */
    enableRealTimeValidation() {
        const inputs = this.form.querySelectorAll('input, textarea, select');
        inputs.forEach((input) => {
            const eventType = input.tagName.toLowerCase() === 'select' || input.type === 'checkbox' ? 'change' : 'input';
            input.addEventListener(eventType, async () => {
                const classes = input.className.split(' ');
                for (const className of classes) {
                    if (className.startsWith('validate-')) {
                        const rule = className.replace('validate-', '');
                        if (this.rules[rule]) {
                            const attrValue = input.dataset[rule];
                            const isFieldValid = await this.rules[rule].validate(input.value, input, attrValue);

                            if (isFieldValid) {
                                this.clearError(input);
                            } else {
                                this.showError(input, this.getCustomErrorMessage(input, rule) || this.getMessage(rule, attrValue));
                            }
                        }
                    }
                }
            });
        });
    }

    /**
     * Enable file preview functionality
     */
    enableFilePreview() {
        const fileInputs = this.form.querySelectorAll('input[type="file"]');
        fileInputs.forEach((input) => {
            input.addEventListener('change', () => this.showFilePreview(input));
        });
    }

    /**
     * Validate image dimensions
     */
    async validateImageDimensions(input) {
        const file = input.files[0];
        if (!file || !file.type.startsWith('image/')) return true;

        const requiredWidth = input.dataset.imageWidth ? parseInt(input.dataset.imageWidth, 10) : null;
        const requiredHeight = input.dataset.imageHeight ? parseInt(input.dataset.imageHeight, 10) : null;

        return new Promise((resolve) => {
            const img = new Image();
            img.onload = () => {
                const isValid =
                    (!requiredWidth || img.width === requiredWidth) &&
                    (!requiredHeight || img.height === requiredHeight);

                resolve(isValid);
            };
            img.onerror = () => resolve(false);
            img.src = URL.createObjectURL(file);
        });
    }

    /**
     * Show a preview of the uploaded file
     */
    showFilePreview(input) {
        const file = input.files[0];
        if (!file) return;

        const previewContainer = document.createElement('div');
        previewContainer.className = 'file-preview-container';

        // Clear any existing preview
        const existingPreview = input.parentElement.querySelector('.file-preview-container');
        if (existingPreview) existingPreview.remove();

        // Generate preview based on file type
        if (file.type.startsWith('image/')) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.width = '300px';
            img.style.height = 'auto';
            previewContainer.appendChild(img);
        }

        input.parentElement.appendChild(previewContainer);
    }

    /**
     * Get file size limit based on file type
     */
    getFileSizeLimit(fileType) {
        if (fileType.startsWith('image/')) return this.fileSizeLimits.image;
        if (fileType.startsWith('video/')) return this.fileSizeLimits.video;
        if (fileType === 'application/pdf' || fileType.startsWith('application/vnd')) {
            return this.fileSizeLimits.document;
        }
        return this.fileSizeLimits.default;
    }

    /**
     * Get the default error message for a validation rule
     */
    getMessage(rule, attr) {
        return typeof this.rules[rule].message === 'function'
            ? this.rules[rule].message(attr)
            : this.messages[this.language][this.rules[rule].message];
    }
}
