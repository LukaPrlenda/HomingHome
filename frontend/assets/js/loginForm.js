function start_login_js(){
    console.log("it is started login 2");

    document.getElementById("form_login").addEventListener("submit", function(event){form_submittion(event);});
    


    function form_submittion() {
        const form=document.getElementById("form");
        const data=new FormData(form);

        UserSer
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