function setBlue() {
    document.getElementById("colorText").innerText = "Blue";
    document.body.style.backgroundColor = "blue";
}

function setRed() {
    document.getElementById("colorText").innerText = "Red";
    document.body.style.backgroundColor = "red";
}

function showDate() {
    const today = new Date();
    const dateStr = today.toLocaleDateString('fi-FI');
    document.getElementById("dateText").innerText = "The date is: " + dateStr;
}