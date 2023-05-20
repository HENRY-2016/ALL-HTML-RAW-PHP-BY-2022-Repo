
// var booking_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/PostCustomerBookingEndpoint";
// var message_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/PostCustomerMessageEndpoint";


var booking_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/PostCustomerBookingEndpoint";
var message_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/PostCustomerMessageEndpoint";


/**
 * Linode@2021
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * 
 *                      Main Navigetion Links
 *
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */

function Load_Index_Page ()
{
    // window.location="index.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/index.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}

function Load_Main_Link_Service_Page ()
{
    // window.location="main_services.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/main_services.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}




/**
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * 
 *                      Sub Navigetion Links
 *
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */

let animate_seconds = 1000;
function Dealy_Load_Sub_Link_Gardens_Page () {setTimeout(Load_Sub_Link_Gardens_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Conference_Page () {setTimeout(Load_Sub_Link_Conference_Page,animate_seconds);}
function Dealy_Load_Main_Link_Rooms_Page () {setTimeout(Load_Main_Link_Rooms_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Indoor_Games_Page () {setTimeout(Load_Sub_Link_Indoor_Games_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Outdoor_Games_Page () {setTimeout(Load_Sub_Link_Outdoor_Games_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Restarant_Bar_Page () {setTimeout(Load_Sub_Link_Restarant_Bar_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Spa_massage_Page () {setTimeout(Load_Sub_Link_Spa_massage_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Sauna_Steam_Page () {setTimeout(Load_Sub_Link_Sauna_Steam_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Swimming_Page () {setTimeout(Load_Sub_Link_Swimming_Page,animate_seconds);}
function Dealy_Load_Sub_Link_Fishing_Page () {setTimeout(Load_Sub_Link_Fishing_Page,animate_seconds);}


function Load_Main_Link_Rooms_Page ()
{
    // window.location="main_rooms.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/main_rooms.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Gardens_Page () 
{ 
    // window.location="services_gardens.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_gardens.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}

function Load_Sub_Link_Conference_Page () 
{ 
    // window.location="services_conference.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_conference.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Indoor_Games_Page () 
{ 
    // window.location="services_indoor_games.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_indoor_games.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Outdoor_Games_Page () 
{ 
    // window.location="services_outdoor_games.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_outdoor_games.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Restarant_Bar_Page () 
{ 
    // window.location="services_restuarant_bar.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_restuarant_bar.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Spa_massage_Page () 
{ 
    // window.location="services_spa_massage.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_spa_massage.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Sauna_Steam_Page () 
{ 
    // window.location="services_sauna_steam.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_sauna_steam.html"
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Swimming_Page () 
{ 
    // window.location="services_swimming.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_swimming.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}
function Load_Sub_Link_Fishing_Page () 
{ 
    // window.location="services_fishing.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/services_fishing.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id020').style.display='block';},
        success: function () {window.location=page_url;}
    });
}

/**
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * 
 *                      Tabs
 * 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */

function Display_Tab_One ()
{
    document.getElementById("display-tab-2").style.display = "none";
    document.getElementById("display-tab-1").style.display = "block";
}
function Display_Tab_Two ()
{
    document.getElementById("display-tab-1").style.display = "none";
    document.getElementById("display-tab-2").style.display = "block";
}


/**
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * 
 *                      Submitting On Booking
 * 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */

function Cancle_Booking_PopUp_Window ()
{
    document.getElementById('booking-form').reset();
    document.getElementById('id01').style.display='none';
    setTimeout(Show_Div_To_Hide,2000)
}

function Show_Div_To_Hide () 
{
    document.getElementById('invalid-email-address-div').style.display = 'none';
    document.getElementById('div-to-hide').style.display='block';
}

function Validate_Email_Adress ()
{
    // http://zparacha.com/validate-email-address-using-javascript-regular-expression
    let regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
    let emailAdress = document.getElementById('email-input').value;
    if (emailAdress.match(regexEmail)) 
        {
            // console.log('true');
            document.getElementById('invalid-email-address-div').style.display = 'none';
            document.getElementById('div-to-hide').style.display='block';
            return true; 
        } 
        else 
        {
            // console.log('false');
            document.getElementById('div-to-hide').style.display='none';
            document.getElementById('invalid-email-address-div').style.display = 'block';
            return false; 
        }
}

function Validate_Resort_Rooms_Email_Adress ()
{
    // http://zparacha.com/validate-email-address-using-javascript-regular-expression
    let regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
    let emailAdress = document.getElementById('resort-email-input').value;
    if (emailAdress.match(regexEmail)) 
        {
            // console.log('true');
            document.getElementById('resort-invalid-email-address-div').style.display = 'none';
            document.getElementById('resort-div-to-hide').style.display='block';
            return true; 
        } 
        else 
        {
            // console.log('false');
            document.getElementById('resort-div-to-hide').style.display='none';
            document.getElementById('resort-invalid-email-address-div').style.display = 'block';
            return false; 
        }
}

function Validate_Date_Input (DateInputId)
{
    let DateInput = document.getElementById(DateInputId).value;
    let date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
    // month/date/year
    // let date_regex = (0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20/g;
    if (!(date_regex.test(DateInput))) 
    {
        console.log("false")
        return false;
    }
    else 
    {
        console.log("true")
        return true
    }
}




function Open_Booking_Pop_Up_Window_Single_Service (servicename)
{
    let datedate_obj = new Date();
    let datedate = datedate_obj.toLocaleString('de-DE').replace('.','/').replace('.','/').replace(',',' ');
    // console.log (datedate) // 2/8/2021  04:13:09 format 2.8.2021 by /
    let fulldate = datedate.slice(0,10); // remove the time  04:13:09

    document.getElementById('date-input').value = fulldate;
    default_service_name_input = document.getElementById('default-service-name');
    default_service_name_input.value = servicename;
    document.getElementById('id01').style.display='block';
}

function Display_Customer_Booking_Details ()
{
// Check_For_Empty_Input ()
    let fname = document.getElementById("fname").value;
    let lname = document.getElementById("lname").value;
    let contact = document.getElementById("contact").value;
    let email = document.getElementById("email-input").value;

    if (fname == ""||lname == ""||contact == ""||email == "") 
        {document.getElementById("id080").style.display='block';return false;}
    else{DisplayBookingDetails (); return true;}
}

function DisplayBookingDetails ()
{
    document.getElementById('id02').style.display='block';
    let customer_display_area = document.getElementById('customer-details-display');
    let booking_display_area = document.getElementById('booking-details-display');
    // get all form inputs values...
    let inputvalues = document.getElementById('booking-form').elements;
    let data_array = [];

    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }

    // console.log(data_array);
    let  bookdate = data_array[0]
    let fname= data_array[1];
    let lname= data_array[2];
    let contact = data_array[3];
    let email = data_array[4];
    let fullname = fname+' '+ lname;

    booking_details = data_array.splice(5); // by deleting the firs 3 elements
    customer_details_string = '<br>'+fullname+'<br>'+ contact +'<br>'+ email+'<br>'+bookdate+'<br>';
    booking_details_string = booking_details.join(" ",' ')

    customer_display_area.innerHTML = "";
    booking_display_area.innerHTML = "";
    customer_display_area.innerHTML = customer_details_string;
    booking_display_area.innerHTML = booking_details_string;
}

function Animate_Booking_And_Submit_Customer_Details ()
{
    document.getElementById('id03').style.display='block';
    Submit_Customer_Booking_Details ()
    setTimeout(Display_Server_Feedback_Window,5000);
}
function Display_Server_Feedback_Window () 
{
    document.getElementById('id03').style.display='none';
    document.getElementById('id04').style.display='block';
}
function Submit_Customer_Booking_Details ()
{
    // get all form inputs values...
    let inputvalues = document.getElementById('booking-form').elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    $.post(booking_url,{data_array:data_array},
            function (response)
                {
                    document.getElementById('id01').style.display='none';
                    document.getElementById('id02').style.display='none';
                    response_display = document.getElementById('server-feedback-display');
                    response_display.innerHTML = response
                    Clear_All_Form_Inputs();
                }
            );
}

function Clear_All_Form_Inputs ()
{
    document.getElementById('booking-form').reset(); // form reset
    document.getElementById('customer-details-display').innerHTML = '';
    document.getElementById('booking-details-display').innerHTML = '';
}


/**
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * 
 *                      ROOMS PAGE
 * 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */

// function Open_Rooms_Booking_Pop_Up_Window (modelid,tabscreename,hotelroomnumberid,pricetaglabelid,defaulthotelplaceinputid,defaulthotelroomnumberinputid,defaulthotelcostinputid)
function Open_Rooms_Booking_Pop_Up_Window (modelid)
{
    // values
    // room_roomnumber = document.getElementById(hotelroomnumberid).innerText;
    // room_price = document.getElementById(pricetaglabelid).innerText;

    // console.log(room_roomnumber);
    // console.log(room_price);

    // inputs .....
    // default_place_input = document.getElementById(defaulthotelplaceinputid);
    // default_room_number_input = document.getElementById(defaulthotelroomnumberinputid);
    // default_room_cost_input = document.getElementById(defaulthotelcostinputid);

    // default_place_input.value = tabscreename
    // default_room_number_input.value = room_roomnumber;
    // default_room_cost_input.value = room_price;
    document.getElementById(modelid).style.display='block';
}


/**
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * 
 *                      Contacts Pop up
 * 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */

function Animate_And_Submit_Customer_Massege ()
{
    document.getElementById('id03').style.display='block';
    Submit_Customer_Message ();
    setTimeout(Display_Server_Feedback_Window_On_Message,5000)
}

function Display_Server_Feedback_Window_On_Message ()
{
    document.getElementById('id03').style.display='none';
    document.getElementById("id030").style.display='block';
}
function Submit_Customer_Message ()
{
    // get all form inputs values...
    let inputvalues = document.getElementById('contact-form').elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    $.post(message_url,{data_array:data_array},
            function (response)
                {
                    console.log(response);
                    document.getElementById('id02').style.display='none';
                    response_display = document.getElementById('server-feedback-display');
                    response_display.innerHTML = response
                    document.getElementById('contact-form').reset();
                }
            );
}
/**
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * 
 *                      Gardens Page
 * 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */
