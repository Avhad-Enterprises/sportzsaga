class FormValidator {
    constructor(formSelector, options = {}) {
      this.form = document.querySelector(formSelector);
      this.options = options;
      this.messages = {
        en: {
          required: 'This field is required.',
          email: 'Please enter a valid email address.',
          phone: 'Please enter a valid 10-digit phone number.',
        },
      };

      if (this.form) {
        this.init();
      } else {
        console.error('Form not found!');
      }
    }

    init() {
      console.log('FormValidator initialized for:', this.form.id);
      this.form.addEventListener('submit', (e) => this.validateForm(e));
      this.form.addEventListener('reset', () => this.clearAllErrors());
    }

    validateForm(e) {
      console.log(`Validating form: ${this.form.id}`);

      e.preventDefault(); // Prevent form submission until validation is complete
      const inputs = this.form.querySelectorAll('input, textarea, select');
      let isValid = true;

      inputs.forEach((input) => {
        // Skip hidden or disabled fields
        if (input.type === "hidden" || input.disabled || input.offsetParent === null) {
          return;
        }

        const classes = input.className.split(' ');
        let fieldValid = true;

        classes.forEach((className) => {
          if (className.startsWith('validate-')) {
            const rule = className.replace('validate-', '');
            if (this.rules[rule]) {
              const isFieldValid = this.rules[rule].validate(input.value);
              console.log(`Validating ${input.name} with rule ${rule}: ${isFieldValid}`); // Log the validation result
              if (!isFieldValid) {
                fieldValid = false;
                this.showError(input, this.getMessage(rule));
              }
            }
          }
        });

        if (fieldValid) {
          this.clearError(input);
        }

        isValid = isValid && fieldValid; // Update overall form validity
      });

      console.log(`Form ${this.form.id} valid: ${isValid}`);
      if (isValid) {
        this.options.onSuccess && this.options.onSuccess(this.form);
      } else {
        console.log(`Validation failed for form: ${this.form.id}`);
      }
    }

    showError(input, message) {
      this.clearError(input);

      const error = document.createElement('div');
      error.className = 'error-message';
      error.style.color = 'red'; // Style errors
      error.innerText = message;

      input.insertAdjacentElement('afterend', error);
      console.log(`Error on ${input.name}: ${message}`); // Log the error message
    }

    clearError(input) {
      const error = input.nextElementSibling;
      if (error && error.classList.contains('error-message')) {
        error.remove();
      }
    }

    clearAllErrors() {
      this.form.querySelectorAll('.error-message').forEach((msg) => msg.remove());
    }

    getMessage(rule) {
      return this.messages.en[rule] || 'Invalid input.';
    }

    rules = {
      required: {
        validate: (value) => value.trim() !== '',
      },
      email: {
        validate: (value) =>
          /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(value),
      },
      phone: {
        validate: (value) => /^[0-9]{10}$/.test(value),
      },
    };
  }