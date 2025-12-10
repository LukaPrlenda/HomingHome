const UserService = {
    init: function() {
        const token = localStorage.getItem("user_token");
        if(token && token !== undefined) {
            window.location.hash = "page_Main";
        }

        $("form_login").validate({
            submitHandler: function(form) {
                let entity = Object.fromEntries(new FormData(form).entries());
                UserService.login(entity);
            },
        });
    },

    login: function(entity) {
        RestClient.post(
            "auth/login",
            entity,
            data => {
                console.log(data);
                localStorage.setItem("user_token", data.data.token);
                UserService.generateMenuItems();
                window.location.hash = "page_Main";

                document.getElementById("form_login").reset();

                msg = `<p>Success!</p>
                        <p>` + data.message + `</p>
                        <p>You successfully logged In!</p>
                        <p>Welcom ` + data.data.username + `!</p>`

                $("#notification_green").html(msg);

                document.getElementById("notification_green").style.display="block";
                setTimeout(function(){document.getElementById("notification_green").style.display="none";}, 2500);
            },
            error => {
                msg = `<p>Error!</p>
                    <p>` + error.responseText + `</p>`

                $("#notification_red").html(msg);

                console.log("Error while submitting form: ",error);

                document.getElementById("notification_red").style.display="block";
                setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
            }
        );
    },

    logout: function() {
        localStorage.clear();
        UserService.generateMenuItems();
        window.location.hash = "page_Login";
    },

    register: function(entity) {
        RestClient.post(
            `auth/signup`,
            entity,
            callback => {
                document.getElementById("form").reset();

                msg = `<p>Success!</p>
                        <p>` + callback.message + `</p>
                        <p>You successfully made an account!</p>`

                $("#notification_green").html(msg);

                console.log("Form successfully submitted!");
                window.location.hash="page_Login"

                document.getElementById("notification_green").style.display="block";
                setTimeout(function(){document.getElementById("notification_green").style.display="none";}, 2500);
             },
            error => {
            msg = `<p>Error!</p>
                    <p>` + error.responseText + `</p>`

            $("#notification_red").html(msg);

            console.log("Error while submitting form: ",error);

            document.getElementById("notification_red").style.display="block";
            setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
            }
        );

    },

    generateMenuItems: function() {
        const token = localStorage.getItem("user_token");
        const parsedToken = Utils.parseJwt(token);
        let user;

        if(parsedToken != null){
            user = parsedToken.user;
        }

        let nav = "";
        let main = "";
        if(user && user.role) {
            switch(user.role) {
                case Constants.USER_ROLE:
                    nav = `
                    <li><a href="#page_Main">Home</a></li>
                    <li><a href="#page_Properties">Properties</a></li>
                    <li><a href="#page_Contact">Contact Us</a></li>
                    <li><a href="#page_My-account">My Account</a></li>
                    <li><a href="#page_Property-details"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                    `;

                    main = `
                        <section id="page_Main" data-load="main.html">
                            <h1>page_Main</h1>
                        </section>
                        <section id="page_Contact" data-load="contact.html">
                            <h1>page_Contact</h1>
                        </section>
                        <section id="page_Properties" data-load="properties.html">
                            <h1>page_Properties</h1>
                        </section>
                        <section id="page_Property-details" data-load="property-details.html">
                            <h1>page_Property-details</h1>
                        </section>
                        <section id="page_My-account" data-load="my-account.html">
                            <h1>page_My-account</h1>
                        </section>
                    `;

                    break;

                case Constants.ADMIN_ROLE:
                    nav = `
                    <li><a href="#page_Main">Home</a></li>
                    <li><a href="#page_Properties">Properties</a></li>
                    <li><a href="#page_Contact">Contact Us</a></li>
                    <li><a href="#page_Admin">Admin</a></li>
                    <li><a href="#page_Property-details"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                    `;

                    main = `
                        <section id="page_Main" data-load="main.html">
                            <h1>page_Main</h1>
                        </section>
                        <section id="page_Contact" data-load="contact.html">
                            <h1>page_Contact</h1>
                        </section>
                        <section id="page_Properties" data-load="properties.html">
                            <h1>page_Properties</h1>
                        </section>
                        <section id="page_Property-details" data-load="property-details.html">
                            <h1>page_Property-details</h1>
                        </section>
                        <section id="page_Admin" data-load="admin.html">
                            <h1>page_Admin</h1>
                        </section>
                    `;

                    break;

                default:
                    nav = `
                    <li><a href="#page_Main">Home</a></li>
                    <li><a href="#page_Properties">Properties</a></li>
                    <li><a href="#page_Contact">Contact Us</a></li>
                    <li><a href="#page_Signup">Signup</a></li>
                    <li><a href="#page_Login">Login</a></li>
                    <li><a href="#page_Property-details"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                    `;

                    main = `
                        <section id="page_Main" data-load="main.html">
                            <h1>page_Main</h1>
                        </section>
                        <section id="page_Contact" data-load="contact.html">
                            <h1>page_Contact</h1>
                        </section>
                        <section id="page_Properties" data-load="properties.html">
                            <h1>page_Properties</h1>
                        </section>
                        <section id="page_Property-details" data-load="property-details.html">
                            <h1>page_Property-details</h1>
                        </section>
                        <section id="page_Signup" data-load="signup.html">
                            <h1>page_Signup</h1>
                        </section>
                        <section id="page_Login" data-load="login.html">
                            <h1>page_Login</h1>
                        </section>
                    `;

                    break;
            }
        }
        else{
            //window.location.hash = "page_Login";

            nav = `
                <li><a href="#page_Main">Home</a></li>
                <li><a href="#page_Properties">Properties</a></li>
                <li><a href="#page_Contact">Contact Us</a></li>
                <li><a href="#page_Signup">Signup</a></li>
                <li><a href="#page_Login">Login</a></li>
                <li><a href="#page_Property-details"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                `;

            main = `
                <section id="page_Main" data-load="main.html">
                    <h1>page_Main</h1>
                </section>
                <section id="page_Contact" data-load="contact.html">
                    <h1>page_Contact</h1>
                </section>
                <section id="page_Properties" data-load="properties.html">
                    <h1>page_Properties</h1>
                </section>
                <section id="page_Property-details" data-load="property-details.html">
                    <h1>page_Property-details</h1>
                </section>
                <section id="page_Signup" data-load="signup.html">
                    <h1>page_Signup</h1>
                </section>
                <section id="page_Login" data-load="login.html">
                    <h1>page_Login</h1>
                </section>
            `;
        }

        $("#hh_nav").html(nav);
        $("#spapp").html(main);

        app.run();

        window.location.hash = "page_Main";
    }
}