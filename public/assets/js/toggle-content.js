function toggleContent(id) {
    let dots = document.getElementById("dots-" + id);
    let moreText = document.getElementById("more-" + id);
    let button = document.getElementById("toggle-btn-" + id);

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        moreText.style.display = "none";
        button.innerText = "Xem thêm";
    } else {
        dots.style.display = "none";
        moreText.style.display = "inline";
        button.innerText = "Thu gọn";
    }
}
