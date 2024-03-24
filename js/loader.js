
function loader() {
    const loader = document.querySelector(".loader");
    
    loader.classList.add("loader-hidden");
    
    loader.addEventListener("transitionend", () => {
    document.body.removeChild("loader");
    })
}