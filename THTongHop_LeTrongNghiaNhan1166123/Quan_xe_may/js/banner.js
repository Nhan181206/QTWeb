// Banner hình động: tự động chuyển từ hình này sang hình khác
var dsHinh = ["images/banner1.svg", "images/banner2.svg", "images/banner3.svg"];
var viTri = 0;

function doiHinh() {
    viTri = viTri + 1;
    if (viTri >= dsHinh.length) {
        viTri = 0;
    }
    document.getElementById("banner").src = dsHinh[viTri];
}

function chayBanner() {
    setInterval(doiHinh, 2000); // 2 giây đổi hình một lần
}
