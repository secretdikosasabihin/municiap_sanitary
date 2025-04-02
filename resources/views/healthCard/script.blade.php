<script>
document.addEventListener("DOMContentLoaded", function () {
    // Get all tab buttons and tab contents
    const tabButtons = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tabs-contents");

    // Retrieve the last active tab from localStorage (if any)
    let activeTab = localStorage.getItem("activeTab");

    if (activeTab) {
        // Remove active class from all tabs first
        tabButtons.forEach(btn => btn.classList.remove("active"));
        tabContents.forEach(content => content.classList.remove("active"));

        // Set the previously active tab
        document.querySelector(`[data-tab="${activeTab}"]`).classList.add("active");
        document.getElementById(`${activeTab}-tab`).classList.add("active");
    }

    // Add event listener for tab buttons
    tabButtons.forEach(button => {
        button.addEventListener("click", function () {
            let tabId = this.getAttribute("data-tab");

            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => btn.classList.remove("active"));
            tabContents.forEach(content => content.classList.remove("active"));

            // Add active class to the clicked tab
            this.classList.add("active");
            document.getElementById(`${tabId}-tab`).classList.add("active");

            // Save the selected tab in localStorage
            localStorage.setItem("activeTab", tabId);
        });
    });
});
</script>



<script>
    document.querySelectorAll('.renewal-year-option').forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        let selectedYear = this.getAttribute('data-year');

        // Update dropdown button text
        document.getElementById('renewalYearDropdown').textContent = selectedYear;

        // Redirect to filter results
        window.location.href = `{{ url('/dashboard') }}?renewal_year=${selectedYear}`;
    });
});


</script>

<script>
    // Auto-hide session alert after 3 seconds (3000ms)
    setTimeout(function() {
        let alertBox = document.getElementById('session-alert');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500); // Remove after fade out
        }
    }, 3000);
</script>


