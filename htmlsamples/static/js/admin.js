let python_url = "http://127.0.0.1:6060/";

// let booking_status_url = "http://localhost/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingStatusEndpoint";
// let booking_references_url = "http://localhost/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingReferencesEndpoint";
// let booking_details_url = "http://localhost/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingDetailsEndpoint";
// let update_booking_details_url = "http://localhost/adrace-dir/adrace-php/routes_request.php/PostUpdateCustomerBookingDetailsEndpoint";
// var members_url = "http://localhost/sjmda-dir/sjmda-php/routes_outgoing.php/AdminGetMembersEndpoint";






let booking_status_url = "http://178.79.182.213/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingStatusEndpoint";
let booking_references_url = "http://178.79.182.213/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingReferencesEndpoint";
var members_url = "http://178.79.182.213/sjmda-dir/sjmda-php/routes_outgoing.php/AdminGetMembersEndpoint";

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


let customer_order_references;
function LoadCustomerBookingReferencesFromServer (html_id)
{
    let menu_options_req = new XMLHttpRequest ();
    menu_options_req.open('post' ,booking_references_url,true);
    menu_options_req.onload = function ()
        {
            // console.log(this.responseText);
            let names = JSON.parse(this.responseText);
            // console.log("name:"+names)
            // console.log("name:"+names.length)
            let html_select_input = document.getElementById(html_id);
            for (index in names)
                {html_select_input.options[html_select_input.options.length] = new Option(names[index],index);}
        }
    let selecte_names = document.getElementById(html_id);
    menu_options_req.send(selecte_names);
}

function Update_Customer_Selected_Details ()
{
    let req = new XMLHttpRequest();
        req.open('post', update_booking_details_url,true)
        req.onload = function ()
            {
                console.log(this.responseText)
                let results = JSON.parse(this.responseText);
                console.log(results)
                if (! results || !results.length)
                    {
                        alert("No results found")
                        // console.log(results)
                    }
                else
                    {
                        console.log("results")
                        // console.log(results)
                        // document.getElementById("customer-id").innerHTML = results[0][0]
                        // // document.getElementById("selected-id").innerHTML = results[0][2]
                        // document.getElementById("customer-name").innerHTML = results[0][1]
                        // document.getElementById("customer-contact").innerHTML = results[0][2]
                        // document.getElementById("customer-email").innerHTML = results[0][3]
                        // document.getElementById("customer-booking-date").innerHTML = results[0][4]
                        // document.getElementById("customer-booking-details").innerHTML = results[0][5]

                    }
            }
        let myform = new FormData (document.getElementById('customer-details-form'));
        req.send(myform);
        document.getElementById("customer-selected-details-div-id").style.display='block';
}



function CreateCustomerBookingDynamicStatusTable () 
{
    
    let req = new XMLHttpRequest();
    req.open('post', booking_status_url,true)
    req.onload = function ()
        {
            let results = JSON.parse(this.responseText);
            console.log(results)
            if (! results || !results.length)
                {
                    alert("No results found")
                }
            else
                {
                    // console.log(results)
                    let table = document.getElementById("status-table-data-id");
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
        let div_tag = document.getElementById('status-table-div-request-id');
        req.send(div_tag);
}


function Fetch_Customer_Selected_Details ()
{
    let req = new XMLHttpRequest();
        req.open('post', booking_details_url,true)
        req.onload = function ()
            {
                console.log(this.responseText)
                let results = JSON.parse(this.responseText);
                console.log(results)
                if (! results || !results.length)
                    {
                        alert("No results found")
                        // console.log(results)
                    }
                else
                    {
                        // console.log("results")
                        // console.log(results)
                        document.getElementById("customer-id").innerHTML = results[0][0]
                        // document.getElementById("selected-id").innerHTML = results[0][2]
                        document.getElementById("customer-name").innerHTML = results[0][1]
                        document.getElementById("customer-contact").innerHTML = results[0][2]
                        document.getElementById("customer-email").innerHTML = results[0][3]
                        document.getElementById("customer-booking-date").innerHTML = results[0][4]
                        document.getElementById("customer-booking-details").innerHTML = results[0][5]
                    }
            }
        let myform = new FormData (document.getElementById('customer-details-form'));
        req.send(myform);
        document.getElementById("customer-selected-details-div-id").style.display='block';
}

function Approve_Customer_Booking ()
{
    let id = document.getElementById("customer-id").innerText;
    let name = document.getElementById("customer-name").innerText;
    let contact = document.getElementById("customer-contact").innerText;
    let email = document.getElementById("customer-email").innerText;
    let date = document.getElementById("customer-booking-date").innerText;

    document.getElementById("customer-popup-id").value = id;
    document.getElementById("customer-popup-name").innerHTML = name;
    document.getElementById("customer-popup-contact").innerHTML = contact;
    document.getElementById("customer-popup-email").innerHTML = email;
    document.getElementById("customer-popup-booking-date").innerHTML = date;
    document.getElementById('id01').style.display='block';

}

// function CreateDynamicCustomerDeliveryDetails (results)
// {
//     for (i=0;i<results.length;i++)
//     {
//         // re.DRIVER,re.CUSTOMERNAME,re.CAKENAME,re.ORDERNO,re.DESTINATION

//     let HtmlDiv = document.getElementById("view-feedbacks-div");
//     let DivContainer = document.createElement('div');
//     let Driver_Name_Label = document.createElement('label');
//     let Driver_Name_Results_Label = document.createElement('label');
//     let Customer_Name_Label = document.createElement('label');
//     let Customer_Name_Results_Label = document.createElement('label');
//     let Cake_Name_Label = document.createElement('label');
//     let Cake_Name_Results_Label = document.createElement('label');
//     let Reference_Name_Label = document.createElement('label');
//     let Reference_Name_Results_Label = document.createElement('label');
//     let Destination_Name_Label = document.createElement('label');
//     let Destination_Name_Results_Label = document.createElement('label');
    
    

//     // Set attributs ...
//     Driver_Name_Label.setAttribute('class','');
//     Driver_Name_Results_Label.setAttribute('id','date-results-label');
//     Customer_Name_Label.setAttribute('class','');
//     Customer_Name_Results_Label.setAttribute('id','feedback-results-label')
//     Cake_Name_Label.setAttribute('class','')
//     Cake_Name_Results_Label.setAttribute('id','response2-results-label')
//     Reference_Name_Results_Label.setAttribute('id','reference-results-label')
//     Destination_Name_Results_Label.setAttribute('id','destination-results-label')

//     // Create text
//     Driver_Name_Label.innerHTML = "<b>Driver Name:<br></b>"
//     Driver_Name_Results_Label.innerHTML = results[i][0] + "<br>"
//     Customer_Name_Label.innerHTML = "<b>Customer Name:<br></b>"
//     Customer_Name_Results_Label.innerHTML = results[i][1]+"<br>"
//     Cake_Name_Label.innerHTML = "<b>Cake Name:<br></b>"
//     Cake_Name_Results_Label.innerHTML = results[i][2] + "<br><br>"
//     Reference_Name_Label.innerHTML = "<b>Reference:<br></b>"
//     Reference_Name_Results_Label.innerHTML = results[i][3] + "<br><br>"
//     Destination_Name_Label.innerHTML = "<b>Delivery Point:<br></b>"
//     Destination_Name_Results_Label.innerHTML = results[i][4] + "<br><br>"


//     // appendChild to ....
//     Destination_Name_Label.appendChild(Destination_Name_Results_Label);
//     Reference_Name_Results_Label.appendChild(Destination_Name_Label);
//     Reference_Name_Label.appendChild(Reference_Name_Results_Label);
//     Cake_Name_Results_Label.appendChild(Reference_Name_Label);
//     Cake_Name_Label.appendChild(Cake_Name_Results_Label);
//     Customer_Name_Results_Label.appendChild(Cake_Name_Label);
//     Customer_Name_Label.appendChild(Customer_Name_Results_Label)
//     Driver_Name_Results_Label.appendChild(Customer_Name_Label);
//     Driver_Name_Label.appendChild(Driver_Name_Results_Label);
//     DivContainer.appendChild(Driver_Name_Label);
//     HtmlDiv.appendChild(DivContainer);
//     }
// }

// function Fetch_Bakery_Customer_Deliveries_Data ( endpoint)
// {
//     let req = new XMLHttpRequest();
//         req.open('post', src_url+endpoint,true)
//         req.onload = function ()
//             {
//                 let results = JSON.parse(this.responseText);
//                 if (! results || !results.length)
//                     {
//                         alert("No results found")
//                         // console.log(results)
//                     }
//                 else {CreateDynamicCustomerDeliveryDetails (results) }
//             }
//         let htmldiv = document.getElementById('view-feedbacks-div');
//         req.send(htmldiv);
// }


function Show_Members_Data ()
{
    // document.getElementById("admin-username-details-view-id").style.display = "none";
    // document.getElementById("admin-member-details-view-id").style.display = "none";
    // document.getElementById("admin-members-view-id").style.display = "block";
    $(".member-update-delete-btns").show();
    document.getElementById('members-tbody').innerHTML = '';
    $.ajax({
            url:members_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                            '</tr>';
                $('#members-table tbody').append(thead); 
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let NAME = response[i].NAME; 
                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                "</tr>"
                                
                $('#members-table tbody').append(tablerow);
                }
            }

            });
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