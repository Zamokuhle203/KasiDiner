var header = document.querySelector(".navbar");
var menu = header.getElementsByTagName("a");

for (var i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", function () {
        var current = header.getElementsByClassName("active");
        if (current.length > 0) {
            current[0].classList.remove("active");
        }
        this.classList.add("active");
    });
}
