
let booking_status_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingStatusEndpoint";
let vistors_status_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetVistorsStatusDetailsEndpoint";
let booking_references_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingReferencesEndpoint";
let vistors_references_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetVistorsReferencesEndpoint";
let booking_details_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingDetailsEndpoint";
let vistors_details_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetVistorsBookingDetailsEndpoint";
let update_booking_details_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/PostUpdateCustomerBookingDetailsEndpoint";
let update_feedback_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/PostUpdateMessagesTableEndpoint";
let message_status_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetCustomerMessageStatusEndpoint";
let feedback_status_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetFeedbackStatusDetailsEndpoint";
let new_message_references_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetNewMassegesReferencesStatusEndpoint";
let feedback_references_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetFeedBackReferencesEndpoint";
let new_message_details_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetNewMessageDetailsEndpoint";
let feedback_details_url = "http://10.42.0.1/adrace-dir/adrace-php/routes_request.php/GetFeedBackDetailsEndpoint";






// let booking_status_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingStatusEndpoint";
// let vistors_status_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetVistorsStatusDetailsEndpoint";
// let booking_references_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingReferencesEndpoint";
// let vistors_references_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetVistorsReferencesEndpoint";
// let booking_details_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingDetailsEndpoint";
// let vistors_details_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetVistorsBookingDetailsEndpoint";
// let update_booking_details_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/PostUpdateCustomerBookingDetailsEndpoint";
// let update_feedback_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/PostUpdateMessagesTableEndpoint";
// let message_status_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetCustomerMessageStatusEndpoint";
// let feedback_status_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetFeedbackStatusDetailsEndpoint";
// let new_message_references_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetNewMassegesReferencesStatusEndpoint";
// let feedback_references_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetFeedBackReferencesEndpoint";
// let new_message_details_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetNewMessageDetailsEndpoint";
// let feedback_details_url = "https://mogahenze.com/adrace-dir/adrace-php/routes_request.php/GetFeedBackDetailsEndpoint";


function Load_Admin_Booking_Page ()
{
    // window.location="admin_booking.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/admin_booking.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id070').style.display='block';},
        success: function () {window.location=page_url;}
    });
}

function Load_Admin_Messages_Page ()
{
    // window.location="admin_messages.html";
    let page_url = "https://mogahenze.com/adrace-dir/adrace-repo/admin_messages.html";
    $.ajax({
        url:page_url,
        timeout:1000,
        error: function (request)
            {if(request.status==0)document.getElementById('id070').style.display='block';},
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


let customer_booking_references;
function LoadCustomerBookingReferencesFromServer ()
{
    let customer_booking_references_req = new XMLHttpRequest ();
    customer_booking_references_req.open('get',booking_references_url,true);
    customer_booking_references_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            customer_booking_references = results
        }
        customer_booking_references_req.send();
}

let new_message_reference;
function LoadNewMassegesReferencesFromServer ()
{
    let new_message_reference_req = new XMLHttpRequest ();
    new_message_reference_req.open('get',new_message_references_url,true);
    new_message_reference_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            new_message_reference = results
        }
        new_message_reference_req.send();
}

let feedback_reference;
function LoadCustomeFeedBackReferencesFromServer ()
{
    let feedback_reference_req = new XMLHttpRequest ();
    feedback_reference_req.open('get',feedback_references_url,true);
    feedback_reference_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            feedback_reference = results
        }
        feedback_reference_req.send();
}

let vistors_booking_references;
function LoadVistorsBookingReferencesFromServer ()
{
    let vistors_booking_references_req = new XMLHttpRequest ();
    vistors_booking_references_req.open('get',vistors_references_url,true);
    vistors_booking_references_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            vistors_booking_references = results
        }
        vistors_booking_references_req.send();
}




function CreateCustomerBookingDynamicStatusTable (urlendpoint,htmlid,statusdivtag) 
{
    // tablestatus_to_clear = document.getElementById(tablestatus);
    // tablestatus_to_clear.innerHTML = " "; //clear table data fst
    let req = new XMLHttpRequest();
    req.open('post',urlendpoint,true)
    // console.log(booking_status_url);
    req.onload = function ()
        {
            let results = JSON.parse(this.responseText);
            if (! results || !results.length)
                {document.getElementById("id020").style.display="block";}
            else
                {
                    let table = document.getElementById(htmlid);
                    let rowCount = table.rows.length;

                    for (i=0;i<results.length;i++)
                        {
                            let row = table.insertRow(rowCount);
                            row.className='status-table-tr';
                            row.insertCell(0).innerHTML= '<label class="status-table-td"> '+ results[i][0] +'</label>';
                            row.insertCell(1).innerHTML= '<label class="status-table-td"> '+ results[i][1] +'</label>';
                            row.insertCell(2).innerHTML= '<label class="status-table-td"> '+ results[i][2] +'</label>';
                        }
                }
                
        }
        let div_tag = document.getElementById(statusdivtag);
        req.send(div_tag);
}

// function loaddata () 
// {
//     console.log("clicked....")
//     $.get(booking_status_url, function(data, status){
//     alert("Data: " + data + "\nStatus: " + status);
//     });
// }

function Fetch_Customer_Selected_Details (customerid,customername,customercontact,customeremail,customerbookingdate,customerbookingdetails,customerdetailsform,customerselecteddetailsdivid)
{
    let req = new XMLHttpRequest();
        req.open('post', booking_details_url,true)
        req.onload = function ()
            {
                let results = JSON.parse(this.responseText);
                if (! results || !results.length)
                    {document.getElementById("id020").style.display="block";}
                else
                    {
                        document.getElementById(customerid).innerHTML = results[0][0]
                        document.getElementById(customername).innerHTML = results[0][1]
                        document.getElementById(customercontact).innerHTML = results[0][2]
                        document.getElementById(customeremail).innerHTML = results[0][3]
                        document.getElementById(customerbookingdate).innerHTML = results[0][4]
                        document.getElementById(customerbookingdetails).innerHTML = results[0][5]
                    }
            }
        let myform = new FormData (document.getElementById(customerdetailsform));
        req.send(myform);
        document.getElementById(customerselecteddetailsdivid).style.display='block';
}
function Fetch_New_Message_Selected_Details (urlendpoint,customerid,customername,customercontact,customerbookingdate,customerbookingdetails,customerdetailsform,customerselecteddetailsdivid)
{
    let req = new XMLHttpRequest();
        req.open('post',urlendpoint,true)
        req.onload = function ()
            {
                let results = JSON.parse(this.responseText);
                if (! results || !results.length)
                    {document.getElementById("id020").style.display="block";}
                else
                    {
                        document.getElementById(customerid).innerHTML = results[0][0]
                        document.getElementById(customername).innerHTML = results[0][1]
                        document.getElementById(customercontact).innerHTML = results[0][2]
                        // document.getElementById(customeremail).innerHTML = results[0][3]
                        document.getElementById(customerbookingdate).innerHTML = results[0][3]
                        document.getElementById(customerbookingdetails).innerHTML = results[0][4]
                    }
            }
        let myform = new FormData (document.getElementById(customerdetailsform));
        req.send(myform);
        document.getElementById(customerselecteddetailsdivid).style.display='block';
}

function Approve_Customer_Booking ()
{
    let id = document.getElementById("customer-id-tab-1").innerText;
    let name = document.getElementById("customer-name-tab-1").innerText;
    let contact = document.getElementById("customer-contact-tab-1").innerText;
    let email = document.getElementById("customer-email-tab-1").innerText;
    let date = document.getElementById("customer-booking-date-tab-1").innerText;

    document.getElementById("customer-popup-id").value = id;
    document.getElementById("customer-popup-name").innerHTML = name;
    document.getElementById("customer-popup-email").innerHTML = contact;
    document.getElementById("customer-popup-email").innerHTML = email;
    document.getElementById("customer-popup-booking-date").innerHTML = date;
    document.getElementById('id01').style.display='block';
}

function Approve_New_Massege ()
{
    let id = document.getElementById("customer-id-tab-1").innerText;
    let name = document.getElementById("customer-name-tab-1").innerText;
    let email = document.getElementById("customer-contact-tab-1").innerText;
    let massege = document.getElementById("customer-massege-tab-1").innerText;
    // let date = document.getElementById("customer-booking-date-tab-1").innerText;

    document.getElementById("customer-popup-id").value = id;
    document.getElementById("customer-popup-name").value = name;
    document.getElementById("customer-popup-email").value = email;
    document.getElementById("customer-popup-massege").innerHTML = massege;
    // document.getElementById("customer-popup-booking-date").innerHTML = date;
    document.getElementById('id01').style.display='block';
}


function Update_Customer_Selected_Details ()
{
    let req = new XMLHttpRequest();
        req.open('post', update_booking_details_url,true)
        req.onload = function ()
            {
                console.log(this.responseText)
                let feedback = this.responseText.trim(); 
                if (feedback !== 'Success')
                    {document.getElementById("id040").style.display = 'block';}
                else if (feedback === 'Success')
                    {document.getElementById("id030").style.display = 'block';}
            }
        let myform = new FormData (document.getElementById('customer-details-form-tab-1'));
        req.send(myform);
        document.getElementById("customer-selected-details-div-id-tab-1").style.display='block';
}

function Animate_Booking_And_Submit_Message_Updates ()
{
    document.getElementById('id03').style.display='block';
    Update_Massege_With_FeedBack_Details ()
    setTimeout(Display_Server_Message_Feedback_Window,5000)
}
function Display_Server_Message_Feedback_Window () 
{
    document.getElementById('feedback-form').reset();
    document.getElementById('id03').style.display='none';
    document.getElementById('id01').style.display='none';
    document.getElementById('id04').style.display='block';
}
function Update_Massege_With_FeedBack_Details ()
{
    let inputvalues = document.getElementById('feedback-form').elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    $.post(update_feedback_url,{data_array:data_array},
            function (response)
                {
                    // document.getElementById('id01').style.display='none';
                    // document.getElementById('id02').style.display='none';
                    response_display = document.getElementById('server-feedback-display');
                    response_display.innerHTML = response
                    
                    // Clear_All_Form_Inputs();
                }
            );

}







function autocomplete(inp, arr) 
{
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    console.log('autocomplete fun called...')
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) 
        {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) 
                {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) 
                    {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                            b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
        });
        

    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) 
        {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) 
                {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } 
            else if (e.keyCode == 38) 
            { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } 
            else if (e.keyCode == 13) 
            {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) 
                    {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
            }
        });

    function addActive(x) 
        {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
    function removeActive(x) 
        {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) 
                {
                    x[i].classList.remove("autocomplete-active");
                }
        }
    function closeAllLists(elmnt) 
        {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) 
                {
                    if (elmnt != x[i] && elmnt != inp) 
                    {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
        }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {closeAllLists(e.target);});
} 


