
var viTri = 0;
var slides = document.getElementsByClassName("slide");
var dots = document.getElementsByClassName("dot");
var timer;

function hienHinh(n) {
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        dots[i].className = "dot";
    }
    viTri = n;
    slides[viTri].style.display = "block";
    dots[viTri].className = "dot active";
}

function hinhKeTiep() {
    hienHinh((viTri + 1) % slides.length);
}

for (var i = 0; i < dots.length; i++) {
    (function (n) {
        dots[n].onclick = function () {
            hienHinh(n);
            clearInterval(timer);
            timer = setInterval(hinhKeTiep, 3000);
        };
    })(i);
}

timer = setInterval(hinhKeTiep, 3000);
