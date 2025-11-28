document.addEventListener('DOMContentLoaded', function() {
    // Get references to DOM elements
    const button = document.getElementById("lookup");
    const input = document.getElementById("country");
    const resultDiv = document.getElementById("result");

    button.addEventListener("click", function() {
        const country = input.value.trim();

        const url = country ? `world.php?country=${encodeURIComponent(country)}` : "world.php";

        fetch(url)
            .then(response => response.text())
            .then(data => {
                resultDiv.innerHTML = data;
            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });
    });
});
