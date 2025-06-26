document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const images = document.querySelectorAll(".carousel img");
    const total = images.length;
    const indicatorsContainer = document.querySelector(".indicators");

 
    images.forEach((_, i) => {
        const dot = document.createElement("span");
        dot.classList.add("dot");
        if (i === 0) dot.classList.add("active");
        dot.addEventListener("click", () => {
            index = i;
            showImage(index);
        });
        indicatorsContainer.appendChild(dot);
    });

    function showImage(i) {
        images.forEach(img => img.classList.remove("active"));
        images[i].classList.add("active");

        document.querySelectorAll(".dot").forEach(dot => dot.classList.remove("active"));
        document.querySelectorAll(".dot")[i].classList.add("active");
    }

    document.querySelector(".prev").addEventListener("click", function () {
        index = (index === 0) ? total - 1 : index - 1;
        showImage(index);
    });

    document.querySelector(".next").addEventListener("click", function () {
        index = (index === total - 1) ? 0 : index + 1;
        showImage(index);
    });

    
    setInterval(function () {
        index = (index === total - 1) ? 0 : index + 1;
        showImage(index);
    }, 3000);
});
