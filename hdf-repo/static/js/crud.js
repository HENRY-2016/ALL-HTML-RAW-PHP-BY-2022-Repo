

var seconds = 1000;
// var admin_add_items = "http://10.42.0.1/hdf-dir/hdf-php/routes_incoming.php/AdminAddItemEndPoint";
// var admin_edit_items = "http://10.42.0.1/hdf-dir/hdf-php/routes_incoming.php/AdminUpdateItemEndPoint";
// var admin_delete_items = "http://10.42.0.1/hdf-dir/hdf-php/routes_incoming.php/AdminDeleteItemEndPoint";
// var admin_view_item_names = "http://10.42.0.1/hdf-dir/hdf-php/routes_incoming.php/AdminViewItemNamesEndPoint";
// var admin_view_oldname_to_edit = "http://10.42.0.1/hdf-dir/hdf-php/routes_incoming.php/AdminViewItemNameToUpdateEndPoint";
// var booking_status_url = "http://10.42.0.1/hdf-dir/payments/routes_request.php/GetCustomersBookingStatusEndpoint";
// var booking_references_url = "http://10.42.0.1/hdf-dir/payments/routes_request.php/GetCustomersBookingReferencesEndpoint";
// var booking_details_url = "http://10.42.0.1/hdf-dir/payments/routes_request.php/GetCustomersBookingDetailsEndpoint";
// var payments_status_url = "http://10.42.0.1/hdf-dir/payments/routes_request.php/GetCustomerPaymentsStatusEndpoint";
// var payments_references_url = "http://10.42.0.1/hdf-dir/payments/routes_request.php/GetCustomerPaymentsReferencesEndpoint";
// var payments_details_url = "http://10.42.0.1/hdf-dir/payments/routes_request.php/GetCustomerPaymentsDetailsEndpoint";


var admin_add_items = "https://mogahenze.com/hdf-dir/hdf-php/routes_incoming.php/AdminAddItemEndPoint";
var admin_edit_items = "https://mogahenze.com/hdf-dir/hdf-php/routes_incoming.php/AdminUpdateItemEndPoint";
var admin_delete_items = "https://mogahenze.com/hdf-dir/hdf-php/routes_incoming.php/AdminDeleteItemEndPoint";
var admin_view_item_names = "https://mogahenze.com/hdf-dir/hdf-php/routes_incoming.php/AdminViewItemNamesEndPoint";
var admin_view_oldname_to_edit = "https://mogahenze.com/hdf-dir/hdf-php/routes_incoming.php/AdminViewItemNameToUpdateEndPoint";
var booking_status_url = "https://mogahenze.com/hdf-dir/payments/routes_request.php/GetCustomersBookingStatusEndpoint";
var booking_references_url = "https://mogahenze.com/hdf-dir/payments/routes_request.php/GetCustomersBookingReferencesEndpoint";
var booking_details_url = "https://mogahenze.com/hdf-dir/payments/routes_request.php/GetCustomersBookingDetailsEndpoint";
var payments_status_url = "https://mogahenze.com/hdf-dir/payments/routes_request.php/GetCustomerPaymentsStatusEndpoint";
var payments_references_url = "https://mogahenze.com/hdf-dir/payments/routes_request.php/GetCustomerPaymentsReferencesEndpoint";
var payments_details_url = "https://mogahenze.com/hdf-dir/payments/routes_request.php/GetCustomerPaymentsDetailsEndpoint";

/*
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @
    @           View Orders item....
    @
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
*/
let customer_booking_references;
function LoadCustomerBookingReferencesFromServer ()
{
    let customer_booking_references_req = new XMLHttpRequest ();
    customer_booking_references_req.open('get',booking_references_url,true);
    customer_booking_references_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            customer_booking_references = results
            console.log(customer_booking_references)
        }
        customer_booking_references_req.send();
}


let customer_payments_references;
function LoadCustomerPaymentsReferencesFromServer ()
{
    let customer_payments_references_req = new XMLHttpRequest ();
    customer_payments_references_req.open('get',payments_references_url,true);
    customer_payments_references_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            customer_payments_references = results
        }
        customer_payments_references_req.send();
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


function Fetch_Customer_Selected_Details (urlendpoint, customerid,customername,customercontact,customeremail,customerbookingmethod,customerbookingdate,customerbookingdetails,customerdetailsform,customerselecteddetailsdivid)
{
    let req = new XMLHttpRequest();
        req.open('post', urlendpoint,true)
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
                        document.getElementById(customerbookingmethod).innerHTML = results[0][4]
                        document.getElementById(customerbookingdate).innerHTML = results[0][5]
                        document.getElementById(customerbookingdetails).innerHTML = results[0][6]
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


/*
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @
    @           Upload items....
    @
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
*/
function SubmitAdminItemsUploads (htmlform,endpointurl,feedbackdiv)
{
        const my_form = document.getElementById(htmlform);
        my_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post",endpointurl);
            request.onload = function ()
            {
                console.log(request.responseText);
                let feedback = JSON.parse(request.responseText); 
                
                document.getElementById(feedbackdiv).innerHTML = feedback.message;
                my_form.reset();
                // let img = document.getElementById("back-side-display-pra-id");
                // img.parentNode.removeChild(img);

            }
            request.send(new FormData(my_form))
        });
}

function SubmitAdminItemsUploadsWithoutImage (htmlform,endpointurl,feedbackdiv)
{
    const my_form = document.getElementById(htmlform);
    my_form.addEventListener("submit",(event) => {
        event.preventDefault();
        const request = new  XMLHttpRequest ();

        request.open ("post",endpointurl);
        request.onload = function ()
        {
            let feedback = JSON.parse(request.responseText); 
            document.getElementById(feedbackdiv).innerHTML = feedback.message;
            my_form.reset();
        }
        request.send(new FormData(my_form))
    });
}
function ClearResponseDiv (feedbackdiv)
{document.getElementById(feedbackdiv).innerHTML = '';}



/*
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @
    @           Edit items....
    @
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
*/
function SubmitAdminViewItemsToEdite (htmlform,htmltbody,selectedtypename,itemnameinputtype)
{
        const my_form = document.getElementById(htmlform);
        my_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post",admin_view_item_names);
            request.onload = function ()
            {
                let results = JSON.parse(request.responseText); 
            DrawDynamicTabel (htmltbody,results,selectedtypename,itemnameinputtype);
            }
            request.send(new FormData(my_form))
        });
    
}

    // ==================
function DrawDynamicTabel (avenuetbody,results,SelectedTypeName,item_name_input_type)
{
    let tbody = document.getElementById(avenuetbody);
    tbody.innerHTML = ' ';
    // draw table
    let td,tr;
    // add table headings
    let th_names = new Array ();
    th_names.push(["Key","Name"]);
    let columns_to_count = th_names[0].length;
    row = tbody.insertRow(-1); 
    for (let looper =0; looper<columns_to_count; ++looper)
    {
        let headerNames = document.createElement("th");
        headerNames.className='js_table_headers'
        headerNames.innerHTML = th_names[0][looper];
        row.appendChild(headerNames)
    }
    for (let table_row = 0; table_row < results.length; ++table_row)
    {
        tr = document.createElement('tr');
        tr.className='js_table_row';
        for (let table_data = 0; table_data< (results[table_row].length);++table_data)
            {
                td = document.createElement('td');
                td.setAttribute("align", "center"); 
                td.innerHTML = results[table_row][table_data];
                tr.appendChild(td)
            }
            tbody.appendChild(tr)
    }
    setTimeout(AssignLabelToSelectedTypeInput (SelectedTypeName,item_name_input_type), seconds)
}

function AssignLabelToSelectedTypeInput (SelectedTypeName,item_name_input_type)
{
    selectedtypename = document.getElementById(SelectedTypeName).value;
    document.getElementById(item_name_input_type).value = selectedtypename;
}

function SubmitAdminViewItemOldName (htmlform,idname)
{
        const my_form = document.getElementById(htmlform,);
        my_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post",admin_view_oldname_to_edit);
            request.onload = function ()
            {
                let results = JSON.parse(request.responseText); 
                document.getElementById(idname).value = results[0];
            }
            request.send(new FormData(my_form))
        });
    
}













function Fetch_All_Staffs (endpoit,avenuetbody,avenuetbodydiv)
{
    let req = new XMLHttpRequest();
    req.open('post', edit_url+endpoit,true)
    req.onload = function ()
        {
            let results = JSON.parse(this.responseText);
            if (! results || !results.length){alert("No results found")}
            else
                {
                    let tbody = document.getElementById(avenuetbody);
                    tbody.innerHTML = ' ';

                    // draw table
                    let td,tr;
                    // add table headings
                    let th_names = new Array ();
                    th_names.push(["Key","Name","Number"]);
                    let columns_to_count = th_names[0].length;
                    row = tbody.insertRow(-1); 
                    for (let looper =0; looper<columns_to_count; ++looper)
                        {
                            let headerNames = document.createElement("th");
                            headerNames.className='js_table_headers'
                            headerNames.innerHTML = th_names[0][looper];
                            row.appendChild(headerNames)
                        }

                    for (let table_row = 0; table_row < results.length; ++table_row)
                        {
                            tr = document.createElement('tr');
                            tr.className='js_table_row';
                            for (let table_data = 0; table_data< (results[table_row].length);++table_data)
                                {
                                    td = document.createElement('td');
                                    td.setAttribute("align", "center"); 
                                    td.innerHTML = results[table_row][table_data];
                                    tr.appendChild(td)
                                }
                                tbody.appendChild(tr)
                        }
                }
        }
        let div_tag = document.getElementById(avenuetbodydiv);
        req.send(div_tag);  
}

function Hide_all_Admin_Divs ()
{
    // MAINS
    document.getElementById("add-menu-panel-div").style.display="none";
    document.getElementById("edit-menu-panel-div").style.display="none";
    document.getElementById("delete-menu-panel-div").style.display="none";
}
// STAFFS 
function Show_staffs_add_div_id ()
{
    document.getElementById("staffs-delete-div-id").style.display = "none";
    document.getElementById("staffs-add-div-id").style.display = "block";
}

function Show_staffs_delete_div_id ()
{
    document.getElementById("staffs-add-div-id").style.display = "none";
    document.getElementById("staffs-delete-div-id").style.display = "block";
}


// MENU ...........
function Show_add_menu_panel_div ()
{
    document.getElementById("edit-menu-panel-div").style.display = "none";
    document.getElementById("delete-menu-panel-div").style.display = "none";    
    document.getElementById("add-menu-panel-div").style.display = "block";
}
function Show_edit_menu_panel_div ()
{
    document.getElementById("add-menu-panel-div").style.display = "none";
    document.getElementById("delete-menu-panel-div").style.display = "none";    
    document.getElementById("edit-menu-panel-div").style.display = "block";
}
function Show_delete_menu_panel_div ()
{
    document.getElementById("edit-menu-panel-div").style.display = "none";
    document.getElementById("add-menu-panel-div").style.display = "none";    
    document.getElementById("delete-menu-panel-div").style.display = "block";
}




// ====================================================================
// MENU ADD

function Show_add_boxes_div_id ()
{
    document.getElementById("add-baskets-div-id").style.display = "none";
    document.getElementById("add-funeral-div-id").style.display = "none";
    document.getElementById("add-boxes-div-id").style.display = "block";
}
function Show_add_baskets_div_id ()
{
    document.getElementById("add-boxes-div-id").style.display = "none";
    document.getElementById("add-funeral-div-id").style.display = "none";
    document.getElementById("add-baskets-div-id").style.display = "block";
}

function Show_add_funeral_div_id ()
{
    document.getElementById("add-boxes-div-id").style.display = "none";
    document.getElementById("add-baskets-div-id").style.display = "none";
    document.getElementById("add-funeral-div-id").style.display = "block";
}



// ====================================================================
// MENU EDIT

function Show_edit_boxes_div_id ()
{

    document.getElementById("edit-baskets-div-id").style.display = "none";
    document.getElementById("edit-funeral-div-id").style.display = "none";
    document.getElementById("edit-boxes-div-id").style.display = "block";
}
function Show_edit_baskets_div_id ()
{

    document.getElementById("edit-boxes-div-id").style.display = "none";
    document.getElementById("edit-funeral-div-id").style.display = "none";
    document.getElementById("edit-baskets-div-id").style.display = "block";
}

function Show_edit_funeral_div_id ()
{

    document.getElementById("edit-boxes-div-id").style.display = "none";
    document.getElementById("edit-baskets-div-id").style.display = "none";
    document.getElementById("edit-funeral-div-id").style.display = "block";
}



// ====================================================================
// MENU DELETE

function Show_delete_boxes_div_id ()
{

    document.getElementById("delete-baskets-div-id").style.display = "none";
    document.getElementById("delete-funeral-div-id").style.display = "none";
    document.getElementById("delete-boxes-div-id").style.display = "block";
}

function Show_delete_baskets_div_id ()
{
    document.getElementById("delete-boxes-div-id").style.display = "none";
    document.getElementById("delete-funeral-div-id").style.display = "none";
    document.getElementById("delete-baskets-div-id").style.display = "block";
}

function Show_delete_funeral_div_id ()
{
    document.getElementById("delete-boxes-div-id").style.display = "none";
    document.getElementById("delete-baskets-div-id").style.display = "none";
    document.getElementById("delete-funeral-div-id").style.display = "block";
}


// const form = document.getElementById("register-form");
//     register_form.addEventListener("submit",(event) => {
//         event.preventDefault();

//         // console.log("Form has been submitted...");
//     const request = new  XMLHttpRequest ();
//     request.open ("post", "login.php");
//     request.onload = function ()
//     {
//         console.log(request.responseText);

//     }
//     request.send(new FormData(register_form))
//     });










































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