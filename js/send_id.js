window.addEventListener('load', function() {
    var addButtons = document.querySelectorAll("[id^='add-btn']");
    
    addButtons.forEach(function(btn) {
        var tripId = btn.dataset.tripId;
        
        checkRegistration(btn, tripId);
        
        btn.addEventListener('click', function() {
            addOrRemoveTrip(btn, tripId);
        });
    });
});

function checkRegistration(btn, tripId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'php/db/check_trip.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            if (this.responseText == "registered") {
                btn.textContent = "Atcelt";
            } else {
                btn.textContent = "+ Pievienot";
            }
        }
    }
    xhr.send("tripId=" + tripId); 
}

function addOrRemoveTrip(btn, tripId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'php/db/add_trip.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log(this.responseText);
            if (this.responseText.trim() == "not_logged_in") {
                window.location.href = "php/login.php";  
            } else {
                alert(this.responseText);
            }
            checkRegistration(btn, tripId); 
        }
    }
    console.log("Sending tripId: " + tripId);
    xhr.send("tripId=" + tripId); 
}