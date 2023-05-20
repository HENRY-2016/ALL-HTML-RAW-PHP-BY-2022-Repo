


// var admin_delete_orders = "http://127.0.0.1/denis/back-end/controller.php/AdminDeleteOrdersEndPoint";
// var admin_delete_students = "http://127.0.0.1/denis/back-end/controller.php/AdminDeleteStudentsEndPoint";


var admin_delete_orders = "http://109.237.25.239/denis/back-end/controller.php/AdminDeleteOrdersEndPoint";
var admin_delete_students = "http://109.237.25.239/denis/back-end/controller.php/AdminDeleteStudentsEndPoint";


// 109.237.25.239





function Load_Admin_Students ()
{
    window.location="admin_students.html"
}
function Load_Admin_Orders ()
{
    window.location="admin.html"
}


//////////////////////////////////////////////////////////////////////////

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
function Show_Staff_Table_Data ()
{
    document.getElementById("instuments-id").style.display = "none";
    document.getElementById("staffs-id").style.display = "block";
    document.getElementById("staffs-remove-btn").style.display = "block";
    document.getElementById("staffs-update-btn").style.display = "block";

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
                            '<th class="table-thead-th">'+'Name'+'</th>'+
                            '<th class="table-thead-th">'+'Contact'+'</th>'+
                            '<th class="table-thead-th">'+'Password'+'</th>'+
                            '</tr>';
                $('#staffs-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let USERNAME = response[i].USERNAME;
                    let CONTACTS = response[i].CONTACTS;
                    let UPASSWORD = response[i].UPASSWORD

                let tablerow = '<tr class="table-row">'+
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

function Show_Instruments_Table_Data ()
{
    document.getElementById("staffs-id").style.display = "none";
    document.getElementById("instuments-id").style.display = "block";
    document.getElementById("instruments-remove-btn").style.display = "block";
    document.getElementById("instruments-update-btn").style.display = "block";
    document.getElementById('instuments-tbody').innerHTML = '';
    $.ajax({
            url:instruments_url,
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
                                '<th class="table-thead-th">'+'Contact'+'</th>'+
                                '<th class="table-thead-th">'+'Password'+'</th>'+
                            '</tr>';
                $('#instuments-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let USERNAME = response[i].USERNAME;
                    let CONTACTS = response[i].CONTACTS;
                    let UPASSWORD = response[i].UPASSWORD

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  USERNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  CONTACTS + "</td>" +
                                    '<td class="table-row-td">'  +  UPASSWORD + "</td>" +
                                "</tr>"
                $('#instuments-table tbody').append(tablerow);
                }
            }
            });
            document.getElementById('id01').style.display='none';
}











