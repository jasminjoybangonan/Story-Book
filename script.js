const pages = document.querySelectorAll(".page");
let current = 0;

function showPage(index) {
    pages.forEach((p, i) => {
        p.style.display = i === index ? "block" : "none";
    });
}

document.getElementById("prevBtn").addEventListener("click", () => {
    if (current > 0) current--;
    showPage(current);
});

document.getElementById("nextBtn").addEventListener("click", () => {
    if (current < pages.length - 1) current++;
    showPage(current);
});

showPage(0); // show first page initially
