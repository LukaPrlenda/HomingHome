const ListingsService = {
    schedulingIntrest: function(propertyId) {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
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
}