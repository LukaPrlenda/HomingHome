const ListingsService = {
    schedulingIntrest: function(propertyId) {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        if(tokenData == null){
            msg = `<p>Error!</p>
                    <p>To send the interest to the property owner, you must be logged in.</p>`

            $("#notification_red").html(msg);

            console.log("To send the interest to the property owner, you must be logged in.");

            document.getElementById("notification_red").style.display="block";
            setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
            return;
        }

        const userId = tokenData.user.id;

        

        const form = document.getElementById("interest-contact-form");
        const data = Object.fromEntries(new FormData(form));

        RestClient.post(
            "interest",
            {
                property_id: propertyId,
                user_id: userId,
                status: "Active",
                message: data.message
            },
            data => {
                console.log(data);

                form.reset();

                msg = `<p>Success!</p>
                        <p>You successfully showed interest in scheduling!</p>`

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

    addProperty: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        const form = document.getElementById("form-add-listing");
        const formData = Object.fromEntries(new FormData(form));

        Utils.parseImage(formData.picture)
        .then( base64Picture => {
            const data = {
                user_id: userId,
                type_id: parseInt(formData.type_id),
                location: formData.location,
                bedrooms: parseInt(formData.bedrooms),
                bathrooms: parseInt(formData.bathrooms),
                area: parseInt(formData.area),
                floor: parseInt(formData.floor),
                parking: parseInt(formData.parking),
                price: +formData.price,
                picture: base64Picture,
                description: formData.description
            }

            RestClient.post(
                "properties",
                data,
                data => {
                    console.log(data);

                    ListingsService.listProperty(data.data.id, form);
                },
                error => {
                    msg = `<p>Error!</p>
                         <p>` + `Form submission failed: Is this property already listed?` + `</p>`

                    $("#notification_red").html(msg);

                    console.log("Error while submitting form: ",error);

                    document.getElementById("notification_red").style.display="block";
                    setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
                }
            );
        })
        .catch( error => {
            msg = `<p>Error!</p>
                    <p>` + error + `</p>`

                $("#notification_red").html(msg);

                console.log("Error while parsing Image: ",error);

                document.getElementById("notification_red").style.display="block";
                setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
        });
    },

    listProperty: function(property_id, form) {
        RestClient.post(
                "listing",
                {
                    property_id: property_id,
                    status: "Active"
                },
                data => {
                    console.log(data);

                    form.reset();

                    msg = `<p>Success!</p>
                        <p>You have successfully listed your property!</p>`

                    $("#notification_green").html(msg);

                    document.getElementById("notification_green").style.display="block";
                    setTimeout(function(){document.getElementById("notification_green").style.display="none";}, 2500);

                    MyAccountService.displayMyListings();
                },
                error => {
                    msg = `<p>Error!</p>
                         <p>` + `Form submission failed: Is this property already listed?` + `</p>`

                    $("#notification_red").html(msg);

                    console.log("Error while submitting form: ",error);

                    document.getElementById("notification_red").style.display="block";
                    setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
                }
            );
    }
}