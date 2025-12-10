function start_signup_js(){
    document.getElementById("form").addEventListener("submit", function(event){password_repeat(event);});

    function password_repeat(event){
        event.preventDefault();
        if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        let password=document.getElementById("password").value;
        let password_repeat=document.getElementById("passwordcheck").value;
        if(password!=password_repeat){
            window.alert("The passwords do not match!");
        }
        if(password===password_repeat){
            form_submittion();
        }
    }

    document.getElementById("password").addEventListener("input", function(){password_strength_check();});
    function password_strength_check(){
        const text1=document.getElementById("password_strenght");
        let password=document.getElementById("password").value;

        if(password.length < 5){
            text1.innerHTML="Not strong enough!";
            text1.style.color="darkred";
            text1.style.width="27%";
            text1.style.backgroundColor="crimson";
        }
        else if(password.length < 7){
            text1.innerHTML="Weak";
            text1.style.color="crimson";
            text1.style.width="35%";
            text1.style.backgroundColor="rgb(237, 112, 112)";
        }
        else if(password.length < 13){
            text1.innerHTML="Good!";
            text1.style.color="orange";
            text1.style.width="60%";
            text1.style.backgroundColor="gold";
        }
        else if(password.length < 20){
            text1.innerHTML="Amazing!";
            text1.style.color="green";
            text1.style.width="100%";
            text1.style.backgroundColor="limegreen";
        }
    }



    function form_submittion() {
        const form = document.getElementById("form");
        const data = Object.fromEntries(new FormData(form));
        delete data.passwordcheck;
        data.is_agent = (data.is_agent == "1") ? 1 : 0;

        UserService.register(data);
    }

        /*
        let stat=0
        try{
            const response=await fetch ("https://jsonplaceholder.typicode.com/posts", {
                method: "POST",
                body: data,
            });
            const user_data=data.get("Username");
            const response2=await fetch("./assets/json/YCwebsite_User_Info.json");
            const data_json=await response2.json();

            for(let i in data_json){
                if(user_data==data_json[i].username){
                    if(response.ok){
                        console.log("Form successfully submitted!");
                        console.log("Error: User already exists!");
                        document.getElementById("exists_red").style.display="block";
                        setTimeout(()=>{document.getElementById("exists_red").style.display="none";}, 3000);
                        stat=1;
                    }
                }
            }


            if(response.ok && stat==0){
                document.getElementById("notification_green").style.display="block";
                console.log("Form successfully submitted!");
                setTimeout(function(){document.getElementById("notification_green").style.display="none";}, 2500);
                localStorage.setItem("username", user_data);
                localStorage.setItem("login_status", "1");
                window.location.href="#page_Main";
            }
        }
        catch(error){
            document.getElementById("notification_red").style.display="block";
            console.log("Error while submitting form: ",error);
            setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
        }
            */
}