
// var src_url = "http://127.0.0.1:4040/";
var src_url = "http://109.237.25.239:4040/";


function Load_Developer_View () {window.location="developer.html"}
function Load_Index_view () 
{
    window.location="index.html"
}



function Load_Jersey_View (){window.location="jersey.html"}
function Load_Uniforms_View (){window.location="uniforms.html"}
function Load_T_shirts_view (){window.location="tshirts.html"}
function Load_Birth_Day_View (){window.location="birth_day.html"}
function Load_Interior_View (){window.location="interior.html"}
function Load_Exterior_View (){window.location="exterior.html"}


function Hide_all_Divs ()
{
    // mains
    document.getElementById("orders-panel-div").style.display="none";

    // new orders tab
    document.getElementById("chips-new-orders-div").style.display = "none";
    document.getElementById("piloa-new-orders-div").style.display = "none";
    document.getElementById("soft-drinks-new-orders-div").style.display = "none";
    // document.getElementById("fresh-drinks-new-orders-div").style.display = "none";
    document.getElementById("salads-new-orders-div").style.display = "none";
    document.getElementById("chicken-new-orders-div").style.display = "none";
    document.getElementById("luwombo-new-orders-div").style.display = "none";
    document.getElementById("localdishe-new-orders-div").style.display = "none";
    document.getElementById("breakfast-other-new-orders-div").style.display = "none";
    // document.getElementById("breakfast-egg-new-orders-div").style.display = "none";
    // document.getElementById("breakfast-teas-new-orders-div").style.display = "none";
    document.getElementById("beverages-new-orders-div").style.display = "none";
    document.getElementById("goatmeat-new-orders-div").style.display = "none";
    document.getElementById("beefliver-new-orders-div").style.display = "none";
    
}

function Show_orders_panel_div (){document.getElementById("orders-panel-div").style.display = "block";}









































