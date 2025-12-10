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
                    let id = obj.id;

                    pcd += `<div class="col-lg-4 col-md-6">
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
                        <div class="main-button">
                            <a href="#page_Property-details" class="propertiesCardBtn" data-id="` + id + `">Schedule a visit</a>
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
                    let id = obj.id;

                    pcd += `<div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 ` + filter + `">
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
                        <div class="main-button">
                            <a href="#page_Property-details" class="propertiesCardBtn" data-id="` + id + `">Schedule a visit</a>
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

    propertiesIdCardDetaild: function(propertyId) {
         RestClient.get(
            `listing/byId/Active/` + propertyId,
            callback => {
                let pcd = ``;
                let picture = Utils.showImage(callback.picture);
                let type = callback.type;
                let location = callback.location;
                let area = callback.area + ` m2`;
                let desc = callback.description;

                pcd += `<div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img ` + picture + ` alt="">
          </div>
          <div class="main-content">
            <span class="category">` + type + `</span>
            <h4>` + location + `</h4>
            <p>
            ` + desc + `
            </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>` + area + `<br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contract<br><span>Contract Ready</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Payment Process</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li>
            </ul>
          </div>
          <div class="contact-page section">
            <form id="interest-contact-form" class="contact-form" action="" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <label for="message">
                      To <strong>schedule a visit</strong> while <strong>logged into your account</strong>, 
                      you can write a message and send information to the seller to show that you are interested in the property. The seller will get back to you.
                    </label>
                    <textarea name="message" id="message" placeholder="Your Message to the Seller" required></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="submit_intrest_scheduling" data-id="` + propertyId + `" class="orange-button">Show Intrest for Scheduling</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>`
                
            $("#propertyDetailCard").html(pcd);

            ButtonEventListoner.addBtnSchedulingIntrest();
            },
            error_callback => {
                console.log("Error geting Best Deal: " + error_callback);
            }
        );
    },
}