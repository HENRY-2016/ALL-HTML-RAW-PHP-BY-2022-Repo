



// var events_post_url = "http://127.0.0.1/kelly/back-end/controller.php/InsertIntoEventsEndpoint";
// var returns_post_url = "http://127.0.0.1/kelly/back-end/controller.php/InsertIntoReturnsEndpoint";
// var borrows_post_url = "http://127.0.0.1/kelly/back-end/controller.php/InsertIntoBorrowsEndpoint";
// var payments_post_url = "http://127.0.0.1/kelly/back-end/controller.php/InsertIntoPaymentsEndpoint";
// var instruments_post_url = "http://127.0.0.1/kelly/back-end/controller.php/InsertIntoInstrumentsEndpoint";
// var events_post_url = "http://127.0.0.1/kelly/back-end/controller.php/InsertIntoEventsEndpoint";

// var events_get_url = "http://127.0.0.1/kelly/back-end/controller.php/GetEventsEndpoint";
// var returns_get_url = "http://127.0.0.1/kelly/back-end/controller.php/GetReturnsEndpoint";
// var borrows_get_url = "http://127.0.0.1/kelly/back-end/controller.php/GetBorrowsEndpoint";
// var payments_get_url = "http://127.0.0.1/kelly/back-end/controller.php/GetPaymentsEndpoint";
// var instruments_get_url = "http://127.0.0.1/kelly/back-end/controller.php/GetInstrumentsEndpoint";

// var staff_login_url = "http://127.0.0.1/kelly/back-end/controller.php/SigInUserEndpoint";
// var admin_login_url = "http://127.0.0.1/kelly/back-end/controller.php/SigInAdminEndpoint";



var events_post_url = "http://176.58.115.77/kelly/back-end/controller.php/InsertIntoEventsEndpoint";
var returns_post_url = "http://176.58.115.77/kelly/back-end/controller.php/InsertIntoReturnsEndpoint";
var borrows_post_url = "http://176.58.115.77/kelly/back-end/controller.php/InsertIntoBorrowsEndpoint";
var payments_post_url = "http://176.58.115.77/kelly/back-end/controller.php/InsertIntoPaymentsEndpoint";
var instruments_post_url = "http://176.58.115.77/kelly/back-end/controller.php/InsertIntoInstrumentsEndpoint";
var events_post_url = "http://176.58.115.77/kelly/back-end/controller.php/InsertIntoEventsEndpoint";
var events_get_url = "http://176.58.115.77/kelly/back-end/controller.php/GetEventsEndpoint";
var returns_get_url = "http://176.58.115.77/kelly/back-end/controller.php/GetReturnsEndpoint";
var borrows_get_url = "http://176.58.115.77/kelly/back-end/controller.php/GetBorrowsEndpoint";
var payments_get_url = "http://176.58.115.77/kelly/back-end/controller.php/GetPaymentsEndpoint";
var instruments_get_url = "http://176.58.115.77/kelly/back-end/controller.php/GetInstrumentsEndpoint";
var staff_login_url = "http://176.58.115.77/kelly/back-end/controller.php/SigInUserEndpoint";
var admin_login_url = "http://176.58.115.77/kelly/back-end/controller.php/SigInAdminEndpoint";


function OnLoad_UI (){LogInUser ();}

function OnLoad_Admin_UI (){LogInAdmin();}
// Main navi

function Load_Events_Page (){window.location="events.html"}
function Load_Instruments_Page (){window.location="instruments.html"}
function Load_Payments_Page (){window.location="payments.html"}
function Load_Admin_Page (){window.location="admin.html"}
function Load_Borrows_Page () {window.location="borrow.html"}
function Load_Returns_Page () {window.location="returns.html"}

function Load_staff () {window.location="events.html"}
function Load_Admin () {window.location="admin.html"}
function Log_InPage (){window.location="index.html"}


function Show_Ui_Tab_Div_One ()
{
    document.getElementById("ui-tab-div-two").style.display = "none";
    document.getElementById("ui-tab-div-four").style.display="none";
    document.getElementById("ui-tab-div-three").style.display="none";
    document.getElementById("ui-tab-div-one").style.display = "block";
}
function Show_Ui_Tab_Div_Two ()
{
    document.getElementById("ui-tab-div-one").style.display = "none";
    document.getElementById("ui-tab-div-three").style.display="none";
    document.getElementById("ui-tab-div-four").style.display="none";
    document.getElementById("ui-tab-div-two").style.display = "block";
}
function Show_Ui_Tab_Div_Three ()
{
    document.getElementById("ui-tab-div-one").style.display = "none";
    document.getElementById("ui-tab-div-four").style.display="none";
    document.getElementById("ui-tab-div-two").style.display="none";
    document.getElementById("ui-tab-div-three").style.display = "block";
}

function Show_Ui_Tab_Div_Four ()
{
    document.getElementById("ui-tab-div-one").style.display = "none";
    document.getElementById("ui-tab-div-three").style.display="none";
    document.getElementById("ui-tab-div-two").style.display="none";
    document.getElementById("ui-tab-div-four").style.display = "block";
}


function Submit_Form_Data (htmlform,endpointurl)
{
    // get all form inputs values...
    document.getElementById('feedback-label-div').style.display='none';
    let inputvalues = document.getElementById(htmlform).elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    console.log(data_array)
    $.post(endpointurl,{data_array:data_array},
            function (response)
                {
                    console.log(response);
                    document.getElementById('feedback-label-div').style.display='block';
                    
                    document.getElementById('feedback-label').innerHTML = response
                    document.getElementById(htmlform).reset();
                }
            );
}



function Show_Events_Table_Data ()
{

    document.getElementById('staffs-tbody').innerHTML = '';
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
                $('#staffs-table tbody').append(thead); 
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
                $('#staffs-table tbody').append(tablerow);
                }
            }
            });
}

function Show_Returns_Table_Data (endpointurl)
{
    document.getElementById('staffs-tbody').innerHTML = '';
    $.ajax({
            url:endpointurl,
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
                $('#staffs-table tbody').append(thead); 
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
                $('#staffs-table tbody').append(tablerow);
                }
            }
            });
}

function Show_Payments_Table_Data (endpointurl)
{
    document.getElementById('staffs-tbody').innerHTML = '';
    $.ajax({
            url:endpointurl,
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
                $('#staffs-table tbody').append(thead); 
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
                $('#staffs-table tbody').append(tablerow);
                }
            }
            });
}

function Show_Instruments_Table_Data (endpointurl)
{
    document.getElementById('staffs-tbody').innerHTML = '';
    $.ajax({
            url:endpointurl,
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
                $('#staffs-table tbody').append(thead); 
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
                $('#staffs-table tbody').append(tablerow);
                }
            }
            });
}


//  accounts
function SubmitSignInUserData (endpointurl)
{
    // get all form inputs values...
    let inputvalues = document.getElementById('signin-form').elements;
    let signinUsername = document.getElementById('username').value;

    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    $.post(endpointurl,{data_array:data_array},
            function (response)
                {
                    console.log(response)
                    let res = JSON.parse(response);
                    // console.log(res.length);

                    // if res is empty
                    if (res.length === 0) {document.getElementById("sigin-error-label").style.display="block";}
                    else
                    {
                        let status = res[0][0];
                        let username = res[0][1];


                        if (status === "Success")
                        {
                            if (username === signinUsername)
                            {
                                localStorage.setItem("username", username);

                                // redirect user
                                Load_Events_Page ();
                            }
                        }
                        else if (status === "AdminSuccess")
                        {
                            if (username === signinUsername)
                            {
                                localStorage.setItem("adminname", username);

                                Load_Admin ();
                            }
                        }
                        else{document.getElementById("sigin-error-label").style.display="block";}
                    }
                }
            );
}

function SignOutUser ()
{

    localStorage.removeItem("username");
    // redirect user
    Log_InPage ();
}
function SignOutAdmin ()
{

    localStorage.removeItem("adminname");
    // redirect user
    Log_InPage ();
}


function LogInUser ()
{
    // get uer credentials
    username = localStorage.getItem("username");

    usernamelabel = document.getElementById("usernamelabel");
    usernameinput = document.getElementById("usernameinput");



    if (username)
    {
        usernamelabel.innerText =username;
        usernameinput.value = username


        document.getElementById("signout-label-admin").style.display="none";
        document.getElementById("signout-label-user").style.display="block";
    }
    else{Log_InPage();}
}

function LogInAdmin ()
{
    // get uer credentials
    username = localStorage.getItem("adminname");

    usernamelabel = document.getElementById("usernamelabel");
    usernameinput = document.getElementById("usernameinput");



    if (username)
    {
        usernamelabel.innerText =username;
        usernameinput.value = username

        document.getElementById("signout-label-admin").style.display="block";
    }
    else{Log_InPage();}
}


function PrintDocument(divId,title) 
{

    let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
    mywindow.document.write(`<html><head><title>${title}</title>`);
    mywindow.document.write('</head><body>');
    mywindow.document.write(document.getElementById(divId).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}