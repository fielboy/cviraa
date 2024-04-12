function updateDateTime() {
    let dateTimeElement = document.getElementById("current-time");
    let now = new Date();
    let options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
        hour: 'numeric', 
        minute: 'numeric', 
        second: 'numeric', 
        hour12: true 
    };
    let formattedDateTime = new Intl.DateTimeFormat('en-US', options).format(now);
    dateTimeElement.textContent = formattedDateTime;
    requestAnimationFrame(updateDateTime);
}

updateDateTime(); // Initial call to start the update loop