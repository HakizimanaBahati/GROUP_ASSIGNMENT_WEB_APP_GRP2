function showOrderMessage(event) {
    event.preventDefault();

    var nameField = document.getElementById("customerName");
    var foodField = document.getElementById("foodItem");
    var resultBox = document.getElementById("successMessage");

    if (!nameField || !foodField || !resultBox) {
        return false;
    }

    resultBox.style.display = "block";
    resultBox.innerHTML = "Thank you, " + nameField.value + ". Your order for " + foodField.value + " has been received.";
    event.target.reset();
    return false;
}

function setSelectedFoodFromLink() {
    var params = new URLSearchParams(window.location.search);
    var selectedItem = params.get("item");
    var foodField = document.getElementById("foodItem");

    if (selectedItem && foodField) {
        foodField.value = selectedItem;
    }
}

window.onload = setSelectedFoodFromLink;
