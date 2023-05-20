



var booking_url = "http://localhost/hdf-dir/payments/routes_request.php/PostCustomerBookingEndpoint";
var $booking_url_img = "http://localhost/hdf-dir/payments/routes_request.php/PostCustomerBookingWithImageEndpoint";
var payment_url = "http://localhost/hdf-dir/payments/routes_request.php/PostCustomerPaymentEndpoint";



var item_names
function Load_Hdf_Names (endpointurl)
{
    let names_req = new XMLHttpRequest ();
    names_req.open('get',endpointurl,true);
    names_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            item_names = results
        }
        names_req.send();
}

function Submit_Customer_Booking_Details_With_Images ()
{
    let type_id_input = document.getElementById('type-id-input').innerText;
    let customer_name = document.getElementById("customer-name").value;
    let customer_contact = document.getElementById("customer-contact").value;
    let customer_location = document.getElementById("customer-location").value;
    let customer_method = document.getElementById("customer-method").value;
    let img_file = document.getElementById('back-side-file');

    // validate all inputs..............
    if (!customer_name){document.getElementById("name-id").style.display="block"; document.getElementById('customer-name').focus();}
    // else if (!customer_contact) {document.getElementById("phone-id").style.display="block"; document.getElementById("customer-contact").focus();}
    // else if (!customer_location) {document.getElementById("location-id").style.display="block"; document.getElementById("customer-location").focus();}
    // else if (!customer_method) {document.getElementById("method-id").style.display="block"; document.getElementById("customer-method").focus();}
    // else if (!type_id_input) {document.getElementById("type-id").style.display="block"; document.getElementById('type-id-input').focus();}
    else if (img_file.files.length == 0) {document.getElementById("img-file-id").style.display="block";}


    else  
        {
            // alert("Post Data...");
            // document.getElementById("id030").style.display = "block";
            Prepare_Customer_Order_Without_Images ();
            // setTimeout(Display_Server_Feedback_Window,5000);
        }
}
function Prepare_Customer_Order_Without_Images ()
{
        const my_form = document.getElementById("booking-customer-form");
        my_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post",$booking_url_img);
            request.onload = function ()
            {
                console.log(request.responseText);
                let feedback = JSON.parse(request.responseText); 
                
                console.log(feedback);
                document.getElementById("feedback-div").innerHTML = feedback.message;
                my_form.reset();
                // let img = document.getElementById("back-side-display-pra-id");
            }
            request.send(new FormData(my_form))
        });
}
function Submit_Customer_Booking_Details ()
{
    
    let stored_details_lable = document.getElementById('stored-details-lable').innerText;
    let customer_name = document.getElementById("customer-name").value;
    let customer_contact = document.getElementById("customer-contact").value;
    let customer_location = document.getElementById("customer-location").value;
    let customer_method = document.getElementById("customer-method").value;

    // validate all inputs..............
    if (!stored_details_lable) {document.getElementById("stored-details-lable-id").style.display="block";}
    else if (!customer_name) {document.getElementById("name-id").style.display="block"; document.getElementById("customer-name").focus();}
    else if (!customer_contact) {document.getElementById("phone-id").style.display="block"; document.getElementById("customer-contact").focus();}
    else if (!customer_location) {document.getElementById("location-id").style.display="block"; document.getElementById("customer-location").focus();}
    else if (!customer_method) {document.getElementById("method-id").style.display="block"; document.getElementById("customer-method").focus();}

    else  
        {
            document.getElementById("id030").style.display = "block";
            Prepare_Customer_Order ();
            setTimeout(Display_Server_Feedback_Window,5000);
        }
}

function Display_Server_Feedback_Window () 
{
    document.getElementById('id030').style.display='none';
    document.getElementById('id040').style.display='block';
}
function Prepare_Customer_Order ()
{
    // get all form inputs values...
    let inputvalues = document.getElementById('booking-customer-form').elements;
	let details = document.getElementById("stored-details-lable").innerHTML;
    let total = document.getElementById('stored-cost-span').innerText;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
	// console.log(data_array)
	let	details_str = details.split('\n').join(' ')
	let customer_order = data_array.concat(details_str);
	customer_order.push(total); // add total
    $.post(booking_url,{customer_order:customer_order},
            function (response)
                {
                    // console.log(response);
                    response_display = document.getElementById('server-feedback-display');
                    response_display.innerHTML = response
                    let cust_name = document.getElementById("customer-name").value;
                    document.getElementById("cust-name-id").value = cust_name;
                    document.getElementById('amount-to-be-paid').innerText = total;
                }
            );
}

function Submit_Customer_Payment_Details ()
{
    // get all form inputs values...
    let inputvalues = document.getElementById('payments-form').elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    $.post(payment_url,{data_array:data_array},
            function (response)
                {
                    console.log(response);
                    // document.getElementById('id01').style.display='none';
                    // document.getElementById('id02').style.display='none';
                    // response_display = document.getElementById('server-feedback-display');
                    // response_display.innerHTML = response
                    // Clear_All_Form_Inputs();
                }
            );
}




function ClearLocalStorage () {localStorage.clear();}
function CancelCustomerOrder () 
{
	document.getElementById("customer-name").value ='';
	document.getElementById("customer-contact").value ='';
	document.getElementById("customer-location").value ='';
	document.getElementById("customer-method").value ='';
	document.getElementById("stored-details-lable").innerText ='';
    document.getElementById("stored-cost-span").innerText = '';
	localStorage.clear();
}

function Store_Details (item_name_type)
{
    // Store
    let name_input = document.getElementById("name-input-id").value;
    let size_input = document.getElementById("size-input").value;
    let qty_input = document.getElementById("qty-input").value;
	let cost_input = document.getElementById('cost-input').value;

    let br = "<br>";
    let details = "<span class='localstorage-stored-string'>"+item_name_type+"<br>"+"<span class='localstorage-type-space-in-string'>"+"</span>"+name_input+"<span class='localstorage-space-in-string'>"+"</span>"+size_input+"<span class='localstorage-space-in-string'>"+"</span>"+qty_input+"<span class='localstorage-space-in-string'>"+"</span>"+"<span class='total'>"+cost_input+"</span>"+"</span>"+br
    // let cost = "<span class='localstorage-stored-string'>"+item_name_type+"<br>"+cost_input+"</span>"+br
    localStorage.setItem(item_name_type, details); 
    // localStorage.setItem(item_name_type, cost);
}

function Retrive_Stored_details ()
{
	let stored_details_lable = document.getElementById("stored-details-lable");
	// let stored_cost_lable = document.getElementById("stored-cost-lable");

	// let stored_details_img = document.getElementById("stored-details-img");
	let strarrary = []; // to hold stored string 
	// looop through all the stored details keys
	for (i=0; i<localStorage.length; i++)
		{
			const item_name_type_key = localStorage.key(i);
			strarrary.push(localStorage.getItem(item_name_type_key));
		}
	// looop through all the stored cost keys
	// for (i=0; i<localStorage.length; i++)
	// 	{
	// 		const item_name_type_key = localStorage.key(i);
	// 		strarrary.push(localStorage.getItem(item_name_type_key));
	// 	}
		
	stored_details_lable.innerHTML = strarrary.join(' '); // remove the commas in arrary
	// console.log(strarrary)
    Calculate_Total ();
}

function Calculate_Total ()
{
    let lable = document.getElementById('stored-details-lable').innerHTML;
    let totalclass = document.getElementsByClassName('total');
    let total = 0;
    for (let i = 0; i < totalclass.length; ++i) 
    {
        // console.log(totalclass[i].innerHTML);
        let value = parseInt(totalclass[i].innerHTML);
        total +=value; 
    }
    document.getElementById('stored-cost-span').innerText=total + " " + "$";
}


























function Calculate_Cost ()
{
	let prices = 
				{
					// .....Boxes....
					"BO-3X5X2$15":15,
					"BO-4X6X3$25":25,
					"BO-6X10X5$48":48,
					"BO-8X12X8$70":70,
					"BO-12X15X12$80":80,
					"BO-12X24X12$120":120,
					"BO-15X30X15$150":150,
					"BO-18X36X18$220":220,

					// Cups
					"CU-6X3$15":15,
					"CU-8X3.5$20":20,

					// .....Logos.....
					"LO-12X12$25":25,
					"LO-12X15$33":33,
					"LO-15X15$47":47,
					"LO-15X20$63":63,
					"LO-18X18$63":63,
					"LO-18X24$80":80,
					"LO-24X30$100":100,
					"LO-28X48$250":250,
                
					// .....Chairs.....
					"CH-12X24$20":20,
					"CH-15X30$54":54,
					"CH-15X41$79":79,
					"CH-18X42$110":110,
					"CH-24X24X40$157":157,
					// .....Ash trey.....
					"AT-4$15":15,
					"AT-6$25":25,

					// .....Wall hangings.....
					"WH-3X2$8":8,
					"WH-5X15$11":11,
					"WH-8X15$25":25,
					"WH-12X20$35":35,
					"WH-12X24$45":45,
					"WH-15X20$50":50,
					"WH-15X24$70":70,
					"WH-15X36$110":110,
					"WH-15X28$130":130,
					"WH-18X24$100":100,
					"WH-18X36$125":125,
					"WH-18X28$150":150,

					// .....Walking sticks.....
					"WS-36$47":47,
					"WS-48$55":55,
					"WS-72$63":63,

					// .....Maps.....
					"MA-12X15$25":25,
					"MA-13X20$55":55,
					"MA-18X24$80":80,

					// .....Last supper.....
					"LS-10X15$15":15,
					"LS-12X22$80":80,
					"LS-28X15$120":120,
					"LS-20X36$150":150,

					// .....Statues people.....
					"SP-10$15":15,
					"SP-1.5$30":30,
					"SP-2$45":45,
					"SP-3$79":79,
					"SP-4$110":110,
	
					// .....Statues animals.....
					"SA-5$15":15,
					"SA-8$25": 25,
					"SA-10$50":50,
					"SA-12$80": 80,
					"SA-15$120":120,
					"SA-20$150":150,
					"SA-24$20":20,
					// .....Lamp holders.....
					"LH-$25":25,

					// .....Tables round.....
					"TR-18X19$47":47,
					"TR-24X20$110":110,
					"TR-30X20$125":125,
					"TR-36X22$155":155,

					// .....Table square.....
					"TS-18X24$79":79,
					"TS-20X36$110":110,

					// .....Tables dainning.....
					"TD-4chairs$266":266,
					"TD-6chairs$469":569,
					"TD-8chairs$782":782,

               		// .....Doors design.....
					"DD-31X7$250":250,
					"DD-42X7$375":375,
					"DD-5ftX7$782":782,
					"DD-6ftX7$800":800,

					// .....Doors plain.....
					"DP-31X7$110":110,
					"DP-42X7$150":150,
					"DP-5ftX7$315":315,
					"DP-6ftX7$470":470,

					// .....Trofhies.....
					"TR-8X15$80":80,
					"TR-12X6$55":55,
					"TR-12X5$45":45,
                
					// .....Logos.....
					// .....Logos.....
					// .....Logos.....
                
				}



	let size = document.getElementById('size-input').value;
	console.log(size);
	let qty = document.getElementById('qty-input').value;
	let cost_input = document.getElementById('cost-input');

	let dollers = prices[size];
	console.log(dollers)
	let total = qty * dollers;
	cost_input.value=total;
	console.log(total)
}




































function autocomplete(inp, arr) 
{
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
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
