$(document).ready(function() {
    var currentRequest = null;
    var lastProcessedValue = "";
    var delayTimer;

    
    $(document).on("input", "#alumni_id", function() {
        var alumniId = $(this).val().trim();

        // Check if the input is empty
        if (alumniId.length === 0) {
            $("#alumni_id_status").empty(); // Clear the status message
            $("#submitBtn").prop("disabled", true); // Disable the submit button
            return;
        }

        lastProcessedValue = alumniId;

        // Clear the previous timer
        clearTimeout(delayTimer);

        // Set a new timer before making the AJAX request
        delayTimer = setTimeout(function() {
            checkAlumniId(alumniId);
        }, 200);
    });

    function checkAlumniId(alumniId) {
        if (currentRequest !== null) {
            // Abort the previous request if it hasn't completed
            currentRequest.abort();
        }

        currentRequest = $.ajax({
            type: "POST",
            url: "check_alumni_id.php", 
            data: { alumni_id: alumniId },
            success: function(response) {
                // Check if the input has changed since the request was made
                if ($("#alumni_id").val().trim() !== lastProcessedValue) {
                    return;
                }

                $("#alumni_id_status").html(response);
                var submitBtn = $("#submitBtn");
                if (response.includes('color: green')) {
                    // Alumni ID found (green tick), enable the submit button
                    submitBtn.prop("disabled", false);
                } else {
                    // Alumni ID not found or other status, disable the submit button
                    submitBtn.prop("disabled", true);
                }
            }
        });
    }
});
