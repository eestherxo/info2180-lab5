document.addEventListener('DOMContentLoaded', function() {
    // Get references to DOM elements
    const countriesButton = document.getElementById("lookup-countries");
    const citiesButton = document.getElementById("lookup-cities");
    const input = document.getElementById("country");
    const resultDiv = document.getElementById("result");

    // Lookup Countries button
    countriesButton.addEventListener("click", function() {
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

    // Lookup Cities button
    citiesButton.addEventListener("click", function() {
        const country = input.value.trim();

        const url = country 
            ? `world.php?country=${encodeURIComponent(country)}&lookup=cities`
            : "world.php?lookup=cities";

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
