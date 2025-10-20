const navigationMenu = (view) =>{
const elements = document.querySelectorAll("#hh_nav a");

elements.forEach(i => {
    const id = i.getAttribute("href");

    if(id == view){
        i.classList.add("active");
    }
    else{
        i.classList.remove("active");
    }
})

}