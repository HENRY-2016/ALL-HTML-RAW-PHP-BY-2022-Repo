
// http://109.237.25.239/denis/front-end/index.html



// var order_post_url = "http://127.0.0.1/denis/back-end/controller.php/InsertIntoOrdersEndpoint";
// var orders_get_url = "http://127.0.0.1/denis/back-end/controller.php/GetOrdersEndpoint";
// var register_get_url = "http://127.0.0.1/denis/back-end/controller.php/InsertIntoRegisterEndpoint";

// var login_url = "http://127.0.0.1/denis/back-end/controller.php/SigInUserEndpoint";
// var admin_login_url = "http://127.0.0.1/denis/back-end/controller.php/SigInAdminEndpoint";
// var admin_orders_get_url = "http://127.0.0.1/denis/back-end/controller.php/GetAdminOrdersEndpoint";
// var admin_students_get_url = "http://127.0.0.1/denis/back-end/controller.php/GetAdminStudentsEndpoint";


// 109.237.25.239

var order_post_url = "http://109.237.25.239/denis/back-end/controller.php/InsertIntoOrdersEndpoint";
var orders_get_url = "http://109.237.25.239/denis/back-end/controller.php/GetOrdersEndpoint";
var register_get_url = "http://109.237.25.239/denis/back-end/controller.php/InsertIntoRegisterEndpoint";

var login_url = "http://109.237.25.239/denis/back-end/controller.php/SigInUserEndpoint";
var admin_login_url = "http://109.237.25.239/denis/back-end/controller.php/SigInAdminEndpoint";
var admin_orders_get_url = "http://109.237.25.239/denis/back-end/controller.php/GetAdminOrdersEndpoint";
var admin_students_get_url = "http://109.237.25.239/denis/back-end/controller.php/GetAdminStudentsEndpoint";






function Show_User_Log_In()
{
    document.getElementById("admin-log-in-tab-one").style.display='none';
    document.getElementById('log-in-tab-two').style.display = "none"
    document.getElementById('log-in-tab-one').style.display = "block"
}
function Show_User_Register()
{
    document.getElementById("admin-log-in-tab-one").style.display='none';
    document.getElementById('log-in-tab-one').style.display = "none"
    document.getElementById('log-in-tab-two').style.display = "block"
}
function Show_Admin_Log_In ()
{
    document.getElementById('log-in-tab-one').style.display = "none"
    document.getElementById('log-in-tab-two').style.display = "none"
    document.getElementById("admin-log-in-tab-one").style.display='block';
}
function Show_Next_Menu ()
{
    document.getElementById("menu-card-1").style.display="none";
    document.getElementById("menu-card-2").style.display="block";
}
function Show_Previous_Menu ()
{
    document.getElementById("menu-card-2").style.display="none";
    document.getElementById("menu-card-1").style.display="block";
}

function OnLoad_UI (){LogInUser ();}

function OnLoad_Admin_UI (){LogInAdmin();}
// Main navi

function Load_Menu_Page (){window.location="menu.html"}

function Load_staff () {window.location="events.html"}
function Load_Admin () {window.location="admin.html"}
function Log_InPage (){window.location="index.html"}


function Show_Ui_Tab_Div_One ()
{
    document.getElementById("ui-tab-div-two").style.display = "none";
    document.getElementById("ui-tab-div-one").style.display = "block";
}
function Show_Ui_Tab_Div_Two ()
{
    document.getElementById("ui-tab-div-one").style.display = "none";
    document.getElementById("ui-tab-div-two").style.display = "block";
    document.getElementById("show-order-btn").style.display="block";
}
function Show_Admin_Ui_Tab_Div_Two ()
{
    document.getElementById("ui-tab-div-one").style.display = "none";
    document.getElementById("ui-tab-div-two").style.display = "block";
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


function Show_Orders_Table_Data (endpointurl)
{
    const username_form = document.getElementById("user-name-form");
    username_form.addEventListener("submit",(event) => {
        event.preventDefault();
        const request = new  XMLHttpRequest ();
        request.open ("post", endpointurl);
        request.onload = function ()
        {
            response = JSON.parse(request.responseText);
            console.log(response)
            let thead = '<tr class="table-thead">'+
                            '<th class="table-thead-th">'+'Reference'+'</th>'+
                            '<th class="table-thead-th">'+'Name'+'</th>'+
                            '<th class="table-thead-th">'+'Day'+'</th>'+
                            '<th class="table-thead-th">'+'Service'+'</th>'+
                        '</tr>';
            document.getElementById('staffs-tbody').innerHTML = '';
            $('#staffs-table tbody').append(thead); 
            
            let len = response.length;
            for (let i = 0; i<len; i++)
            {
                let ID = response[i].ID; 
                let SNAME = response[i].SNAME; 
                let SDAY = response[i].SDAY;
                let SSERVICE = response[i].SSERVICE;

            let tablerow = '<tr class="table-row">'+
                                '<td class="table-row-td">'  +  ID + "</td>" +
                                '<td class="table-row-td">'  +  SNAME + "</td>" + 
                                '<td class="table-row-td">'  +  SDAY + "</td>" +
                                '<td class="table-row-td">'  +  SSERVICE + "</td>" +
                            "</tr>"
            $('#staffs-table tbody').append(tablerow);
            }
        }
        request.send(new FormData(username_form))
    });
}

function Show_Admin_View_Orders_Table_Data (endpointurl)
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
                                '<th class="table-thead-th">'+'Reference'+'</th>'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Day'+'</th>'+
                                '<th class="table-thead-th">'+'Service'+'</th>'+

                            '</tr>';
                $('#staffs-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID; 
                    let SNAME = response[i].SNAME; 
                    let SDAY = response[i].SDAY;
                    let SSERVICE = response[i].SSERVICE;


                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" +
                                    '<td class="table-row-td">'  +  SNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  SDAY + "</td>" +
                                    '<td class="table-row-td">'  +  SSERVICE + "</td>" +
                                "</tr>"
                $('#staffs-table tbody').append(tablerow);
                }
            }
            });
}


function Show_Admin_View_Students_Table_Data (endpointurl)
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
                                '<th class="table-thead-th">'+'Reference'+'</th>'+
                                '<th class="table-thead-th">'+'FName'+'</th>'+
                                '<th class="table-thead-th">'+'LName'+'</th>'+
                                '<th class="table-thead-th">'+'UserName'+'</th>'+
                                '<th class="table-thead-th">'+'Class'+'</th>'+
                                '<th class="table-thead-th">'+'Password'+'</th>'+

                            '</tr>';
                $('#staffs-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID; 
                    let FNAME = response[i].FNAME; 
                    let LNAME = response[i].LNAME; 
                    let USERNAME = response[i].USERNAME; 
                    let SCLASS = response[i].SCLASS;
                    let SPASSWORD = response[i].SPASSWORD;


                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" +
                                    '<td class="table-row-td">'  +  FNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  LNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  USERNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  SCLASS + "</td>" +
                                    '<td class="table-row-td">'  +  SPASSWORD + "</td>" +
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
                    console.log(res.length);

                    // if res is empty
                    if (res.length === 0) {document.getElementById("sigin-error-label").style.display="block";}
                    else
                    {
                        let status = res[0][0];
                        let username = res[0][1];
                        let student_name = res[0][2];


                        if (status === "Success")
                        {
                            if (username === signinUsername)
                            {
                                localStorage.setItem("username", username);
                                localStorage.setItem("student_name", student_name);


                                // redirect user
                                Load_Menu_Page ();
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
    localStorage.removeItem("student_name");

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
    studentname = localStorage.getItem("student_name");


    usernamelabel = document.getElementById("usernamelabel");
    usernameinput1 = document.getElementById("usernameinput1");
    usernameinput = document.getElementById("usernameinput");



    if (username)
    {
        usernamelabel.innerText =studentname;
        usernameinput1.value = username
        usernameinput.value = username

    }
    else{Log_InPage();}
}

function LogInAdmin ()
{
    // get uer credentials
    username = localStorage.getItem("adminname");

    if (username)
    {
        // usernamelabel.innerText =username;
        // usernameinput = document.getElementById("usernameinput");
        // usernameinput.value = username
        Load_Admin ();

    }
    else{Log_InPage();}
}