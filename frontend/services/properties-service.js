const PropertiesService = {
    properties6CardMinimal: function() {
         RestClient.get(
            `listing/first_N/Active/6`,
            callback => {
                let pcd = ``;
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

                    pcd += `<div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="#page_Property-details"><img ` + picture + ` alt=""></a>
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
                            <a href="#page_Property-details">Schedule a visit</a>
                        </div>
                    </div>
                </div>`
                }
            $("#bestPropertyes").html(pcd);
            },
            error_callback => {
                onsole.log("Error geting Best Deal: " + error_callback);
            }
        );
    },

    propertiesAllCardMinimal: function() {
         RestClient.get(
            `listing/Active`,
            callback => {
                let pcd = ``;
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
                    let filter = obj.type.split(" ").join("");

                    pcd += `<div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 ` + filter + `">
                    <div class="item">
                        <a href="#page_Property-details"><img ` + picture + ` alt=""></a>
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
                            <a href="#page_Property-details">Schedule a visit</a>
                        </div>
                    </div>
                </div>`
                }
            $("#allProperties").html(pcd);
            runCustom();
            },
            error_callback => {
                onsole.log("Error geting Best Deal: " + error_callback);
            }
        );
    },
}