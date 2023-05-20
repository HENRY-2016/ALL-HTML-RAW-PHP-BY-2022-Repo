

let signin_url = "http://localhost/allan-dir/allan-php/controller.php/SigInUserEndpoint";
let signup_url = "http://localhost/allan-dir/allan-php/controller.php/InsertIntoUsersEndpoint";
var msg_get_url = "http://localhost/allan-dir/allan-php/controller.php/ReadUserMessageEndpoint";
var msg_post_url = "http://localhost/allan-dir/allan-php/controller.php/InsertIntoMessagesEndpoint";


let bass_url = "http://localhost/allan-dir/allan-php/templates/guitar_base.php"
let electric_url = "http://localhost/allan-dir/allan-php/templates/guitar_electric.php"
let acoustic_url = "http://localhost/allan-dir/allan-php/templates/guitar_acoustic.php"
let amplified_url = "http://localhost/allan-dir/allan-php/templates/guitar_amplified.php"

let usbs_url = "http://localhost/allan-dir/allan-php/templates/electronics_usbs.php"
let chargers_url = "http://localhost/allan-dir/allan-php/templates/electronics_chargers.php"
let led_bulbs_url = "http://localhost/allan-dir/allan-php/templates/electronics_led_bulbs.php"
let batteries_url = "http://localhost/allan-dir/allan-php/templates/electronics_batteries.php"
let adapter_url = "http://localhost/allan-dir/allan-php/templates/electronics_adapters.php"
let card_reader_url = "http://localhost/allan-dir/allan-php/templates/electronics_card_reader.php"
let form_cleaner_url = "http://localhost/allan-dir/allan-php/templates/electronics_form_cleaner.php"
let iphon_usb_url = "http://localhost/allan-dir/allan-php/templates/electronics_iphone_usb.php"
let wall_mount_url = "http://localhost/allan-dir/allan-php/templates/electronics_wall_mount.php"
let banana_pin_url = "http://localhost/allan-dir/allan-php/templates/electronics_banana_pin.php"
let charge_bulbs_url = "http://localhost/allan-dir/allan-php/templates/electronics_charger_bulbs.php"
let flash_disk_url = "http://localhost/allan-dir/allan-php/templates/electronics_flash_disks.php"
let memory_cards_url = "http://localhost/allan-dir/allan-php/templates/electron_memory_cards.php"
let portable_speaker_url = "http://localhost/allan-dir/allan-php/templates/electronics_portable_speakers.php"
let bluetooth_speaker_url = "http://localhost/allan-dir/allan-php/templates/bluetooth_speaker.php"
let universal_charger_url = "http://localhost/allan-dir/allan-php/templates/electronics_universal_charger.php"
let reciever_headset_url = "http://localhost/allan-dir/allan-php/templates/electronics_reciever_headset.php"
let wireless_headphones_url = "http://localhost/allan-dir/allan-php/templates/electronics_wireless_headphones.php"




function Show_Offline_Label (htmldiv){document.getElementById(htmldiv).style.display='block';}
function Show_Offline_Label_For_Links (){document.getElementById('offline-div-lable').style.display='block';}

function Sign_Out_User () {window.location= php_url+php_pages_source_dir+'signofutclient.php'}
function Sign_Up_User () {window.location= php_pages_source_dir+'register.php'}

function Load_Developer_View () {window.location="developer.html"}
function Load_Guitar_View (){window.location="index.html";}
function Load_Electronics_View () {window.location="electronics.html"}
function Load_User_Signin () {window.location="signin.html"}




// Menu Gallery
function Add_Gallery_Iframe (endpoint, offlinediv,imagesdivid )
{
    
    $.ajax({
        url:endpoint,
        timeout:4000,
        error: function (request)
            {if(request.status==0)document.getElementById(offlinediv).style.display='block';},
        success: function () 
            {
                let MenuGalleryDiv = document.getElementById(imagesdivid);
                let MenuIframe = document.createElement("iframe");
                MenuIframe.className = "menu-iframe";
                MenuIframe.setAttribute("src", endpoint);
                // MenuIframe.setAttribute("scrolling","no");
                MenuGalleryDiv.appendChild(MenuIframe);
                
            }
    });
}


function SendMessage ( message_input,htmlform)
{
    customer_message = document.getElementById(message_input).value;
        const htmlForm = document.getElementById(htmlform);
        htmlForm.addEventListener("submit",(event) => {
            event.preventDefault();
        if (customer_message === "") {document.getElementById('empty-message-label').style.display='block';}
        else
        {
            const request = new  XMLHttpRequest ();

            request.open ("post", msg_post_url);
            request.onload = function ()
            {
                console.log(request.responseText);
                document.getElementById("sent-message-label").style.display = 'block';
            }
            request.send(new FormData(htmlForm))
            document.getElementById(message_input).value = ''; // clear html inputs
            document.getElementById('empty-message-label').style.display = 'none'; // clear lable
            setTimeout(FetchCustomersMassegesFromServer('view_customer_masseges_endpoint','view-masseges'),5000);
            setTimeout(TurnOffStatusLabel,4000);
        }
        });
}



function TurnOffStatusLabel (){document.getElementById("sent-message-label").style.display = 'none';}

function CreateCustomerDynamicCustomerDetails (results,OuterHtmlDiv)
{
    for (i=0;i<results.length;i++)
    {
        // CUSTOMERNAME,CONTACTS,DATE,MESSAGES
    let HtmlDiv = document.getElementById(OuterHtmlDiv);
    let DivContainer = document.createElement('div');
    let Date_Results_Label = document.createElement('label');
    let Massegs_Results_Label = document.createElement('label');
    let Status_Results_Label = document.createElement('label');
    let Break_Label = document.createElement('label');

    // Set attributs ...
    DivContainer.setAttribute('class','results-div-container');
    Date_Results_Label.setAttribute('id','contact-results-label')
    Date_Results_Label.setAttribute('id','date-results-label');
    Massegs_Results_Label.setAttribute('id','list-results-label')

    // Create text
    Date_Results_Label.innerHTML = results[i][0]+"<br>";
    Massegs_Results_Label.innerHTML = results[i][1]+"<br>";
    Status_Results_Label.innerHTML = results[i][2]+"<br>";
    Break_Label.innerHTML = "<br><br>";

    // appendChild to ....
    Status_Results_Label.appendChild(Break_Label);
    Massegs_Results_Label.appendChild(Status_Results_Label);
    Date_Results_Label.appendChild(Massegs_Results_Label);
    DivContainer.appendChild(Date_Results_Label);
    HtmlDiv.appendChild(DivContainer);
    }
}

function FetchCustomersMassegesFromServer  (detailsForm,endpointurl,OuterHtmlDiv)
{
    let inputvalues = document.getElementById(detailsForm).elements;
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
                    let results = JSON.parse(response);
                    // console.log(res);
                    CreateCustomerDynamicCustomerDetails(results,OuterHtmlDiv)
                }
            );
}














//  accounts
function SubmitSignInUserData ()
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
    $.post(signin_url,{data_array:data_array},
            function (response)
                {
                    let res = JSON.parse(response);
                    // console.log(res.length);

                    // if res is empty
                    if (res.length === 0) {document.getElementById("sigin-error-label").style.display="block";}
                    else
                    {
                        let status = res[0][0];
                        let username = res[0][1];
                        let phone = res[0][2]


                        if (status === "Success")
                        {
                            if (username === signinUsername)
                            {
                                localStorage.setItem("username", username);
                                localStorage.setItem("phone", phone);
                                // redirect user
                                Load_Guitar_View ();
                            }
                        }
                    }
                }
            );
}

function SubmitSignUpUserData ()
{
    // get all form inputs values...
    let inputvalues = document.getElementById('signup-form').elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    $.post(signup_url,{data_array:data_array},
            function (response)
                {
                    let res = JSON.parse(response);
                    console.log(res);

                    let status = res[0][0];
                    let username = res[0][1];
                    let phone = res[0][2]

                    if (status === "Success")
                    {
                        localStorage.setItem("username", username);
                        localStorage.setItem("phone", phone);
                        // redirect user
                        Load_Guitar_View ();
                    }
                    else{Load_User_Signin()}
                }
            );
}

function SignOutUser ()
{

    localStorage.removeItem("username");
    localStorage.removeItem("phone");
    // redirect user
    // Load_User_Signin();
    Load_Guitar_View ();
}


function LogInUser ()
{
    // get uer credentials
    username = localStorage.getItem("username");
    phone = localStorage.getItem("phone");

    usernamelabel = document.getElementById("username");
    phonelabel = document.getElementById("phone");


    if (username)
    {
        usernamelabel.innerText =username;
        phonelabel.innerText=phone;

        // asign names to customername and customercontacts class
        $('input[type=text].customername').val(username);
        $('input[type=text].customercontacts').val(phone);


        document.getElementById("signout-label").style.display="block";
    }
    else
    {
        document.getElementById("login-label").style.display="block";
    }
}




















