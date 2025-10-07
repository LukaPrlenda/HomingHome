var app=$.spapp({
    defaultView: "#page_Main",
    templateDir: "./pages/"
});
  
app.run();

app.route({
    view: "page_Main",
    onReady: function() {runCustom(); navigationMenu("#page_Main");}
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
/*

    OLD CODE FROM OTHER WEBSITE

start_signup_js()
*/