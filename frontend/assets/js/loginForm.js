function start_login_js(){
    document.getElementById("submit_btn_login").addEventListener("click", function(event){form_submittion(event);});
    
    function form_submittion() {
        const form = document.getElementById("form_login");
        const data = Object.fromEntries(new FormData(form));

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            

        UserService.login(data);
    }
}