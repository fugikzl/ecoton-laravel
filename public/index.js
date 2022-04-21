const close = (elem) =>
{
    if (elem.getAttribute("aria-expanded") == "true")
    {
    
        elem.setAttribute("aria-expanded","false");
        elem.classList.remove("btn-success");

        elem.nextElementSibling.classList.remove("show");

    }
    else{
        elem.setAttribute("aria-expanded","true");
        elem.nextElementSibling.classList.add("show");
        elem.classList.add("btn-success");

    }
}

const abc = document.getElementsByClassName("ColMan");

Array.from(abc).forEach(function(button,index)
{
    button.addEventListener("click",function(){close(button)}); 
});


