<?php
    // inputValidation.php

    // Function to sanitize and validate name input
    function validateAndSanitizeName($rawInput) {
        $sanitizedInput = htmlspecialchars($rawInput, ENT_QUOTES, 'UTF-8');
        return $sanitizedInput;
    }

    // Function to validate and sanitize phone number
    function validateAndSanitizePhone($rawPhoneNumber) {
        $phoneNumber = preg_replace('/[^0-9]/', '', $rawPhoneNumber);
        if (strlen($phoneNumber) !== 10) {
            echo "<div>Error: Invalid phone number format</div>";
            exit();
        }
        return $phoneNumber;
    }

    // Function to validate and sanitize email
    function validateAndSanitizeEmail($rawEmail) {
        if (!filter_var($rawEmail, FILTER_VALIDATE_EMAIL)) {
            echo "<div>Error: Invalid email format</div>";
            exit();
        }
        // Use additional sanitation if needed
        $sanitizedEmail = filter_var($rawEmail, FILTER_SANITIZE_EMAIL);
        return $sanitizedEmail;
    }

    // Function to sanitize program input
    function sanitizeProgramme($rawInput) {
        return htmlspecialchars($rawInput, ENT_QUOTES, 'UTF-8');
    }

    // Function to sanitize passout year
    function sanitizePassoutYear($rawInput) {
        return filter_var($rawInput, FILTER_SANITIZE_NUMBER_INT);
    }

    // Function to sanitize LinkedIn profile
    function sanitizeLinkedIn($rawInput) {
        // Allow letters, numbers, dashes, underscores
        return preg_replace('/[^a-zA-Z0-9-_]/', '', $rawInput);
    }

    // Function to sanitize note
    function sanitizeNote($rawInput) {
        // Allow letters, numbers, spaces, and common punctuation
        return preg_replace('/[^a-zA-Z0-9\s.,!?()-]/', '', $rawInput);
    }
?>