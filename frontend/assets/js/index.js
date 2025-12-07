var app=$.spapp({
    defaultView: "#page_Main",
    templateDir: "./pages/"
});
  
app.run();

app.route({
    view: "page_Main",
    onCreate: function() {MainService.displayTotalFlatSpace(); MainService.displayBestDeal();},
    onReady: function() {runCustom(); navigationMenu("#page_Main"); counter();}
});

app.route({
    view: "page_Contact",
    onReady: function() {runCustom(); navigationMenu("#page_Contact");}
});

app.route({
    view: "page_Properties",
    onReady: function() {runCustom(); navigationMenu("#page_Properties");}
});

app.route({
    view: "page_Property-details",
    onReady: function() {runCustom(); navigationMenu("#page_Property-details");}
});

app.route({
    view: "page_Signup",
    onReady: function() {runCustom(); navigationMenu("#page_Signup"); start_signup_js();}
});

app.route({
    view: "page_Login",
    onReady: function() {runCustom(); navigationMenu("#page_Login");}
});
app.route({
    view: "page_My-account",
    onReady: function() {runCustom(); navigationMenu("#page_My-account");}
});
app.route({
    view: "page_Admin",
    onReady: function() {runCustom(); navigationMenu("#page_Admin");}
});
/*

    OLD CODE FROM OTHER WEBSITE

start_signup_js()
*/