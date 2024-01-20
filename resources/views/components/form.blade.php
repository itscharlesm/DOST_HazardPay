<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
     $(document).ready(function() {
            var currentSection = 1;
            var totalSections = 2;

            // Show the current section and hide the rest
            function showSection(section) {
                $('.section').hide();
                $('.section-' + section).show();
            }

            // Show or hide the Next and Previous buttons based on the current section
            function updateButtons() {
                $('#prevBtn').toggle(currentSection > 1);
                $('#nextBtn').toggle(currentSection < totalSections);
                $('#saveBtn').toggle(currentSection === totalSections);
            }

            // Next button click event handler
            $('#nextBtn').click(function() {
                if (currentSection < totalSections) {
                    currentSection++;
                    showSection(currentSection);
                    updateButtons();
                }
            });

            // Previous button click event handler
            $('#prevBtn').click(function() {
                if (currentSection > 1) {
                    currentSection--;
                    showSection(currentSection);
                    updateButtons();
                }
            });

            // Save button click event handler
            $('#saveBtn').click(function() {
                // Implement your save functionality here
                // This event handler will only be triggered when the second section is active
            });

            // Show the initial section
            showSection(currentSection);
            updateButtons();
        });
</script>