
const eventName1 = document.getElementById("eventName1");
const eventName2 = document.getElementById("eventName2");
eventName2.addEventListener("keydown", (event) => {
    if (eventName1.value && eventName2.value && event.keyCode === 13) {
        window.location.href = "main_page.php";
    }
})