var app=$.spapp({
    defaultView: "#page_Main",
    templateDir: "./pages/"
});
  
app.run();

app.route({
    view: "page_Main",
    onCreate: function() {
        MainService.displayTotalFlatSpace();
        MainService.displayBestDealMain();
        PropertiesService.properties6CardMinimal();
        ButtonEventListoner.addBtnPropertyInfo(["appartment", "villa", "penthouse", "bestPropertyes"]);
        ButtonEventListoner.addBtnAdminSendEmailMain();
    },
    onReady: function() {runCustom(); navigationMenu("#page_Main"); counter();}
});

app.route({
    view: "page_Contact",
        onCreate: function() {
        ButtonEventListoner.addBtnAdminSendEmailContact();
    },
    onReady: function() {runCustom(); navigationMenu("#page_Contact"); ButtonEventListoner.addBtnAdminSendEmail();}
});

app.route({
    view: "page_Properties",
    onCreate: function() {ButtonEventListoner.addBtnPropertyInfo(["allProperties"]);},
    onReady: function() {PropertiesService.propertiesAllCardMinimal(); runCustom(); navigationMenu("#page_Properties");}
});

app.route({
    view: "page_Property-details",
    onCreate: function() {
        MainService.displayBestDealProperty();
        ButtonEventListoner.addBtnPropertyInfo(["propertAappartment", "propertyVilla", "propertyPenthouse"]);
    },
    onReady: function() {runCustom(); navigationMenu("#page_Property-details");}
});

app.route({
    view: "page_Signup",
    onCreate: function() {start_signup_js();},
    onReady: function() {runCustom(); navigationMenu("#page_Signup");}
});

app.route({
    view: "page_Login",
    onCreate: function() {start_login_js();},
    onReady: function() {runCustom(); navigationMenu("#page_Login");}
});
app.route({
    view: "page_My-account",
    onCreate: function() {
        MyAccountService.displayName();
        MyAccountService.displayInterestsInMe();
        MyAccountService.displayMyListings();
        MyAccountService.formsDataFill();
        ButtonEventListoner.addBtnPropertyInfo(["interestsInMeCards", "myCurrentListings"]);
        ButtonEventListoner.addBtnLogout();

        ButtonEventListoner.addBtnOpenAllProperties();
        ButtonEventListoner.addBtnRemoveProperties();

        ButtonEventListoner.addBtnOpenAllIntrests();
        ButtonEventListoner.addBtnRemoveIntrests();
    },
    onReady: function() {MyAccountService.displayInterestsInMe(); runCustom(); navigationMenu("#page_My-account");}
});
app.route({
    view: "page_Admin",
        onCreate: function() {
        AdminService.displayStats();
        AdminService.displayAllListings();
        AdminService.formsAdminDataFill();
        ButtonEventListoner.addBtnPropertyInfo(["adminAllListingsCards"]);
        ButtonEventListoner.addBtnLogout();

        ButtonEventListoner.addBtnAdminOpenAllProperties();
        ButtonEventListoner.addBtnAdminRemoveProperties();

    },
    onReady: function() {runCustom(); navigationMenu("#page_Admin");}
});
app.route({
    view: "page_My-Properties",
    onCreate: function() {
        ButtonEventListoner.addBtnSelectProperty(["myAllProperties"]);
    },
    onReady: function() {runCustom(); navigationMenu(["#page_My-account"]);}
});
app.route({
    view: "page_My-Intrests",
    onCreate: function() {
        ButtonEventListoner.addBtnSelectIntrest(["myAllIntrestsInME", "myAllIntrestsInSomeone"]);
    },
    onReady: function() {runCustom(); navigationMenu("#page_Admin");}
});
/*

    OLD CODE FROM OTHER WEBSITE

start_signup_js()
*/