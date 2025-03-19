document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        const email = document.getElementById("eastcoastpaid@gmail.com").value;
        const password = document.getElementById("tosteko13").value;

        if (!email || !password) {
            event.preventDefault(); // Prevent form submission if fields are empty
            alert("Please enter both email and password.");
        }
    });
});
