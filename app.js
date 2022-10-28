let supprimer = document.querySelectorAll(".supprimer");
let oui = document.querySelector(".oui");
let non = document.querySelector(".non");




supprimer.forEach((supp)=>{
    supp.addEventListener("click", (e)=>{
        
        var user = supp.previousElementSibling.value;
        let userAlert = document.querySelector(".userAlert");
        userAlert.innerHTML = user + " ?";
        let alert = document.querySelector(".alert");
        alert.classList.add("active")
        

        oui.addEventListener("click", ()=>{
            window.location.href="DeleteUser.php?supprimer=" + user;
        })
        non.addEventListener("click", ()=>{
            window.location.href="dashboard.php";
            
        })
        
        
    })

})






