const MainService = {
    displayTotalFlatSpace: function() {
        RestClient.get(
            `properties/sum/area`,
            callback => {
                let tfs = callback[0].total_area + ` m2<br><span>Total Flat Space</span>`;

                $("#totalFlatSpace").html(tfs);
            },
            error_callback => {
                console.log("Error geting Total Flat Space: " + error_callback);
            }
        );
    },

    displayBestDeal: function() {
        RestClient.get(
             `listing/first/Active/Apartment`,
            callback => {
                let dbd = ``;

                let flatSpace = callback.area + ` m2`;
                let floorNumber = callback.floor + ` th`;
                let numberOfRooms = callback.bedrooms;
                let parkingSpots = callback.parking;
                let desc = callback.description;

                dbd += `<div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>` + flatSpace + `</span></li>
                                                    <li>Floor number <span>` + floorNumber + `</span></li>
                                                    <li>Number of rooms <span>` + numberOfRooms + `</span></li>
                                                    <li>Parking Available <span>` + parkingSpots + `</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="assets/images/deal-01.jpg" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Information About Property</h4>
                                            <p>`
                                            + desc + 
                                            `</p>
                                            <div class="icon-button">
                                                <a href="#page_Property-details"><i class="fa fa-calendar"></i> Schedule
                                                    a visit</a>
                                            </div>
                                        </div>
                                    </div>`

                $("#appartment").html(dbd);
            },
            error_callback => {
                console.log("Error geting Best Deal: " + error_callback);
            }
        );

        RestClient.get(
             `listing/first/Active/Luxury Villa`,
            callback => {
                let dbd = ``;

                let flatSpace = callback.area + ` m2`;
                let floorNumber = callback.floor + ` th`;
                let numberOfRooms = callback.bedrooms;
                let parkingSpots = callback.parking;
                let desc = callback.description;

                dbd += `<div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>` + flatSpace + `</span></li>
                                                    <li>Floor number <span>` + floorNumber + `</span></li>
                                                    <li>Number of rooms <span>` + numberOfRooms + `</span></li>
                                                    <li>Parking Available <span>` + parkingSpots + `</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="assets/images/deal-02.jpg" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Information About New Villa</h4>
                                            <p>`
                                            + desc + 
                                            `</p>
                                            <div class="icon-button">
                                                <a href="#page_Property-details"><i class="fa fa-calendar"></i> Schedule
                                                    a visit</a>
                                            </div>
                                        </div>
                                    </div>`

                $("#villa").html(dbd);
            },
            error_callback => {
                console.log("Error geting Best Deal: " + error_callback);
            }
        );

        RestClient.get(
             `listing/first/Active/Penthouse`,
            callback => {
                let dbd = ``;

                let flatSpace = callback.area + ` m2`;
                let floorNumber = callback.floor + ` th`;
                let numberOfRooms = callback.bedrooms;
                let parkingSpots = callback.parking;
                let desc = callback.description;

                dbd += `<div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>` + flatSpace + `</span></li>
                                                    <li>Floor number <span>` + floorNumber + `</span></li>
                                                    <li>Number of rooms <span>` + numberOfRooms + `</span></li>
                                                    <li>Parking Available <span>` + parkingSpots + `</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="assets/images/deal-03.jpg" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Information About Penthouse</h4>
                                            <p>`
                                            + desc + 
                                            `</p>
                                            <div class="icon-button">
                                                <a href="#page_Property-details"><i class="fa fa-calendar"></i> Schedule
                                                    a visit</a>
                                            </div>
                                        </div>
                                    </div>`

                $("#penthouse").html(dbd);
            },
            error_callback => {
                console.log("Error geting Best Deal: " + error_callback);
            }
        );
    },

}