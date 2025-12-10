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

    helpF1: function(event) {
        const form = document.getElementById("form-add-listing");

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        ListingsService.addProperty();
    },

    addBtnListProperty: function() {
        const form = document.getElementById("form-add-listing");

        form.removeEventListener("submit", ButtonEventListoner.helpF1);
        form.addEventListener("submit", ButtonEventListoner.helpF1);
    },


    helpF2: function(event) {
        const btn = document.getElementById("form-add-listing");

        event.preventDefault();
        UserService.logout();
    },

    addBtnLogout: function() {
        const btn = document.getElementById("logoutBtn");

        btn.removeEventListener("click", ButtonEventListoner.helpF2);
        btn.addEventListener("click", ButtonEventListoner.helpF2);
    },
}