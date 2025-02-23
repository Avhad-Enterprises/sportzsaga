const dropzoneBox = document.querySelector(".dropzone-area");
const inputElement = document.querySelector("#upload-file");
const fileLimit = 25000000;

inputElement.addEventListener("change", (e) => {
    const file = inputElement.files[0];
    
    // File validation
    if (!file) return;

    if (file.size > fileLimit) {
        alert("File is over 25MB!");
        inputElement.value = ""; // Reset input
        updateDropzoneMessage("No Files Selected");
        clearPreview();
        return;
    }

    if (!file.type.startsWith("image/")) {
        alert("Only image files are allowed!");
        inputElement.value = ""; // Reset input
        updateDropzoneMessage("No Files Selected");
        clearPreview();
        return;
    }

    // Show file details and preview
    updateDropzoneMessage(`${file.name}, ${(file.size / 1024).toFixed(2)} KB`);
    showImagePreview(file);
});

const updateDropzoneMessage = (message) => {
    const fileInfoElement = document.querySelector(".file-info");
    fileInfoElement.textContent = message;
};

const showImagePreview = (file) => {
    const previewContainer = document.querySelector(".image-preview");

    // Clear existing preview
    previewContainer.innerHTML = "";

    // Create an image element
    const reader = new FileReader();
    reader.onload = (e) => {
        const img = document.createElement("img");
        img.src = e.target.result;
        img.alt = file.name;
        img.style.maxWidth = "100%";
        img.style.maxHeight = "200px";
        img.style.marginTop = "10px";

        previewContainer.appendChild(img);
    };
    reader.readAsDataURL(file);
};

const clearPreview = () => {
    const previewContainer = document.querySelector(".image-preview");
    previewContainer.innerHTML = ""; // Clear the preview
};

// Drag-and-drop functionality
dropzoneBox.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropzoneBox.classList.add("dropzone--over");
});

["dragleave", "dragend"].forEach((type) => {
    dropzoneBox.addEventListener(type, () => {
        dropzoneBox.classList.remove("dropzone--over");
    });
});

dropzoneBox.addEventListener("drop", (e) => {
    e.preventDefault();
    dropzoneBox.classList.remove("dropzone--over");

    const file = e.dataTransfer.files[0];
    
    // File validation
    if (!file) return;

    if (file.size > fileLimit) {
        alert("File is over 25MB!");
        return;
    }

    if (!file.type.startsWith("image/")) {
        alert("Only image files are allowed!");
        return;
    }

    // Set the dropped file to input element
    inputElement.files = e.dataTransfer.files;

    // Show file details and preview
    updateDropzoneMessage(`${file.name}, ${(file.size / 1024).toFixed(2)} KB`);
    showImagePreview(file);
});
