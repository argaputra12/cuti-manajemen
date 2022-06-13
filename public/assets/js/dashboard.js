function openNav() {
  const tes = document.getElementById("checkbox-toggle");
  console.log(tes.checked);
  if (tes.checked == true) {
    document.getElementsByClassName("r-ctn-wdth")[0].style.marginLeft = "10px";
  } else {
    document.getElementsByClassName("r-ctn-wdth")[0].style.marginLeft = "10px";
  }
}
function profileDropdwn() {
  document.getElementById("profDropdown").classList.toggle("show");
  console.log("clicked");
}
window.onclick = function (event) {
  if (!event.target.matches(".top-right-navbar")) {
    var dropdowns = document.getElementsByClassName("prof-dropdown");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};
