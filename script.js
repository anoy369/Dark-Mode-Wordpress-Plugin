jQuery(document).ready(function ($) {
    // Initial dark mode state
    var darkMode = false;

    // Function to toggle dark mode
    function toggleDarkMode() {
        darkMode = !darkMode;

        // Change the button text and icons based on the dark mode state
        var buttonText = darkMode ? '<input type="checkbox" class="checkbox" id="checkbox"><label for="checkbox" class="checkbox-label"><i class="fas fa-moon"></i><i class="fas fa-sun"></i><span class="ball"></span> </label>' : '<input type="checkbox" checked class="checkbox" id="checkbox"><label for="checkbox" class="checkbox-label"><i class="fas fa-moon"></i><i class="fas fa-sun"></i><span class="ball"></span></label>';
        $('#changeColorButton').html(buttonText);

        // Change the page styles based on the dark mode state
        $('body').toggleClass('dark-mode', darkMode);
    }

    // Attach the toggleDarkMode function to the button click event
    $('#changeColorButton').click(function() {
        toggleDarkMode();
    });

    // Set initial button text and icons based on the dark mode state
    var buttonText = darkMode ? '<input type="checkbox" class="checkbox" id="checkbox"><label for="checkbox" class="checkbox-label"><i class="fas fa-moon"></i><i class="fas fa-sun"></i><span class="ball"></span> </label>' : '<input type="checkbox" checked class="checkbox" id="checkbox"><label for="checkbox" class="checkbox-label"><i class="fas fa-moon"></i><i class="fas fa-sun"></i><span class="ball"></span></label>';
    $('#changeColorButton').html(buttonText);

    // Set initial page styles based on the dark mode state
    $('body').toggleClass('dark-mode', darkMode);
});
