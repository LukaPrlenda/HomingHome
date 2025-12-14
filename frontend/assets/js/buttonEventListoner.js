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

    addBtnSelectProperty: function(list) {
        list.forEach(id => {
            const div = document.getElementById(id);

            div.addEventListener("click", function(event) {

                if(event.target.classList.contains("choseAProperty")) {

                    const dataId = event.target.dataset.id;
                    const dataLocation = event.target.dataset.location;
                    const dataAdmin = event.target.dataset.admin;
                    
                    if(dataAdmin) {
                        AdminService.enterAdminDataInForme(dataId, dataLocation);
                    }
                    else{
                        MyAccountService.enterDataInForme(dataId, dataLocation);
                    }
                }
            });
        });
    },

    addBtnSelectIntrest: function(list) {
        list.forEach(id => {
            const div = document.getElementById(id);

            div.addEventListener("click", function(event) {

                if(event.target.classList.contains("choseAInterest")) {

                    const dataId = event.target.dataset.id;
                    const dataLocation = event.target.dataset.location;
                    
                    MyAccountService.enterDataInFormeIntrest(dataId, dataLocation);
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



    //Add Listing
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



    //Logout
    helpF2: function(event) {
        event.preventDefault();
        UserService.logout();
    },

    addBtnLogout: function() {
        const btn = document.getElementById("logoutBtn");

        btn.removeEventListener("click", ButtonEventListoner.helpF2);
        btn.addEventListener("click", ButtonEventListoner.helpF2);
    },



    //User Remove Listing
    helpF3: function(event) {
        event.preventDefault();
        MyAccountService.openMyListingsFull();
    },

    addBtnOpenAllProperties: function() {
        const btn = document.getElementById("openAllProperties");

        btn.removeEventListener("click", ButtonEventListoner.helpF3);
        btn.addEventListener("click", ButtonEventListoner.helpF3);
    },

    helpF4: function(event) {
        const form = document.getElementById("remove-form-submit");

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        MyAccountService.submitRemoveListing(form);
    },

    addBtnRemoveProperties: function() {
        const form = document.getElementById("remove-form-submit");

        form.removeEventListener("submit", ButtonEventListoner.helpF4);
        form.addEventListener("submit", ButtonEventListoner.helpF4);
    },



    //User Update Intrest
    helpF5: function(event) {
        event.preventDefault();
        MyAccountService.openMyIntrestsFull();
    },

    addBtnOpenAllIntrests: function() {
        const btn = document.getElementById("openAllIntrests");

        btn.removeEventListener("click", ButtonEventListoner.helpF5);
        btn.addEventListener("click", ButtonEventListoner.helpF5);
    },

    helpF6: function(event) {
        const form = document.getElementById("remove-intrest-form-submit");

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        MyAccountService.submitUpdateIntrest(form);
    },

    addBtnRemoveIntrests: function() {
        const form = document.getElementById("remove-intrest-form-submit");

        form.removeEventListener("submit", ButtonEventListoner.helpF6);
        form.addEventListener("submit", ButtonEventListoner.helpF6);
    },



    //Admin Remove Listing
    helpF7: function(event) {
        event.preventDefault();
        AdminService.openAdminListingsFull();
    },

    addBtnAdminOpenAllProperties: function() {
        const btn = document.getElementById("adminOpenAllProperties");

        btn.removeEventListener("click", ButtonEventListoner.helpF7);
        btn.addEventListener("click", ButtonEventListoner.helpF7);
    },

    helpF8: function(event) {
        const form = document.getElementById("admin-remove-form-submit");

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        AdminService.submitAdminRemoveListing(form);
    },

    addBtnAdminRemoveProperties: function() {
        const form = document.getElementById("admin-remove-form-submit");

        form.removeEventListener("submit", ButtonEventListoner.helpF8);
        form.addEventListener("submit", ButtonEventListoner.helpF8);
    },

    //Admin Remove User
    helpF9: function(event) {
        const form = document.getElementById("admin-remove-user-form-submit");

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        AdminService.deleteUser(form);
    },

    addBtnAdminRemoveProperties: function() {
        const form = document.getElementById("admin-remove-user-form-submit");

        form.removeEventListener("submit", ButtonEventListoner.helpF9);
        form.addEventListener("submit", ButtonEventListoner.helpF9);
    },

    //Email
    helpF10: function(event) {
        const form = document.getElementById("send-email-form");

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        MailForm.sendEmail(form);
    },

    addBtnAdminSendEmailMain: function() {
        const form = document.getElementById("send-email-form");

        form.removeEventListener("submit", ButtonEventListoner.helpF10);
        form.addEventListener("submit", ButtonEventListoner.helpF10);
    },

    helpF11: function(event) {
        const form = document.getElementById("send-email-contact-form");

        event.preventDefault();
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

        MailForm.sendEmail(form);
    },

    addBtnAdminSendEmailContact: function() {
        const form = document.getElementById("send-email-contact-form");

        form.removeEventListener("submit", ButtonEventListoner.helpF11);
        form.addEventListener("submit", ButtonEventListoner.helpF11);
    },

    //User Get All Intrests
    helpF12: function(event) {
        event.preventDefault();
        MyAccountService.openViewMyIntrestsFull();
    },

    addBtnOpenViewAllIntrests: function() {
        const btn = document.getElementById("show_all_intrests");

        btn.removeEventListener("click", ButtonEventListoner.helpF12);
        btn.addEventListener("click", ButtonEventListoner.helpF12);
    },

    //User Delete Account
    helpF13: function(event) {
        event.preventDefault();
        MyAccountService.showDeleteAccountModal();
    },

    addBtnDeleteAccount: function() {
        const btn = document.getElementById("buttonToDeleteAccount");

        btn.removeEventListener("click", ButtonEventListoner.helpF13);
        btn.addEventListener("click", ButtonEventListoner.helpF13);
    },

     //User Modal Delete Account
    helpF14: function(event) {
        event.preventDefault();
        MyAccountService.deleteMyAccount();
    },

    addBtnModalDeleteMyAccount: function() {
        const btn = document.getElementById("modalYesToDeleteAccount");

        btn.removeEventListener("click", ButtonEventListoner.helpF14);
        btn.addEventListener("click", ButtonEventListoner.helpF14);
    },

    //User Modal Hide Without Delition
    helpF15: function(event) {
        event.preventDefault();
        MyAccountService.hideModalWithoutDeleting();
    },

    addBtnHideModalWithoutDeleting: function() {
        const btn = document.getElementById("modalNoToDeleteAccount");

        btn.removeEventListener("click", ButtonEventListoner.helpF15);
        btn.addEventListener("click", ButtonEventListoner.helpF15);
    },
}
