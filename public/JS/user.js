function showInfo(x) {
    if ($(x).hasClass("dp-none")) {
        var element = document.getElementById(x);
        element.classList.toggle("dp-flex");
        element.classList.remove("dp-none");
        var element = document.getElementById("footer");
        element.classList.toggle("footer-absolute");
    } else {
        var element = document.getElementById(x);
        element.classList.toggle("dp-none");
        element.classList.remove("dp-flex");
        var element = document.getElementById("footer");
        element.classList.remove("footer-absolute");
    }
}
