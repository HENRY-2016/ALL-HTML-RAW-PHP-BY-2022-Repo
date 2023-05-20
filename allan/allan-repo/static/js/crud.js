

var seconds = 1000;
var loader_seconds = 3000;

var admin_add_items = "http://127.0.0.1/allan-dir/allan-php/controller.php/AdminAddItemEndPoint";
var admin_view_items = "http://127.0.0.1/allan-dir/allan-php/controller.php/AdminViewItemEndPoint";
var admin_update_items = "http://127.0.0.1/allan-dir/allan-php/controller.php/AdminUpdateItemEndPoint";
var admin_delete_items = "http://127.0.0.1/allan-dir/allan-php/controller.php/AdminDeleteItemEndPoint";



/*
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @
    @           RECIEVED ORDERS
    @
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
*/

    // ==================
    function Fetch_All_Registered_Customers (endpoit,avenuetbody)
    {
        let req = new XMLHttpRequest();
        req.open('post', crud_url+endpoit,true)
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
                        th_names.push(["Customername","Contact","Password"]);
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
            req.send();  
    }

function Fetch_All_Item_Names_To_Edits (endponit,avenuetbody,htmlform,SelectedTypeName,item_name_input_type)
    {
        let req = new XMLHttpRequest();
        req.open('post',endponit,true)
        req.onload = function ()
            {
                let results = JSON.parse(this.responseText);
                console.log(results)
                if (! results || !results.length){alert("No results found")}
                else
                    {
                        let tbody = document.getElementById(avenuetbody);
                        tbody.innerHTML = ' ';
    
                        // draw table
                        let td,tr;
                        // add table headings
                        let th_names = new Array ();
                        th_names.push(["Key","Name","Price","Description"]);
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
            let form = new FormData(document.getElementById(htmlform));
            req.send(form);  
        setTimeout(AssignLabelToSelectedTypeInput (SelectedTypeName,item_name_input_type), seconds)
    }

function AssignLabelToSelectedTypeInput (SelectedTypeName,item_name_input_type)
{
    selectedtypename = document.getElementById(SelectedTypeName).value;
    document.getElementById(item_name_input_type).value = selectedtypename;
}

function Fetch_All_Staffs (endpoit,avenuetbody,avenuetbodydiv)
{
    let req = new XMLHttpRequest();
    req.open('post', crud_url+endpoit,true)
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
function DisplayUploadedImage ( event, id )
{   
    let image = document.getElementById(id);
	image.src = URL.createObjectURL(event.target.files[0]);
}
function Hide_all_Admin_Divs ()
{
    // MAINS
    document.getElementById("add-item-panel-div").style.display="none";
    document.getElementById("edit-item-panel-div").style.display="none";
    document.getElementById("delete-item-panel-div").style.display="none";
    document.getElementById("new-customers-panel-div").style.display = "none";
    document.getElementById("delete-message-panel-div").style.display="none";
    document.getElementById("admin-view-messages").style.display="none";
    
}


// MENU ...........
function Show_add_menu_panel_div ()
{
    document.getElementById("edit-item-panel-div").style.display = "none";
    document.getElementById("delete-item-panel-div").style.display = "none";
    document.getElementById("delete-message-panel-div").style.display="none";
    document.getElementById("new-customers-panel-div").style.display = "none";
    document.getElementById("admin-view-messages").style.display="none";
    document.getElementById("add-item-panel-div").style.display = "block";
}
function Show_edit_menu_panel_div ()
{
    document.getElementById("add-item-panel-div").style.display = "none";
    document.getElementById("delete-item-panel-div").style.display = "none"; 
    document.getElementById("delete-message-panel-div").style.display="none";
    document.getElementById("new-customers-panel-div").style.display = "none";
    document.getElementById("admin-view-messages").style.display="none";
    document.getElementById("edit-item-panel-div").style.display = "block";
}
function Show_delete_menu_panel_div ()
{
    document.getElementById("edit-item-panel-div").style.display = "none";
    document.getElementById("add-item-panel-div").style.display = "none";    
    document.getElementById("delete-message-panel-div").style.display="none";
    document.getElementById("new-customers-panel-div").style.display = "none"; 
    document.getElementById("admin-view-messages").style.display="none";  
    document.getElementById("delete-item-panel-div").style.display = "block";
}
function Show_new_customers_panel_div ()
{
    document.getElementById("edit-item-panel-div").style.display = "none";
    document.getElementById("add-item-panel-div").style.display = "none";    
    document.getElementById("delete-message-panel-div").style.display="none";
    document.getElementById("delete-item-panel-div").style.display = "none";  
    document.getElementById("admin-view-messages").style.display="none"; 
    document.getElementById("new-customers-panel-div").style.display = "block"; 
    Fetch_All_Registered_Customers ('veiw_new_customers_endpoint','view-customer-tbody')  

}
function Show_delete_messages_panel_div ()
{
    document.getElementById("edit-item-panel-div").style.display = "none";
    document.getElementById("add-item-panel-div").style.display = "none";    
    document.getElementById("delete-item-panel-div").style.display = "none";
    document.getElementById("new-customers-panel-div").style.display = "none";
    document.getElementById("admin-view-messages").style.display="none";
    document.getElementById("delete-message-panel-div").style.display="block";
    FetchAdminMassegesFromServer('view_admin_masseges_endpoint','delete-masseges');

}


function ShowAdminViewMessagesDiv ()
{
    document.getElementById("edit-item-panel-div").style.display = "none";
    document.getElementById("delete-item-panel-div").style.display = "none";
    document.getElementById("delete-message-panel-div").style.display="none";
    document.getElementById("new-customers-panel-div").style.display = "none";
    document.getElementById("admin-view-messages").style.display="none";
    document.getElementById("add-item-panel-div").style.display = "none";
    document.getElementById("admin-view-messages").style.display="block";
    FetchAdminMassegesFromServer('view_admin_masseges_endpoint','view-masseges')
}




function CreateAdminDynamicCustomerDetails (results,OuterHtmlDiv)
{
    for (i=0;i<results.length;i++)
    {
        // CUSTOMERNAME,CONTACTS,DATE,MESSAGES
    let HtmlDiv = document.getElementById(OuterHtmlDiv);
    let DivContainer = document.createElement('div');
    let User_Name_Results_Label = document.createElement('label');
    let Contact_Results_Label = document.createElement('label');
    let Date_Results_Label = document.createElement('label');
    let Massegs_Results_Label = document.createElement('label');
    let Key_Results_Label = document.createElement('label');
    let Break_Label = document.createElement('label');

    // Set attributs ...
    DivContainer.setAttribute('class','results-div-container');
    User_Name_Results_Label.setAttribute('id','username-results-label');
    Contact_Results_Label.setAttribute('id','contact-results-label')
    Date_Results_Label.setAttribute('id','date-results-label');
    Massegs_Results_Label.setAttribute('id','list-results-label')
    Key_Results_Label.setAttribute('id','key-results-label')

    // Create text
    User_Name_Results_Label.innerHTML = results[i][0]+"<br>";
    Contact_Results_Label.innerHTML = '<a href="tel:'+ results[i][1]+'"'+'>'+results[i][1]+'</a>'+"<br>";
    // Contact_Results_Label.innerHTML = results[i][1]+"<br>";
    Date_Results_Label.innerHTML = results[i][3]+"<br>";
    Massegs_Results_Label.innerHTML =  results[i][2]+"<br>";
    Key_Results_Label.innerHTML =  results[i][4];
    Break_Label.innerHTML = "<br><br>";

    // appendChild to ....
    Key_Results_Label.appendChild(Break_Label);
    Massegs_Results_Label.appendChild(Key_Results_Label);
    Date_Results_Label.appendChild(Massegs_Results_Label);
    Contact_Results_Label.appendChild(Date_Results_Label);
    User_Name_Results_Label.appendChild(Contact_Results_Label);
    DivContainer.appendChild(User_Name_Results_Label);
    HtmlDiv.appendChild(DivContainer);
    }
}

function FetchAdminMassegesFromServer (endpointurl,OuterHtmlDiv)
{

    let req = new XMLHttpRequest();
    req.open('post', crud_url + endpointurl,true)
    req.onload = function ()
        {
            results = JSON.parse(this.responseText);
            if (! results || !results.length){alert("No results found")}
            else
                {
                    console.log(results)
                    document.getElementById(OuterHtmlDiv).innerText = "";
                    CreateAdminDynamicCustomerDetails(results,OuterHtmlDiv)
                }
        }
        req.send();
}


function ShowAdminMessagesResponsePopUp (popup_model,customerkey,customername,customercontacts,customermessage,key_form_id)
{
    document.getElementById(popup_model).style.display='block';     

    let req = new XMLHttpRequest();
    req.open('post', crud_url +'view_customer_selected_customer_key_data_endpoint',true)
    req.onload = function ()
        {
            results = JSON.parse(this.responseText);
            if (! results || !results.length){alert("No results found")}
            else
                {
                    document.getElementById(customerkey).value = results[0][3];
                    document.getElementById(customername).value = results[0][0];
                    document.getElementById(customercontacts).value = results[0][1];
                    document.getElementById(customermessage).value = results[0][2];
                    
                }
        }
        key_reply_form= new FormData(document.getElementById(key_form_id))
        req.send(key_reply_form);
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

            }
            request.send(new FormData(my_form))
        });
}

function SubmitAdminViewItemsNames (htmlform,endpointurl,feedbackdiv,SelectedTypeName,item_name_input_type)
{
        const my_form = document.getElementById(htmlform);
        my_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post",endpointurl);
            request.onload = function ()
            {
                let results = JSON.parse(request.responseText); 
                CreateAdminDynamicViewNames(results, feedbackdiv);
                my_form.reset();
            }
            request.send(new FormData(my_form))
        });
        setTimeout(AssignLabelToSelectedTypeInput (SelectedTypeName,item_name_input_type), seconds)
}

function AssignLabelToSelectedTypeInput (SelectedTypeName,item_name_input_type)
{
    selectedtypename = document.getElementById(SelectedTypeName).value;
    document.getElementById(item_name_input_type).value = selectedtypename;
}

function CreateAdminDynamicViewNames (results,OuterHtmlDiv)
{
    // clera html div
    document.getElementById(OuterHtmlDiv).innerHTML = '';
    for (i=0;i<results.length;i++)
    {
        let HtmlDiv = document.getElementById(OuterHtmlDiv);
        let DivContainer = document.createElement('div');
        let User_Name_Results_Label = document.createElement('label');

        // Set attributs ...
        DivContainer.setAttribute('class','results-div-container');
        User_Name_Results_Label.setAttribute('id','username-results-label');

        // Create text
        User_Name_Results_Label.innerHTML = results[i][0]+"<br>";

        // appendChild to ....
        DivContainer.appendChild(User_Name_Results_Label);
        HtmlDiv.appendChild(DivContainer);
    }
}

function SubmitAdminUpdateItemsNames (htmlform,endpointurl,feedbackdiv)
{
        // implemented on update and delete factionalities 
        const my_form = document.getElementById(htmlform);
        my_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post",endpointurl);
            request.onload = function ()
            {
                let results = JSON.parse(request.responseText); 
                document.getElementById(feedbackdiv).innerHTML = results.message;
                my_form.reset();
            }
            request.send(new FormData(my_form))
        });
}
