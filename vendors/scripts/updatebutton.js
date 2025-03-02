class FormChangeTracker {
    constructor(formId, updateBtnId) {
    this.form = document.getElementById(formId);
    this.updateBtn = document.getElementById(updateBtnId);
    this.initialFormData = new FormData(this.form);
    this.initialValues = {};
    // Store initial form values
    for (let [key, value] of this.initialFormData.entries()) {
    this.initialValues[key] = value;
    }
    // Hide update button initially
    this.updateBtn.style.display = 'none';
    // Bind the change detection method
    this.detectChanges = this.detectChanges.bind(this);
    // Add event listeners for all form elements
    this.addEventListeners();
    }
    addEventListeners() {
    // Monitor all input fields
    const inputs = this.form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
    input.addEventListener('input', this.detectChanges);
    input.addEventListener('change', this.detectChanges);
    });
    // Special handling for radio buttons and checkboxes
    const radioCheckboxes = this.form.querySelectorAll('input[type="radio"], input[type="checkbox"]');
    radioCheckboxes.forEach(element => {
    element.addEventListener('click', this.detectChanges);
    });
    }
    detectChanges() {
    const currentFormData = new FormData(this.form);
    let hasChanges = false;
    // Compare current values with initial values
    for (let [key, value] of currentFormData.entries()) {
    if (this.initialValues[key] !== value) {
    hasChanges = true;
    break;
    }
    }
    // Check if any initial fields are now empty
    for (let key in this.initialValues) {
    if (!currentFormData.has(key)) {
    hasChanges = true;
    break;
    }
    }
    // Show/hide update button based on changes
    this.updateBtn.style.display = hasChanges ? 'block' : 'none';
    }
    // Method to reset the tracker (useful after form submission)
    reset() {
    this.initialFormData = new FormData(this.form);
    this.initialValues = {};
    for (let [key, value] of this.initialFormData.entries()) {
    this.initialValues[key] = value;
    }
    this.updateBtn.style.display = 'none';
    }
    }