function openPopupPhoto() {
  let photoPopUp = document.getElementById("edit-photo");
  let profilePopup = document.getElementById("edit-profile");
  if (profilePopup.classList.contains("open-popup-profile")) {
    profilePopup.classList.remove("open-popup-profile");
}
  photoPopUp.classList.add("open-popup-photo");

}

function closePopupPhoto() {
  let photoPopUp = document.getElementById("edit-photo");
  photoPopUp.classList.remove("open-popup-photo");
}
window.onclick = function (event) {
  let photoPopUp = document.getElementById("edit-photo");
  if (event.target.matches(".profile-edit-option")){
      if (photoPopUp.classList.contains("open-popup-photo")) {
          photoPopUp.classList.remove("open-popup-photo");
      }
    }
};
