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
            JSON.stringify(entity),
            data => {
                console.log(data);
                localStorage.setItem("user_token", data.data.token);
                window.location.hash = "page_Main";
            },
            error => {
            }
        );
    },

    logout: function() {
        localStorage.clear();
        window.location.hash = "page_Login";
    },

    generateMenuItems: function() {
        const token = localStorage.getItem("user_token");
        const user = Utils.parseJwt(token).user;

        if(user && user.role) {
            let nav = "";
            let main = "";

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

            $("#hh_nav").html(nav);
            $("#spapp").html(main);

        }
        else{
            window.location.hash = "page_Login"; 
        }
    }
}