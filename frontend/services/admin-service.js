const AdminService = {
    displayStats: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
            `user/basic_data/` + userId,
            callback => {
                const phone = callback.phone_number;
                const email = callback.email;
                const adress = callback.current_address;

                let myphonenumber = phone + `<br><span>Phone Number</span>`;
                $("#phoneAdmin").html(myphonenumber);

                let myemail = email + `<br><span>Personal Email</span>`;
                $("#emailAdmin").html(myemail);

                let myadress = adress + `<br><span>Adress</span>`;
                $("#adressAdmin").html(myadress);

                $("#myPhone2").html(myphonenumber);
                $("#myEmail2").html(myemail);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );

        RestClient.get(
            `listing/Active`,
            callback => {
                const numberOfListings = callback.length;

                let noflistings = numberOfListings + `<br><span>Total number of listings</span>`;
                $("#adminNOfListings").html(noflistings);

            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );

        RestClient.get(
            `interest/Active`,
            callback => {
                const numberOfIntrestsIn = callback.length;

                let nofintrests = numberOfIntrestsIn + `<br><span>Total number of interests</span>`;
                $("#adminNOfIntrestsInMe").html(nofintrests);

            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );

        RestClient.get(
            `user/usersnames/user`,
            callback => {
                const numberOfUsers = callback.length;

                let usersN = numberOfUsers + `<br><span>Total number of users</span>`;
                $("#adminNOfUsers").html(usersN);

            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
    },

    displayAllListings: function() {
        RestClient.get(
            `listing/first_N/Active/6`,
            callback => {
            let adlst = ``;
                for(const obj of callback){
                    let picture = Utils.showImage(obj.picture);
                    let type = obj.type;
                    let price = `$` + obj.price;
                    let location = obj.location;
                    let bedrooms = obj.bedrooms;
                    let bathrooms = obj.bathrooms;
                    let area = obj.area + ` m2`;
                    let floor = obj.floor;
                    let parking = obj.parking + ` spots`;
                    let id = obj.id;

                    adlst += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="#page_Property-details"><img `+ picture + ` alt="" class="propertiesCardBtn" data-id="` + id + `"></a>
                        <span class="category">` + type + `</span>
                        <h6>` + price + `</h6>
                        <h4><a href="#page_Property-details">` + location + `</a></h4>
                        <ul>
                            <li>Bedrooms: <span>` + bedrooms + `</span></li>
                            <li>Bathrooms: <span>` + bathrooms + `</span></li>
                            <li>Area: <span>` + area + `</span></li>
                            <li>Floor: <span>` + floor + `</span></li>
                            <li>Parking: <span>` + parking + `</span></li>
                        </ul>
                        <div class="main-button">
                            <a href="#page_Property-details" class="propertiesCardBtn" data-id=` + id + `">Schedule a visit</a>
                        </div>
                    </div>
                </div>`
                }

            $("#adminAllListingsCards").html(adlst);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
    },




    displayAdminListingsFull: function() {
        RestClient.get(
            `listing/Active`,
            callback => {

            let mylst = ``;
                for(const obj of callback){
                    let picture = Utils.showImage(obj.picture);
                    let type = obj.type;
                    let price = `$` + obj.price;
                    let location = obj.location;
                    let bedrooms = obj.bedrooms;
                    let bathrooms = obj.bathrooms;
                    let area = obj.area + ` m2`;
                    let floor = obj.floor;
                    let parking = obj.parking + ` spots`;
                    let id = obj.listing_id;
                    let property_id = obj.id;
                    let concat_id = id + `_` + property_id;

                    mylst += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a><img `+ picture + ` alt="" class="choseAProperty" data-id="` + concat_id + `" data-location='` + location + `' data-admin=true></a>
                        <span class="category">` + type + `</span>
                        <h6>` + price + `</h6>
                        <h4><a>` + location + `</a></h4>
                        <ul>
                            <li>Bedrooms: <span>` + bedrooms + `</span></li>
                            <li>Bathrooms: <span>` + bathrooms + `</span></li>
                            <li>Area: <span>` + area + `</span></li>
                            <li>Floor: <span>` + floor + `</span></li>
                            <li>Parking: <span>` + parking + `</span></li>
                        </ul>
                        <div class="main-button">
                            <a class="choseAProperty" data-id="` + concat_id + `" data-location='` + location + `' data-admin=true>Choose a Property</a>
                        </div>
                    </div>
                </div>`
                }

            $("#myAllProperties").html(mylst);

            
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
    },

    openAdminListingsFull: function() {
        AdminService.displayAdminListingsFull();

        window.location.hash = "page_My-Properties";
    },

    enterAdminDataInForme: function(id, location) {
        let value = `
            <option value="` + id + `">` + location + `</option>
        `;

        $("#adminRemoveAllListings").html(value);

        window.location.hash = "page_Admin";
        document.getElementById("adminRemoveAllListings").scrollIntoView({
            behavior: "auto",
            block: "center"
        });
    },

    resetAdminDataInFrome: function(form) {
        let value = `
            <option value="" selected>Chouse the property...</option>
        `;

        form.reset();
        $("#adminRemoveAllListings").html(value);
    },

    submitAdminRemoveListing: function(form) {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        const dataForm = Object.fromEntries(new FormData(form));

        const listing_id = parseInt(dataForm.id.split("_")[0]);
        const property_id = parseInt(dataForm.id.split("_")[1]);

        RestClient.patch(
            "listing/" + listing_id,
            {
                status: dataForm.status
            },
            data => {

                console.log(data);
                RestClient.post(
                    "admin_messages",
                        {
                            user_id: userId,
                            property_id: property_id,
                            message: "Removing Listing: " + dataForm.message
                        },
                    data => {
                        console.log(data);


                        msg = `<p>Success!</p>
                            <p>You successfully removed the listing!</p>`

                        $("#notification_green").html(msg);

                        document.getElementById("notification_green").style.display="block";
                        setTimeout(function(){document.getElementById("notification_green").style.display="none";}, 2500);

                        AdminService.resetAdminDataInFrome(form);
                        AdminService.displayAllListings();
                        MainService.displayBestDealMain();
                        PropertiesService.properties6CardMinimal();
                    },
                    error => {
                        msg = `<p>Error!</p>
                            <p>Error while submitting form</p>`

                        $("#notification_red").html(msg);

                        console.log("Error while submitting form: ",error);

                        document.getElementById("notification_red").style.display="block";
                        setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);

                        RestClient.patch(
                            "listing/" + listing_id,
                            {
                                status: "Active"
                            },
                            data => {
                            console.log(data);
                            },
                            error => {
                                msg = `<p>Error!</p>
                                    <p>Error while submitting form</p>`

                                $("#notification_red").html(msg);

                                console.log("Error while submitting form: ",error);

                                document.getElementById("notification_red").style.display="block";
                                setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
                            }
                        );
                    }
                );
            },
            error => {
                msg = `<p>Error!</p>
                    <p>Error while submitting form</p>`

                $("#notification_red").html(msg);

                console.log("Error while submitting form: ",error);

                document.getElementById("notification_red").style.display="block";
                setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
            }
        );
    },


    




    formsAdminDataFill: function() {

        RestClient.get(
            `user/usersnames/user`,
            callback => {
                let f2pl = `<option value="" disabeled selected>Chouse the user...</option>`;
                for(const obj of callback){
                    let id = obj.id;
                    let username = obj.username;
                    let email = obj.email;

                    f2pl += `<option value="` + id + `">` + username + ` | ` + email + `</option>`;
                }

                $("#adminAllUsernames").html(f2pl);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
    },


    deleteUser: function(form) {
        const dataForm = Object.fromEntries(new FormData(form));

        RestClient.delete(
            "user/" + dataForm.id,
            {},
            data => {
                console.log(data);

                form.reset();
                AdminService.formsAdminDataFill();
                AdminService.displayStats();

                msg = `<p>Success!</p>
                        <p>You successfully deleted the user!</p>`

                $("#notification_green").html(msg);

                document.getElementById("notification_green").style.display="block";
                setTimeout(function(){document.getElementById("notification_green").style.display="none";}, 2500);


            },
            error => {
                msg = `<p>Error!</p>
                        <p>Error while submitting form</p>`

                $("#notification_red").html(msg);

                console.log("Error while deleting user: ",error);

                document.getElementById("notification_red").style.display="block";
                setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);
            }
        );
    },
}