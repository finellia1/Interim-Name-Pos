const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if(entry.inIntersecting){
            document.querySelectorAll(".col")[0].classList.add("fadeInTop");
            document.querySelectorAll(".col")[1].classList.add("fadeInTop");
            document.querySelectorAll(".col")[2].classList.add("fadeInTop");
        }
    })
})

observer.observe(document.querySelector(".columns") )