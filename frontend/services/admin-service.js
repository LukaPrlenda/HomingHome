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
            `user`,
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
            `listing/Active`,
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

    displayAllInterests: function() {
        RestClient.get(
            `interest/Active`,
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

            $("#adminAllInterestsCards").html(myint);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
    },

    formsAdminDataFill: function() {
        RestClient.get(
            `interest/Active`,
            callback => {
                let typ = `<option value="" disabeled selected>Chouse the property...</option>`;
                for(const obj of callback){
                    let location = obj.location;
                    let intrestedName = obj.intrested_name;
                    let intrestedSurname = obj.intrested_surname;

                    typ += `<option value="` + location + ` | ` + intrestedName + ` ` + intrestedSurname + `">` + location + ` | ` + intrestedName + ` ` + intrestedSurname + `</option>`;
                }

                $("#adminAllInterests").html(typ);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );

        RestClient.get(
            `listing/Active`,
            callback => {
                let f2pl = `<option value="" disabeled selected>Chouse the property...</option>`;
                for(const obj of callback){
                    let location = obj.location;

                    f2pl += `<option value="` + location + `">` + location + `</option>`;
                }

                $("#adminAllListings").html(f2pl);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );

        RestClient.get(
            `user`,
            callback => {
                let f2pl = `<option value="" disabeled selected>Chouse the user...</option>`;
                for(const obj of callback){
                    let name = obj.name;
                    let surname = obj.surname;

                    f2pl += `<option value="` + name + ` ` + surname + `">` + name + ` ` + surname + `</option>`;
                }

                $("#adminAllUsernames").html(f2pl);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
    },
}