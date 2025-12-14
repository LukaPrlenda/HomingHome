const MyAccountService = {
    displayName: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
            `user/basic_data/` + userId,
            callback => {
                const name = callback.name;
                const surname = callback.surname;
                const phone = callback.phone_number;
                const email = callback.email;
                const adress = callback.current_address;

                let nameSurname = `Hello ` + name + ` ` + surname + `!`;
                $("#nameSurname").html(nameSurname);

                let myphonenumber = phone + `<br><span>Phone Number</span>`;
                $("#myPhone").html(myphonenumber);

                let myemail = email + `<br><span>Personal Email</span>`;
                $("#myEmail").html(myemail);

                let myadress = adress + `<br><span>Adress</span>`;
                $("#myAdress").html(myadress);

                $("#myPhone2").html(myphonenumber);
                $("#myEmail2").html(myemail);
            },
            error_callback => {
                console.log("Error geting Account data: " + error_callback);
            }
        );

        RestClient.get(
            `listing/owner/Active/` + userId,
            callback => {
                const numberOfMyListings = callback.length;

                let mynoflistings = numberOfMyListings + `<br><span>Number of my live listings</span>`;
                $("#myNOfListings").html(mynoflistings);

            },
            error_callback => {
                console.log("Error geting Total Number of my live listings: " + error_callback);
            }
        );

        RestClient.get(
            `interest/owner/Active/` + userId,
            callback => {
                const numberOfIntrestsInMe = callback.length;

                let mynofintrests = numberOfIntrestsInMe + `<br><span>Number of interests in you</span>`;
                $("#nOfIntrestsInMe").html(mynofintrests);

            },
            error_callback => {
                console.log("Error geting Number of interests in you: " + error_callback);
            }
        );
    },

    displayInterestsInMe: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
            `interest/owner/first_N/Active/` + userId + `/6`,
            callback => {
            let myint = ``;
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

                    let intrestedName = obj.intrested_name;
                    let intrestedSurname = obj.intrested_surname;
                    let intrestedPhone = obj.intrested_phone;
                    let intrestedEmail = obj.intrested_gmail;
                    let intrestedMessage = obj.message;

                    myint += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="#page_Property-details"><img ` + picture + ` alt="" class="propertiesCardBtn" data-id="` + id + `"></a>
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
                        <div>
                           <ul>
                            <li>Name: <span>` + intrestedName + ` ` + intrestedSurname + `</span></li>
                            <li>Phone: <span>` + intrestedPhone + `</span></li>
                            <li>Email: <span>` + intrestedEmail + `</span></li>
                            <li>Message: <span>` + intrestedMessage + `</span></li>
                        </ul>
                        </div>
                        <div class="main-button ">
                            <a href="#page_Property-details" class="propertiesCardBtn" data-id=` + id + `">Detailed listing</a>
                        </div>
                    </div>
                </div>`
                }

            $("#interestsInMeCards").html(myint);
            },
            error_callback => {
                console.log("Error geting Total Intrests in me: " + error_callback);
            }
        );
    },

    displayViewIntrestsInMeFull: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
           `interest/owner/Active/` + userId,
            callback => {
            let myint = ``;
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

                    let intrestedName = obj.intrested_name;
                    let intrestedSurname = obj.intrested_surname;
                    let intrestedPhone = obj.intrested_phone;
                    let intrestedEmail = obj.intrested_gmail;
                    let intrestedMessage = obj.message;

                    myint += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="#page_Property-details"><img ` + picture + ` alt="" class="propertiesCardBtn" data-id="` + id + `"></a>
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
                        <div>
                           <ul>
                            <li>Name: <span>` + intrestedName + ` ` + intrestedSurname + `</span></li>
                            <li>Phone: <span>` + intrestedPhone + `</span></li>
                            <li>Email: <span>` + intrestedEmail + `</span></li>
                            <li>Message: <span>` + intrestedMessage + `</span></li>
                        </ul>
                        </div>
                        <div class="main-button ">
                            <a href="#page_Property-details" class="propertiesCardBtn" data-id=` + id + `">Detailed listing</a>
                        </div>
                    </div>
                </div>`
                }

            $("#myViewAllIntrestsInME").html(myint);
            },
            error_callback => {
                console.log("Error geting Intrests in me: " + error_callback);
            }
        );
    },

    displayViewIntrestsInSomeoneFull: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
           `interest/interested/Active/` + userId,
            callback => {
            let myint = ``;
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

                    let intrestedName = obj.intrested_name;
                    let intrestedSurname = obj.intrested_surname;
                    let intrestedPhone = obj.intrested_phone;
                    let intrestedEmail = obj.intrested_gmail;
                    let intrestedMessage = obj.message;

                    myint += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="#page_Property-details"><img ` + picture + ` alt="" class="propertiesCardBtn" data-id="` + id + `"></a>
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
                        <div>
                           <ul>
                            <li>Name: <span>` + intrestedName + ` ` + intrestedSurname + `</span></li>
                            <li>Phone: <span>` + intrestedPhone + `</span></li>
                            <li>Email: <span>` + intrestedEmail + `</span></li>
                            <li>Message: <span>` + intrestedMessage + `</span></li>
                        </ul>
                        </div>
                        <div class="main-button ">
                            <a href="#page_Property-details" class="propertiesCardBtn" data-id=` + id + `">Detailed listing</a>
                        </div>
                    </div>
                </div>`
                }

            $("#myViewAllIntrestsInSomeone").html(myint);
            },
            error_callback => {
                console.log("Error geting Intrests in someones property: " + error_callback);
            }
        );
    },

    openViewMyIntrestsFull: function() {
        MyAccountService.displayViewIntrestsInMeFull();
        MyAccountService.displayViewIntrestsInSomeoneFull();

        window.location.hash = "page_My-ViewIntrests";
    },




    displayMyListings: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
            `listing/owner/Active/` + userId,
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
                    let id = obj.id;

                    mylst += `<div class="col-lg-4 col-md-6">
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

            $("#myCurrentListings").html(mylst);
            },
            error_callback => {
                console.log("Error geting My listings: " + error_callback);
            }
        );
    },

    displayMyListingsFull: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
            `listing/owner/Active/` + userId,
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
                        <a><img `+ picture + ` alt="" class="choseAProperty" data-id="` + concat_id + `" data-location='` + location + `'></a>
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
                            <a class="choseAProperty" data-id="` + concat_id + `" data-location='` + location + `'>Choose a Property</a>
                        </div>
                    </div>
                </div>`
                }

            $("#myAllProperties").html(mylst);

            
            },
            error_callback => {
                console.log("Error geting My listings: " + error_callback);
            }
        );
    },

    openMyListingsFull: function() {
        MyAccountService.displayMyListingsFull();

        window.location.hash = "page_My-Properties";
    },

    enterDataInForme: function(id, location) {
        let value = `
            <option value="` + id + `">` + location + `</option>
        `;

        $("#form3PropertyListings").html(value);

        window.location.hash = "page_My-account";
        document.getElementById("form3PropertyListings").scrollIntoView({
            behavior: "auto",
            block: "center"
        });
    },

    resetDataInFrome: function(form) {
        let value = `
            <option value="" selected>Chouse the property...</option>
        `;

        form.reset();
        $("#form3PropertyListings").html(value);
    },

    submitRemoveListing: function(form) {
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

                        MyAccountService.resetDataInFrome(form);
                        MyAccountService.displayMyListings();
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










    displayIntrestsInMeFull: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
           `interest/owner/Active/` + userId,
            callback => {
            let myint = ``;
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
                    let id = obj.interest_id;
                    let property_id = obj.id;
                    let concat_id = id + `_` + property_id;

                    let intrestedName = obj.intrested_name;
                    let intrestedSurname = obj.intrested_surname;
                    let intrestedPhone = obj.intrested_phone;
                    let intrestedEmail = obj.intrested_gmail;
                    let intrestedMessage = obj.message;


                    myint += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a><img ` + picture + ` alt="" class="choseAInterest" data-id="` + concat_id + `" data-location='` + location + `'></a>
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
                        <div>
                           <ul>
                            <li>Name: <span>` + intrestedName + ` ` + intrestedSurname + `</span></li>
                            <li>Phone: <span>` + intrestedPhone + `</span></li>
                            <li>Email: <span>` + intrestedEmail + `</span></li>
                            <li>Message: <span>` + intrestedMessage + `</span></li>
                        </ul>
                        </div>
                        <div class="main-button">
                            <a class="choseAInterest" data-id=` + concat_id + `" data-location='` + location + `'>Choose a Property</a>
                        </div>
                    </div>
                </div>`
                }

            $("#myAllIntrestsInME").html(myint);
            },
            error_callback => {
                console.log("Error geting Intrests in me: " + error_callback);
            }
        );
    },

    displayIntrestsInSomeoneFull: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
           `interest/interested/Active/` + userId,
            callback => {
            let myint = ``;
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
                    let id = obj.interest_id;
                    let property_id = obj.id;
                    let concat_id = id + `_` + property_id;

                    let intrestedName = obj.intrested_name;
                    let intrestedSurname = obj.intrested_surname;
                    let intrestedPhone = obj.intrested_phone;
                    let intrestedEmail = obj.intrested_gmail;
                    let intrestedMessage = obj.message;

                    myint += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a><img ` + picture + ` alt="" class="choseAInterest" data-id="` + concat_id + `" data-location='` + location + `'></a>
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
                        <div>
                           <ul>
                            <li>Name: <span>` + intrestedName + ` ` + intrestedSurname + `</span></li>
                            <li>Phone: <span>` + intrestedPhone + `</span></li>
                            <li>Email: <span>` + intrestedEmail + `</span></li>
                            <li>Message: <span>` + intrestedMessage + `</span></li>
                        </ul>
                        </div>
                        <div class="main-button">
                            <a class="choseAInterest" data-id=` + concat_id + `" data-location='` + location + `'>Choose a Property</a>
                        </div>
                    </div>
                </div>`
                }

            $("#myAllIntrestsInSomeone").html(myint);
            },
            error_callback => {
                console.log("Error geting Intrests in someones property: " + error_callback);
            }
        );
    },

    openMyIntrestsFull: function() {
        MyAccountService.displayIntrestsInMeFull();
        MyAccountService.displayIntrestsInSomeoneFull();

        window.location.hash = "page_My-Intrests";
    },

    enterDataInFormeIntrest: function(id, location) {
        let value = `
            <option value="` + id + `">` + location + `</option>
        `;

        $("#form2PropertyListings").html(value);

        window.location.hash = "page_My-account";
        document.getElementById("form2PropertyListings").scrollIntoView({
            behavior: "auto",
            block: "center"
        });
    },

    resetDataInFromeIntrest: function(form) {
        let value = `
            <option value="" selected>Chouse the property...</option>
        `;

        form.reset();
        $("#form2PropertyListings").html(value);
    },

    submitUpdateIntrest: function(form) {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        const dataForm = Object.fromEntries(new FormData(form));

        const interest_id = parseInt(dataForm.id.split("_")[0]);
        const property_id = parseInt(dataForm.id.split("_")[1]);

        RestClient.patch(
            "interest/" + interest_id,
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
                            message: "Updating Intrest: " + dataForm.message
                        },
                    data => {
                        console.log(data);


                        msg = `<p>Success!</p>
                            <p>You successfully updated the intrest!</p>`

                        $("#notification_green").html(msg);

                        document.getElementById("notification_green").style.display="block";
                        setTimeout(function(){document.getElementById("notification_green").style.display="none";}, 2500);

                        MyAccountService.resetDataInFromeIntrest(form);
                        MyAccountService.displayInterestsInMe();
                    },
                    error => {
                        msg = `<p>Error!</p>
                            <p>Error while submitting form</p>`

                        $("#notification_red").html(msg);

                        console.log("Error while submitting form: ",error);

                        document.getElementById("notification_red").style.display="block";
                        setTimeout(function(){document.getElementById("notification_red").style.display="none";}, 3000);

                        RestClient.patch(
                            "interest/" + interest_id,
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





    formsDataFill: function() {
        const tokenData = Utils.parseJwt(localStorage.getItem("user_token"));
        const userId = tokenData.user.id;

        RestClient.get(
            `type`,
            callback => {
                let typ = `<option value="" disabeled selected>Chouse your property type...</option>`;
                for(const obj of callback){
                    let type = obj.type;
                    let id = obj.id;

                    typ += `<option value="` + id + `">` + type + `</option>`;
                }

                $("#form1PropertyType").html(typ);







                ButtonEventListoner.addBtnListProperty();
            },
            error_callback => {
                console.log("Error geting Property type: " + error_callback);
            }
        );
/*
        RestClient.get(
            `interest/owner/Active/` + userId,
            callback => {
                let f2pl = ``;
                for(const obj of callback){
                    let location = obj.location;

                    f2pl += `<option value="` + location + `">` + location + `</option>`;
                }

                $("#f2pl1").html(f2pl);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );

        RestClient.get(
            `interest/interested/Active/` + userId,
            callback => {
                let f2pl = ``;
                for(const obj of callback){
                    let location = obj.location;

                    f2pl += `<option value="` + location + `">` + location + `</option>`;
                }

                $("#f2pl2").html(f2pl);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
        */
/*
        RestClient.get(
            `listing/owner/Active/` + userId,
            callback => {
                let f2pl = `<option value="" disabeled selected>Chouse the property...</option>`;
                for(const obj of callback){
                    let location = obj.location;

                    f2pl += `<option value="` + location + `">` + location + `</option>`;
                }

                $("#form3PropertyListings").html(f2pl);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
        */
    },
}