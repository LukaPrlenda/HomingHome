var app=$.spapp({
    defaultView: "#page_Main",
    templateDir: "./pages/"
});
  
app.run();

app.route({
    view: "page_Main",
    onReady: function() {runCustom();}
});

app.route({
    view: "page_Contact",
    onReady: function() {runCustom();}
});

app.route({
    view: "page_Properties",
    onReady: function() {runCustom();}
});

app.route({
    view: "page_Property-details",
    onReady: function() {runCustom();}
});

app.route({
    view: "page_Signup",
    onReady: function() {runCustom(); start_signup_js();}
});
/*

    OLD CODE FROM OTHER WEBSITE

start_signup_js()
*/