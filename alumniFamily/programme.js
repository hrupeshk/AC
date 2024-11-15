/* programme.js */

function navigateToYearPage(program) {
    window.location.href = `year.php?program=${program}`;
}

// Function to update counts based on the data received from count.php
function updateCounts(data) {
    var countsMap = {};
    var programIDs = ['CSB', 'CSM', 'CSI', 'CSE', 'PhD'];
    programIDs.forEach(function (programID) {
        countsMap[programID] = 0;
    });

    // Update counts based on the received data
    data.forEach(function (item) {
        var programID = item.prog_id;
        countsMap[programID] = item.count;
    });

    // Update the HTML spans with the counts
    programIDs.forEach(function (programID) {
        var spanId = programID + "_count";
        var spanElement = document.getElementById(spanId);
        if (spanElement) {
            spanElement.textContent = countsMap[programID];
        }
    });
}

// Function to fetch counts using AJAX
function fetchCounts() {
    fetch("count.php")
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok, status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => updateCounts(data))
        .catch(error => {
            console.error("Error fetching counts:", error.message);
        });
}

// Call the fetchCounts function when the page loads
window.onload = function () {
    fetchCounts();
};