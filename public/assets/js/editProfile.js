function openPopupProfile() {
    let profilePopup = document.getElementById("edit-profile");
    let photoPopUp = document.getElementById("edit-photo");
    if (photoPopUp.classList.contains("open-popup-photo")) {
        photoPopUp.classList.remove("open-popup-photo");
    }
    profilePopup.classList.add("open-popup-profile");
}

function closePopupProfile() {
    let profilePopup = document.getElementById("edit-profile");
    profilePopup.classList.remove("open-popup-profile");
}

window.onclick = function (event) {
    let profilePopup = document.getElementById("edit-profile");
    if (event.target.matches(".photo-edit-option")){
        if (profilePopup.classList.contains("open-popup-profile")) {
            profilePopup.classList.remove("open-popup-profile");
        }
      }
};