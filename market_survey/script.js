function updateOptions() {
    var equipmentType = document.getElementById("equipment_type_id").value;
    var subCategoryOptions = document.getElementById("sub_cat_id");
    var descriptionOptions = document.getElementById("description_id");
    var brandOptions = document.getElementById("brand_id");

    // Clear existing options
    subCategoryOptions.innerHTML = "";
    descriptionOptions.innerHTML = "";
    brandOptions.innerHTML = "";

    // Populate options based on selected equipment type
    switch (equipmentType) {
        case "1": // Computers
            addOption(subCategoryOptions, "Desktop", 1);
            addOption(subCategoryOptions, "Laptop", 2);
            addOption(subCategoryOptions, "Server", 3);

            addOption(descriptionOptions, "Admin", 1);
            addOption(descriptionOptions, "eNGAS or eBUDGET", 2);
            addOption(descriptionOptions, "Administrative Use", 3);
            addOption(descriptionOptions, "Application Use", 4);
            addOption(descriptionOptions, "Specialized Software Applications Use", 5);

            addOption(brandOptions, "ACER", 5);
            addOption(brandOptions, "ASUS", 2);
            addOption(brandOptions, "DELL", 3);
            addOption(brandOptions, "HP", 1);
            addOption(brandOptions, "LENOVO", 4);
            break;

        case "2": // Multifunction Inkjet
        case "3": // Multifunction Laser
            addOption(subCategoryOptions, "Printer", 4);
            addOption(subCategoryOptions, "Plotter", 5);

            addOption(descriptionOptions, "Color (36in)", 6);
            addOption(descriptionOptions, "A3", 7);
            addOption(descriptionOptions, "A3 Leased", 8);
            addOption(descriptionOptions, "A4 Leased", 9);
            addOption(descriptionOptions, "A4", 10);
            addOption(descriptionOptions, "Large Format (24in)", 11);
            addOption(descriptionOptions, "Color (42-44in)", 12);
            addOption(descriptionOptions, "Color (A3)", 14);
            addOption(descriptionOptions, "Color (A4)", 15);
            addOption(descriptionOptions, "Monochrome (A3)", 16);
            addOption(descriptionOptions, "Monochrome (A4)", 17);

            addOption(brandOptions, "BROTHER", 10);
            addOption(brandOptions, "CANON", 8);
            addOption(brandOptions, "DEVELOP", 7);
            addOption(brandOptions, "EPSON", 9);
            addOption(brandOptions, "FUJIXEROX", 6);

            break;

        case "4": // Network Equipment
            addOption(subCategoryOptions, "Firewall", 6);
            addOption(subCategoryOptions, "Router", 7);
            addOption(subCategoryOptions, "Network Switch", 8);

            addOption(descriptionOptions, "No Description", 27);
            addOption(descriptionOptions, "Layer 2 (48 POE Ports, Managed)", 18);
            addOption(descriptionOptions, "Layer 3 (48 POE Ports, Managed)", 19);

            addOption(brandOptions, "ALCATEL", 17);
            addOption(brandOptions, "AVAYA", 11);
            addOption(brandOptions, "EXTREME", 16);
            addOption(brandOptions, "SOPHOS", 14);
            addOption(brandOptions, "UBIQUITI", 15);

            break;

        case "5": // Other ICT Equipment
            addOption(subCategoryOptions, "Biometrics", 9);
            addOption(subCategoryOptions, "Document Scanner", 10);
            addOption(subCategoryOptions, "Indoor LED Video Wall", 11);
            addOption(subCategoryOptions, "Interactive Kiosk", 12);
            addOption(subCategoryOptions, "Interactive Touch Screen", 13);
            addOption(subCategoryOptions, "IP Phone", 14);
            addOption(subCategoryOptions, "Projector", 15);
            addOption(subCategoryOptions, "Smartphone", 16);

            addOption(descriptionOptions, "No Description", 27);
            addOption(descriptionOptions, "Conference Rooms", 20);
            addOption(descriptionOptions, "Wide Format (42in)", 21);

            break;

        case "6": // Uninterruptible Power Supply
            addOption(subCategoryOptions, "UPS", 17);

            addOption(descriptionOptions, "650VA", 22);
            addOption(descriptionOptions, "1500VA", 23);
            addOption(descriptionOptions, "2000VA", 24);
            addOption(descriptionOptions, "3000VA", 25);

            addOption(brandOptions, "APC", 19);
            addOption(brandOptions, "EATON", 20);
            addOption(brandOptions, "VERTIV LIEBERT", 18);
            break;



    }
}

function addOption(selectElement, optionText, value) {
    var option = document.createElement("option");
    option.text = optionText;
    option.value = value;
    selectElement.add(option);
}

// Call updateOptions() when the page loads
window.onload = updateOptions;