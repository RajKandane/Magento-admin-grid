// tab-script.js

require(['jquery'], function($) {
    $(document).ready(function() {
        // Add event listener to tab buttons
        $('.tab-button').click(function() {
            // Hide all tab contents
            $('.tab-content').removeClass('active');
            // Deactivate all tab buttons
            $('.tab-button').removeClass('active');
            // Get the clicked tab ID
            var tabId = $(this).data('tab-id');
            // Show the corresponding tab content
            $('#tab-content-' + tabId).addClass('active');
            // Activate the clicked tab button
            $(this).addClass('active');
        });
    });
});
