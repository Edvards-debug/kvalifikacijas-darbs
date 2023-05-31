function setupModal(modalId, btnId, moreId, myBtnId) {
    var modal = document.getElementById(modalId);
    var btn = document.getElementById(btnId);
    var span = modal.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    var moreText = document.getElementById(moreId);
    var btnText = document.getElementById(myBtnId);

    function toggleText() {
        if (moreText.style.display === "none") {
            moreText.style.display = "inline";
            btnText.innerHTML = "Lasīt mazāk";
        } else {
            moreText.style.display = "none";
            btnText.innerHTML = "Lasīt vairāk";
        }
    }

    btnText.onclick = toggleText;
}

setupModal("myModal1", "trip-window1", "more1", "myBtn1");
setupModal("myModal2", "trip-window2", "more2", "myBtn2");
setupModal("myModal3", "trip-window3", "more3", "myBtn3");
setupModal("myModal4", "trip-window4", "more4", "myBtn4");
setupModal("myModal5", "trip-window5", "more5", "myBtn5");
setupModal("myModal6", "trip-window6", "more6", "myBtn6");
