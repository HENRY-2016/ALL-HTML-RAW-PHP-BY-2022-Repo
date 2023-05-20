


// var create_instrument_url = "http://127.0.0.1/kelly/back-end/controller.php/AdminCreateInstrumentEndPoint";
// var create_admin_url =  "http://127.0.0.1/kelly/back-end/controller.php/AdminCreateAdminEndPoint";
// var create_manager_url = "http://127.0.0.1/kelly/back-end/controller.php/AdminCreateManagerEndPoint";

// var staffs_url = "http://127.0.0.1/kelly/back-end/controller.php/GetStaffsEndpoint";
// var admin_delete_user = "http://127.0.0.1/kelly/back-end/controller.php/AdminDeleteUserEndPoint";
// var admin_delete_event = "http://127.0.0.1/kelly/back-end/controller.php/AdminDeleteEventsEndPoint";
// var admin_delete_returns = "http://127.0.0.1/kelly/back-end/controller.php/AdminDeleteReturnsEndPoint";
// var admin_delete_payments = "http://127.0.0.1/kelly/back-end/controller.php/AdminDeletePaymentsEndPoint";
// var admin_delete_borrows = "http://127.0.0.1/kelly/back-end/controller.php/AdminDeleteBorrowsEndPoint";
// var admin_delete_instruments = "http://127.0.0.1/kelly/back-end/controller.php/AdminDeleteInstrumentsEndPoint";

var create_instrument_url = "http://176.58.115.77/kelly/back-end/controller.php/AdminCreateInstrumentEndPoint";
var create_admin_url =  "http://176.58.115.77/kelly/back-end/controller.php/AdminCreateAdminEndPoint";
var create_manager_url = "http://176.58.115.77/kelly/back-end/controller.php/AdminCreateManagerEndPoint";
var staffs_url = "http://176.58.115.77/kelly/back-end/controller.php/GetStaffsEndpoint";
var admin_delete_user = "http://176.58.115.77/kelly/back-end/controller.php/AdminDeleteUserEndPoint";
var admin_delete_event = "http://176.58.115.77/kelly/back-end/controller.php/AdminDeleteEventsEndPoint";
var admin_delete_returns = "http://176.58.115.77/kelly/back-end/controller.php/AdminDeleteReturnsEndPoint";
var admin_delete_payments = "http://176.58.115.77/kelly/back-end/controller.php/AdminDeletePaymentsEndPoint";
var admin_delete_borrows = "http://176.58.115.77/kelly/back-end/controller.php/AdminDeleteBorrowsEndPoint";
var admin_delete_instruments = "http://176.58.115.77/kelly/back-end/controller.php/AdminDeleteInstrumentsEndPoint";





var member_names
function Load_Sjmda_Member_Names ()
{
    let member_names_req = new XMLHttpRequest ();
    member_names_req.open('get',member_names_url,true);
    member_names_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            member_names = results
        }
        member_names_req.send();
}

var pledge_names
function Load_Sjmda_Pledge_Names ()
{
    let member_names_req = new XMLHttpRequest ();
    member_names_req.open('get',pledge_names_url,true);
    member_names_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            pledge_names = results
        }
        member_names_req.send();
}

function Log_Out_Admin () {window.location= admin_php_url+admin_php_pages_source_dir+'signout.php'}
function Load_Admin_Load_Users_Page () 
    {window.location= admin_php_url+admin_php_pages_source_dir+'register_user.php'}




function Admin_Create (htmlform,urlendpoint)
{
        const register_form = document.getElementById(htmlform);
        register_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", urlendpoint);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                console.log(feedback)
        
                document.getElementById('success-div').style.display = "block";
                document.getElementById('success-label-feedback').innerHTML=feedback;
                register_form.reset();
                
            }
            request.send(new FormData(register_form))
        });
}




//////////////////////////////////////////////////////////////////////////

function Show_Staff_Table_Data ()
{
    document.getElementById("events-id").style.display = "none";
    document.getElementById("borrows-id").style.display = "none";
    document.getElementById("payments-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "none";
    document.getElementById("returns-id").style.display = "none";
    document.getElementById("staffs-id").style.display = "block";

    document.getElementById("staffs-remove-btn").style.display = "block";
    document.getElementById("staffs-arrow-btn").style.display = "block";
    document.getElementById("staffs-print-btn").style.display = "block";
    document.getElementById('staffs-tbody').innerHTML = '';
    $.ajax({
            url:staffs_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                            '<th class="table-thead-th">'+'ID'+'</th>'+
                            '<th class="table-thead-th">'+'Name'+'</th>'+
                            '<th class="table-thead-th">'+'Contact'+'</th>'+
                            '<th class="table-thead-th">'+'Password'+'</th>'+

                            '</tr>';
                $('#staffs-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID;
                    let USERNAME = response[i].USERNAME;
                    let CONTACTS = response[i].CONTACTS;
                    let UPASSWORD = response[i].UPASSWORD

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" + 
                                    '<td class="table-row-td">'  +  USERNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  CONTACTS + "</td>" +
                                    '<td class="table-row-td">'  +  UPASSWORD + "</td>" +
                                "</tr>"
                $('#staffs-table tbody').append(tablerow);
                }
            }
            });
            document.getElementById('id01').style.display='none';
}

function Show_Admin_Events_Table_Data ()
{
    document.getElementById("staffs-id").style.display = "none";
    document.getElementById("returns-id").style.display = "none";
    document.getElementById("borrows-id").style.display = "none";
    document.getElementById("payments-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "none";
    document.getElementById("events-id").style.display = "block";

    document.getElementById("events-remove-btn").style.display = "block";
    document.getElementById("events-arrow-btn").style.display = "block";
    document.getElementById("events-print-btn").style.display = "block";
    document.getElementById('events-tbody').innerHTML = '';
    $.ajax({
            url:events_get_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                            '<th class="table-thead-th">'+'Number'+'</th>'+
                            '<th class="table-thead-th">'+'Name'+'</th>'+
                            '<th class="table-thead-th">'+'Place'+'</th>'+
                            '<th class="table-thead-th">'+'Date'+'</th>'+
                            '<th class="table-thead-th">'+'Amount'+'</th>'+
                            '<th class="table-thead-th">'+'Staff'+'</th>'+
                            '<th class="table-thead-th">'+'Details'+'</th>'+

                            '</tr>';
                $('#events-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID;
                    let ENAME = response[i].ENAME;
                    let EPLACE = response[i].EPLACE;
                    let EDATE = response[i].EDATE
                    let EAMOUNT = response[i].EAMOUNT
                    let ESTAFF = response[i].ESTAFF;
                    let EDETAILS = response[i].EDETAILS

                let tablerow = '<tr class="table-row">'+
                            '<td class="table-row-td">'  +  ID + "</td>" + 
                            '<td class="table-row-td">'  +  ENAME + "</td>" + 
                            '<td class="table-row-td">'  +  EPLACE + "</td>" +
                            '<td class="table-row-td">'  +  EDATE + "</td>" +
                            '<td class="table-row-td">'  +  EAMOUNT + "</td>" +
                            '<td class="table-row-td">'  +  ESTAFF + "</td>" +
                            '<td class="table-row-td">'  +  EDETAILS + "</td>" +
                                "</tr>"
                $('#events-table tbody').append(tablerow);
                }
            }
            });
            document.getElementById('id01').style.display='none';
}

function Show_Admin_Returns_Table_Data ()
{
    document.getElementById("staffs-id").style.display = "none";
    document.getElementById("events-id").style.display = "none";
    document.getElementById("borrows-id").style.display = "none";
    document.getElementById("payments-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "none";
    document.getElementById("returns-id").style.display = "block";

    document.getElementById("returns-remove-btn").style.display = "block";
    document.getElementById("returns-arrow-btn").style.display = "block";
    document.getElementById("returns-print-btn").style.display = "block";
    document.getElementById('returns-tbody').innerHTML = '';
    $.ajax({
            url:returns_get_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                        '<th class="table-thead-th">'+'Number'+'</th>'+
                        '<th class="table-thead-th">'+'From'+'</th>'+
                        '<th class="table-thead-th">'+'Date'+'</th>'+
                        '<th class="table-thead-th">'+'Staff'+'</th>'+
                        '<th class="table-thead-th">'+'Details'+'</th>'+

                            '</tr>';
                $('#returns-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID;
                    let STAFF = response[i].STAFF;
                    let RFROM = response[i].RFROM;
                    let RDATE = response[i].RDATE;
                    let EDETAILS = response[i].EDETAILS


                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" + 
                                    '<td class="table-row-td">'  +  RFROM + "</td>" + 
                                    '<td class="table-row-td">'  +  RDATE + "</td>" +
                                    '<td class="table-row-td">'  +  STAFF + "</td>" +
                                    '<td class="table-row-td">'  +  EDETAILS + "</td>" +

                                "</tr>"
                $('#returns-table tbody').append(tablerow);
                }
            }
            });
            document.getElementById('id01').style.display='none';
}


function Show_Admin_Borrows_Table_Data ()
{
    document.getElementById("staffs-id").style.display = "none";
    document.getElementById("events-id").style.display = "none";
    document.getElementById("returns-id").style.display = "none";
    document.getElementById("payments-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "none";
    document.getElementById("borrows-id").style.display = "block";

    document.getElementById("borrows-remove-btn").style.display = "block";
    document.getElementById("borrows-arrow-btn").style.display = "block";
    document.getElementById("borrows-print-btn").style.display = "block";
    document.getElementById('borrows-tbody').innerHTML = '';
    $.ajax({
            url:borrows_get_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                        '<th class="table-thead-th">'+'Number'+'</th>'+
                        '<th class="table-thead-th">'+'From'+'</th>'+
                        '<th class="table-thead-th">'+'Date'+'</th>'+
                        '<th class="table-thead-th">'+'Staff'+'</th>'+
                        '<th class="table-thead-th">'+'Details'+'</th>'+

                            '</tr>';
                $('#borrows-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID;
                    let STAFF = response[i].STAFF;
                    let RFROM = response[i].RFROM;
                    let RDATE = response[i].RDATE;
                    let EDETAILS = response[i].EDETAILS


                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" + 
                                    '<td class="table-row-td">'  +  RFROM + "</td>" + 
                                    '<td class="table-row-td">'  +  RDATE + "</td>" +
                                    '<td class="table-row-td">'  +  STAFF + "</td>" +
                                    '<td class="table-row-td">'  +  EDETAILS + "</td>" +

                                "</tr>"
                $('#borrows-table tbody').append(tablerow);
                }
            }
            });
            document.getElementById('id01').style.display='none';
}
/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ===========
 *              DELETE PAGE
 *              ===========
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/

// function DeleteUsernameData ()
function DeleteDataFunction (htmlform,endpointurl,feedbackdlabel,feedbackdiv)
{
        const form = document.getElementById(htmlform);
        form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", endpointurl);
            request.onload = function ()
            {
                let feedback = request.responseText; 
                console.log(feedback);
                document.getElementById(feedbackdlabel).innerText=feedback;
                document.getElementById(feedbackdiv).style.display='block';
                
            }
            request.send(new FormData(form))
        });
}



function Show_Admin_Payments_Table_Data ()
{
 
    document.getElementById("staffs-id").style.display = "none";
    document.getElementById("events-id").style.display = "none";
    document.getElementById("returns-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "none";
    document.getElementById("payments-id").style.display = "block";

    document.getElementById("payments-remove-btn").style.display = "block";
    document.getElementById("payments-arrow-btn").style.display = "block";
    document.getElementById("payments-print-btn").style.display = "block";
    document.getElementById('payments-tbody').innerHTML = '';
    $.ajax({
            url:payments_get_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                            '<th class="table-thead-th">'+'Number'+'</th>'+
                            '<th class="table-thead-th">'+'Event'+'</th>'+
                            '<th class="table-thead-th">'+'Payer'+'</th>'+
                            '<th class="table-thead-th">'+'Amount'+'</th>'+
                            '<th class="table-thead-th">'+'Date'+'</th>'+
                            '<th class="table-thead-th">'+'Staff'+'</th>'+

                            '</tr>';
                $('#payments-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID;
                    let STAFF = response[i].STAFF;
                    let PNAME = response[i].PNAME;
                    let PEVENT = response[i].PEVENT;
                    let PAMOUNT = response[i].PAMOUNT
                    let PDETA = response[i].PDETA


                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" + 
                                    '<td class="table-row-td">'  +  PEVENT + "</td>" +
                                    '<td class="table-row-td">'  +  PNAME + "</td>" +
                                    '<td class="table-row-td">'  +  PAMOUNT + "</td>" +
                                    '<td class="table-row-td">'  +  PDETA + "</td>" +
                                    '<td class="table-row-td">'  +  STAFF + "</td>" +

                                "</tr>"
                $('#payments-table tbody').append(tablerow);
                }
            }
            });
            document.getElementById('id01').style.display='none';
}




function Show_Admin_Instruments_Table_Data ()
{
    document.getElementById("staffs-id").style.display = "none";
    document.getElementById("events-id").style.display = "none";
    document.getElementById("returns-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "none";
    document.getElementById("instruments-id").style.display = "block";

    document.getElementById("instruments-remove-btn").style.display = "block";
    document.getElementById("instruments-arrow-btn").style.display = "block";
    document.getElementById("instruments-print-btn").style.display = "block";
    document.getElementById('instruments-tbody').innerHTML = '';
    $.ajax({
            url:instruments_get_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                        '<th class="table-thead-th">'+'Number'+'</th>'+
                        '<th class="table-thead-th">'+'Name'+'</th>'+
                        '<th class="table-thead-th">'+'Supplier'+'</th>'+
                        '<th class="table-thead-th">'+'Cost'+'</th>'+
                        '<th class="table-thead-th">'+'Date'+'</th>'+
                        '<th class="table-thead-th">'+'Staff'+'</th>'+
                            '</tr>';
                $('#instruments-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID;
                    let STAFF = response[i].STAFF;
                    let INAME = response[i].INAME;
                    let ISUPLLIER = response[i].ISUPLLIER;
                    let IAMOUNT = response[i].COST
                    let IDETA = response[i].IDETA


                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" + 
                                    '<td class="table-row-td">'  +  INAME + "</td>" +
                                    '<td class="table-row-td">'  +  ISUPLLIER + "</td>" +
                                    '<td class="table-row-td">'  +  IAMOUNT + "</td>" +
                                    '<td class="table-row-td">'  +  IDETA + "</td>" +
                                    '<td class="table-row-td">'  +  STAFF + "</td>" +

                                "</tr>"
                $('#instruments-table tbody').append(tablerow);
                }
            }
            });
            document.getElementById('id01').style.display='none';
}















