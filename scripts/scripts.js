document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggle-background");
    const body = document.body;

    // Retrieve dark mode status from localStorage
    const isDarkMode = localStorage.getItem("dark-mode") === "true";

    // Apply the saved theme on page load
    if (isDarkMode) {
        body.classList.add("dark-theme");
    }

    // Add click event listener to toggle theme
    toggleButton.addEventListener("click", () => {
        // Toggle the 'dark-theme' class
        body.classList.toggle("dark-theme");

        // Store the current theme in localStorage
        const isDark = body.classList.contains("dark-theme");
        localStorage.setItem("dark-mode", isDark);
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const detailsButtons = document.querySelectorAll(".details-btn");
    const hideButtons = document.querySelectorAll(".hide-btn");

    // Show details
    detailsButtons.forEach(button => {
        button.addEventListener("click", () => {
            const detailsId = button.getAttribute("data-details-id");
            const detailsRow = document.getElementById(detailsId);
            if (detailsRow) {
                detailsRow.style.display = "table-row";
            }
        });
    });

    // Hide details
    hideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const hideId = button.getAttribute("data-hide-id");
            const detailsRow = document.getElementById(hideId);
            if (detailsRow) {
                detailsRow.style.display = "none";
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const changeTextStyleButton = document.getElementById("change-text-style");
    const resetTextStyleButton = document.getElementById("reset-text-style");

    // Check the stored preference and apply it on page load (but default is unchanged)
    if (localStorage.getItem("textStyleChanged") === "true") {
        document.body.classList.add("text-style-changed");
    }

    // Change text style functionality
    changeTextStyleButton.addEventListener("click", () => {
        document.body.classList.add("text-style-changed");
        localStorage.setItem("textStyleChanged", "true"); // Store the state
    });

    // Reset text style functionality
    resetTextStyleButton.addEventListener("click", () => {
        document.body.classList.remove("text-style-changed");
        localStorage.setItem("textStyleChanged", "false"); // Store the reset state
    });
});

function openForm() {
    window.location.href = 'addService.html';
}

function AddItem() {
    // Get form values
    const serviceName = document.getElementById("serviceName").value;
    const price = document.getElementById("price").value;
    const deliveryTime = document.getElementById("deliveryTime").value;
    const mealDescription = document.getElementById("mealDescription").value;
    const nutritionalInfo = document.getElementById("nutritionalInfo").value;

    // Generate a unique ID for the details row (e.g., details-1, details-2)
    const detailsId = 'details-' + (Date.now());

    // Store form data in an object
    const itemData = { serviceName, price, deliveryTime, mealDescription, nutritionalInfo, detailsId };

    // Store in localStorage (retrieve existing or create new array)
    const existingData = JSON.parse(localStorage.getItem("services")) || [];
    existingData.push(itemData);
    localStorage.setItem("services", JSON.stringify(existingData));

    // Navigate back to services.html
    window.location.href = "services.html";
}

document.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.getElementById("serviceTableBody");

    // Load existing data from localStorage
    const services = JSON.parse(localStorage.getItem("services")) || [];

    // Append each service as a new row
    services.forEach(service => addServiceRow(tableBody, service));
});

function addServiceRow(tableBody, service) {
    // Main service row (Row 5)
    const newRow = document.createElement("tr");

    // Service Name cell (e.g., "Luxury Seafood Feast")
    const serviceNameCell = document.createElement("td");
    serviceNameCell.textContent = service.serviceName;
    newRow.appendChild(serviceNameCell);

    // Price cell (e.g., "2000")
    const priceCell = document.createElement("td");
    priceCell.textContent = service.price;
    newRow.appendChild(priceCell);

    // Actions cell with "Show Details" and "Hide Details" buttons
    const actionsCell = document.createElement("td");
    
    // Show Details button
    const showDetailsButton = document.createElement("button");
    showDetailsButton.classList.add("details-btn");
    showDetailsButton.setAttribute("data-details-id", service.detailsId);
    showDetailsButton.textContent = "Show Details";
    
    // Hide Details button
    const hideDetailsButton = document.createElement("button");
    hideDetailsButton.classList.add("hide-btn");
    hideDetailsButton.setAttribute("data-hide-id", service.detailsId);
    hideDetailsButton.textContent = "Hide Details";

    actionsCell.appendChild(showDetailsButton);
    actionsCell.appendChild(hideDetailsButton);
    newRow.appendChild(actionsCell);

    // Add the main row to the table body
    tableBody.appendChild(newRow);

    // Details row (hidden by default)
    const detailsRow = document.createElement("tr");
    detailsRow.classList.add("details-row");
    detailsRow.id = service.detailsId;

    // Details cell (colspan="3")
    const detailsCell = document.createElement("td");
    detailsCell.colSpan = 3;

    // Details content (Delivery Time, Meal, Nutritional Info)
    const detailsContent = document.createElement("div");
    detailsContent.classList.add("details-content");
    detailsContent.innerHTML = `
        <strong>Delivery Time:</strong> ${service.deliveryTime} <br>
        <strong>Meal:</strong> ${service.mealDescription} <br>
        <strong>Nutritional Info:</strong> ${service.nutritionalInfo}
    `;

    detailsCell.appendChild(detailsContent);
    detailsRow.appendChild(detailsCell);

    // Add the details row to the table body
    tableBody.appendChild(detailsRow);

    // Add event listeners for show and hide buttons
    showDetailsButton.addEventListener("click", function () {
        detailsRow.style.display = "table-row"; // Show details row
        showDetailsButton.style.display = "none"; // Hide "Show Details" button
        hideDetailsButton.style.display = "inline"; // Show "Hide Details" button
    });

    hideDetailsButton.addEventListener("click", function () {
        detailsRow.style.display = "none"; // Hide details row
        showDetailsButton.style.display = "inline"; // Show "Show Details" button
        hideDetailsButton.style.display = "none"; // Hide "Hide Details" button
    });
}


function removeLastItem() {
    const tableBody = document.getElementById("serviceTableBody");

    // Remove the last pair of rows (main row + details row)
    const rows = tableBody.querySelectorAll("tr"); // Get all rows

    if (rows.length > 0) {
        // Remove the last two rows (main row and details row)
        const lastRow = rows[rows.length - 1];
        const previousRow = rows[rows.length - 2];

        // Remove both the last row and its associated details row
        tableBody.removeChild(lastRow);
        tableBody.removeChild(previousRow);

        // Update localStorage by removing the last service item
        const services = JSON.parse(localStorage.getItem("services")) || [];
        services.pop(); // Remove the last service item
        localStorage.setItem("services", JSON.stringify(services)); // Update localStorage
    } else {
        alert("No items left to remove.");
    }
}