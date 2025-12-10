const ButtonEventListoner = {
    addBtnPropertyInfo: function(list) {
        list.forEach(id => {
            const div = document.getElementById(id);

            div.addEventListener("click", function(event) {
                if(event.target.classList.contains("propertiesCardBtn")) {
                    const dataId = event.target.dataset.id;
                    
                    PropertiesService.propertiesIdCardDetaild(dataId);
                }
            });
        });
    },

    addBtnSchedulingIntrest: function() {
        const form = document.getElementById("interest-contact-form");

        form.addEventListener("submit", function(event) {
            event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const propertyId = document.getElementById("submit_intrest_scheduling").dataset.id;
            ListingsService.schedulingIntrest(propertyId);
        });
    },
}