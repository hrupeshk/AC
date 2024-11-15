// alumniCard.js

// Year Input
const yearInput = document.getElementById("yearDropdown");
const programmeSelect = document.getElementById("programme");

// Function to calculate minimum year based on the selected program
function getMinYear(program) {
    switch (program) {
        case "CSB":
            return 2010;
        case "CSM":
            return 1997;
        case "CSI":
            return 1998;
        case "CSE":
            return 2021;
        case "PhD":
            return 1999;
        default:
            return currentYear; // Default to the current year if program is not recognized
    }
}

// Calculate current year
const currentYear = new Date().getFullYear();

// Function to update Passout Year options
function updateYearOptions() {
    const selectedProgramme = programmeSelect.value;
    const minYear = getMinYear(selectedProgramme);

    // Clear existing options
    yearInput.innerHTML = '<option value="" disabled selected>Select your Graduating Year</option>';

    // Add new options
    for (let year = currentYear; year >= minYear; year--) {
        const option = document.createElement("option");
        option.value = year;
        option.text = year;
        yearInput.appendChild(option);
    }
}

// Add event listener to Programme dropdown
programmeSelect.addEventListener("change", updateYearOptions);
// Initial setup (optional)
updateYearOptions();

// Image Upload Preview
const imagePreview = document.getElementById('imagePreview');

function previewImage(event) {
    const imageInput = event.target;
    const file = imageInput.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const imageUrl = e.target.result;
        imagePreview.src = imageUrl;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}
