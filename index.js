var counter = 1;  //device counter
var limit = 10;   //device limit

$("body").scrollspy({ target: "#my_navbar" });

//Fit Text Code!!
//$("#gonz_quote").fitText(2, { minFontSize: "15px", maxFontSize: "22px" });
//$("#dir_text").fitText(2, { minFontSize: "10px", maxFontSize: "22px" });

var duration = 300;  
var welcome_top = $("#welcome").position().top;
var how_it_works_top = $("#how_it_works").position().top; //485 on full viewport
var services_top = $("#services").position().top;
var stay_clever_top = $("#stay_clever").position().top; //1400 on full viewport


//scroll() constantly keeps tabs on the position of the scrollbar? Does this code fire as
//the user is moving the scrollbar?
$(window).scroll(function() {                
    //For the move up button
    if ($(this).scrollTop() >= how_it_works_top) {
        $("#move_up").fadeIn(duration);
    }
    else {
        $("#move_up").fadeOut(duration);
    }

    //For the move down button
    if ($(this).scrollTop() >= stay_clever_top) {
        $("#move_down").fadeOut(duration);
    }
    else {
        $("#move_down").fadeIn(duration);
    }
});


$("#move_up").click(function(event) {
    event.preventDefault();
    var cur_scrolltop = $(window).scrollTop();
    var welcome_bottom = welcome_top + $("#welcome").outerHeight(false);
    var how_it_works_bottom = how_it_works_top + $("#how_it_works").outerHeight(false);    
    var services_bottom = services_top + $("#services").outerHeight(false);

    //When we're on the How It Works section:
    if (cur_scrolltop >= welcome_bottom && cur_scrolltop < services_top) {
        $("html, body").animate({scrollTop: welcome_top}, duration);
    }
    //When we're on the Services section:
    else if (cur_scrolltop >= how_it_works_bottom && cur_scrolltop < stay_clever_top) {
        $("html, body").animate({scrollTop: how_it_works_top}, duration);
    }
    //When we're on the Stay Clever section:
    else if (cur_scrolltop >= services_bottom) {
        $("html, body").animate({scrollTop: services_top}, duration);
    }

    return false; //Does this need to be here?
});


$(".btn_from_device_modal").click(function(event) {
    event.preventDefault(); 
    //prefill start a repair modal with values selected here

});


$("#move_down").click(function(event) {
    event.preventDefault();                
    var cur_scrolltop = $(window).scrollTop();

    if (cur_scrolltop < how_it_works_top) {
        $("html, body").animate({scrollTop: how_it_works_top}, duration);
    }
    else if (cur_scrolltop < services_top) {
        $("html, body").animate({scrollTop: services_top}, duration);
    }
    else if (cur_scrolltop < stay_clever_top) {
        $("html, body").animate({scrollTop: stay_clever_top}, duration);
    }

    return false; //Does this need to be here?
});


// For smooth scrollspy scrolling (thanks to nice a.. from SO)
$("nav ul li a[href^='#'], nav .navbar-header a[href^='#']").on("click", function(e) {
    //First arg is for the navbar items, second arg is for the brand logo

    //prevent default anchor click behavior
    e.preventDefault();

    //store hash
    var hash = this.hash;

    //console.log(hash);

    //animate
    $("html, body").animate({
        scrollTop: $(hash).offset().top
    }, 300, function(){
        //when done, add hash to url
        //(default click behaviour)
        window.location.hash = hash;
    });
});


// ===================== For device select buttons =====================
$(".device_select ~ label").click(function() {

    var device_type = $(this).data("value");
    $("#" + device_type + "_model_chosen").val($(this).find("p").html()); 
    //Set the model that has been chosen   

    if ($("#" + device_type + "_problem_chosen").val() !== "0") {
        //console.log("The Model Is: " + $("#" + device_type + "_model_chosen").val()); //The model
        //console.log("The Problem Is: " + $("#" + device_type + "_problem_chosen").val()); //The problem

        var model = $(this).find("p").html();
        var problem = $("#" + device_type + "_problem_chosen").val();

        check_and_set_repair_prices(model, problem);

    }
});


// ===================== For problem select buttons =====================
$(".problem_select ~ label").click(function() {

    var device_type = $(this).data("value");
    $("#" + device_type + "_problem_chosen").val($(this).html());  
    //Set the problem that has been chosen

    if ($("#" + device_type + "_model_chosen").val() !== "0") {
        //console.log("I'MA SET THE PRICE FROM PROBLEM!")
        //console.log("The Model Is: " + $("#" + device_type + "_model_chosen").val()); //The model
        //console.log("The Problem Is: " + $("#" + device_type + "_problem_chosen").val()); //The problem

        var model = $("#" + device_type + "_model_chosen").val();
        var problem = $("#" + device_type + "_problem_chosen").val();

        check_and_set_repair_prices(model, problem);
    }

});


function check_and_set_repair_prices(model, problem) {
    if (model === "27''" || model === "21.5''") {
        check_imac_repair_prices(model, problem);
    }
    else if (model === "Macbook Air" || model === "Macbook Pro (non-Retina)" ||
            model === "Macbook Pro (Retina)") {
        check_mac_repair_prices(model, problem);
    }
    else if (model === "7 Plus / 7" || model === "6s Plus / 6s" || 
            model === "6 Plus / 6" || model === "5 SE/5s/5c/5") {
        check_iphone_repair_prices(model, problem);
    }
    else if (model === "2/3/4/Air" || model === "Air 2" || 
            model === "Mini 1/2/3" || model === "Mini 4") {
        check_ipad_repair_prices(model, problem);
    }
}


function check_imac_repair_prices(model, problem) {
    switch(problem) {
        case "Video Card":
            set_imac_repair_prices(model, "$290-$380", "$290-$380");
            break;
        case "SSD":
            set_imac_repair_prices(model, "$422-$575", "$422-$575");
            break;
        case "LCD":
            set_imac_repair_prices(model, "$380-$741", "$280-$446");
            break;
        case "Motherboard":
            set_imac_repair_prices(model, "$399-499", "$399-499");
            break;
        case "DVD Drive":
            set_imac_repair_prices(model, "$217", "$217");
            break;
        case "RAM":
            set_imac_repair_prices(model, "$128-$218", "$128-$218");
            break;
        case "Power Supply":
            set_imac_repair_prices(model, "$240", "$240");
            break;
        case "Data Recovery":
            set_imac_repair_prices(model, "$190-$???", "$190-$???");
            break;
        case "Virus":
            set_imac_repair_prices(model, "$79", "$79");
    }
}


function check_mac_repair_prices(model, problem) {
    switch(problem) {
        case "Video Card":
            set_mac_repair_prices(model, "$285", "$285", "$325");
            break;
        case "SSD":
            set_mac_repair_prices(model, "$570-$873", "$327-$480", "$570-$873");
            break;
        case "LCD":
            set_mac_repair_prices(model, "$256-$355", "$158-$390", "$350-$505");
            break;
        case "Motherboard":
            set_mac_repair_prices(model, "$399", "$399", "$499");
            break;
        case "Keyboard":
            set_mac_repair_prices(model, "$220", "$220", "$220");
            break;
        case "RAM":
            set_mac_repair_prices(model, "(No Service)", "$128-$218", "(No Service)");
            break;
        case "Battery":
            set_mac_repair_prices(model, "$99", "$99", "$155");
            break;
        case "Data Recovery":
            set_mac_repair_prices(model, "$190-$???", "$190-$???", "$190-$???");
            break;
        case "Virus":
            set_mac_repair_prices(model, "$79", "$79", "$79");
    }
}


function check_iphone_repair_prices(model, problem) {
    switch(problem) {
        case "Screen":
            set_iphone_repair_prices(model, "$135/$125", "$125/$99", "$89/$79", "$69");
            break;
        case "Wifi":
            set_iphone_repair_prices(model, "$56-$120", "$56-$120", "$56-$120", "$56-$120");  
            break;
        case "Speakers":
            set_iphone_repair_prices(model, "$62", "$62", "$62", "$62");  
            break;
        case "Battery":
            set_iphone_repair_prices(model, "$66", "$66", "$66", "$66");
            break;
        case "Headphone":
            set_iphone_repair_prices(model, "$70", "$70", "$70", "$70");
            break;
        case "Home Button":
            set_iphone_repair_prices(model, "$56", "$56", "$56", "$56");
            break;
        case "Water Damage":
            set_iphone_repair_prices(model, "$120-$285", "$120-$285", "$120-$285", "$120-$285");
            break;
        case "Charge Port":
            set_iphone_repair_prices(model, "$70", "$70", "$70", "$70");
            break;
        case "Camera":
            set_iphone_repair_prices(model, "$66", "$66", "$66", "$66");
    }
}


function check_ipad_repair_prices(model, problem) {
    switch(problem) {
        case "Screen":
            set_ipad_repair_prices(model, "$89", "$329", "$99", "$199");
            break;
        case "Wifi":
            set_ipad_repair_prices(model, "$93", "$93", "$93", "$93");
            break;
        case "Speakers":
            set_ipad_repair_prices(model, "$97", "$97", "$97", "$97");
            break;
        case "Battery":
            set_ipad_repair_prices(model, "$105", "$105", "$105", "$105");
            break;
        case "Headphone":
            set_ipad_repair_prices(model, "$92", "$92", "$92", "$92");
            break;
        case "Home Button":
            set_ipad_repair_prices(model, "$98", "$98", "$98", "$98");
            break;
        case "LCD":
            set_ipad_repair_prices(model, "$118-$140", "$230", "$142", "$230");  
            break;
        case "Charge Port":
            set_ipad_repair_prices(model, "$97", "$97", "$97", "$97");  
            break;
        case "Camera":
            set_ipad_repair_prices(model, "$91", "$91", "$91", "$91");  
    }
}
// ================ PRICE CHANGES END ================


function set_imac_repair_prices(model, imac27_price, imac215_price) {
    if (model === "27''") {
        $("#imac_repair_price").html(imac27_price);
    }
    else if (model === "21.5''") {
        $("#imac_repair_price").html(imac215_price);
    }
}


function set_mac_repair_prices(model, mbair_price, 
                               mbpro_non_retina_price, 
                               mbpro215_retina_price) {
    if (model === "Macbook Air") {
        $("#mac_repair_price").html(mbair_price);
    }
    else if (model === "Macbook Pro (non-Retina)") {
        $("#mac_repair_price").html(mbpro_non_retina_price);
    }
    else if (model === "Macbook Pro (Retina)") {
        $("#mac_repair_price").html(mbpro215_retina_price);
    }
}


function set_iphone_repair_prices(model, iphone7p7_price, iphone6sp6s_price, 
                                    iphone6p6_price, iphone5se5s5c5_price) {
    if (model === "7 Plus / 7") {
        $("#iphone_repair_price").html(iphone7p7_price);
    }
    else if (model === "6s Plus / 6s") {
        $("#iphone_repair_price").html(iphone6sp6s_price);
    }
    else if (model === "6 Plus / 6") {
        $("#iphone_repair_price").html(iphone6p6_price);
    }
    else if (model === "5 SE/5s/5c/5") {
        $("#iphone_repair_price").html(iphone5se5s5c5_price);
    }
}


function set_ipad_repair_prices(model, ipad234air_price, ipadair2_price, 
                                ipadmini123_price, ipadmini4_price) {
    if (model === "2/3/4/Air") {
        $("#ipad_repair_price").html(ipad234air_price);
    }
    else if (model === "Air 2") {
        //console.log("HERE");
        $("#ipad_repair_price").html(ipadair2_price);
    }
    else if (model === "Mini 1/2/3") {
        $("#ipad_repair_price").html(ipadmini123_price);
    }
    else if (model === "Mini 4") {
        $("#ipad_repair_price").html(ipadmini4_price);
    } 
}


$("#imac_service_pickup").click(function() {
    //Take model type and pre-fill #model_type
    //Take problem and pre-fill #symptoms/needs
    var decoded = decode_entities($("#imac_model_chosen").val());
    $("#model_type").val(decoded); 
    $("#problem").val($("#imac_problem_chosen").val());
});


$("#mac_service_pickup").click(function() {
    //Take model type and pre-fill #model_type
    //Take problem and pre-fill #symptoms/needs

    var decoded = decode_entities($("#mac_model_chosen").val());
    $("#model_type").val(decoded);
    $("#problem").val($("#mac_problem_chosen").val());

});


$("#iphone_service_pickup").click(function() {
    //Take model type and pre-fill #model_type
    //Take problem and pre-fill #symptoms/needs

    var decoded = decode_entities($("#iphone_model_chosen").val())
    $("#model_type").val(decoded);
    $("#problem").val($("#iphone_problem_chosen").val());


});


$("#ipad_service_pickup").click(function() {
    //Take model type and pre-fill #model_type
    //Take problem and pre-fill #symptoms/needs

    var decoded = decode_entities($("#ipad_model_chosen").val());
    $("#model_type").val(decoded);
    $("#problem").val($("#ipad_problem_chosen").val());

});


//Need this for decoding HTML entities (thanks to lucascaro from SO)
function decode_entities(encoded_string) {
    //var decoded = $("<div/>").html($("#iphone_model_chosen").val()).text();
    //^Don't do it this way. Apparently this makes us open to XSS attacks.
    var text_area = document.createElement('textarea');
    text_area.innerHTML = encoded_string;
    return text_area.value;
}


function add_device(div_name){

    if (counter === 1) {
        $("#remove_device_btn").css("display", "inline-block");
    }

    if (counter == limit)  {
        alert("You have reached the limit of adding " + counter + " devices");
    }
    else {
        var new_div = document.createElement("div");
        new_div.id = "dynamic_device_group" + counter;
        new_div.innerHTML = "<hr/>\
                            <div class='form-group'>\
                                <h4 style='text-decoration: underline;'>Device "+(counter+1)+"</h4>\
                                <div class='row'>\
                                    <div class='col-xs-6'>\
                                        <label class='required' for='model_type'>Model Type</label>\
                                        <select class='form-control' id='model_type' name='model_type[]'>\
                                            <option style='display:none;' selected>Select Model Type</option>\
                                            <option>27''</option>\
                                            <option>21.5''</option>\
                                            <option>Macbook Air</option>\
                                            <option>Macbook Pro (non-Retina)</option>\
                                            <option>Macbook Pro (Retina)</option>\
                                            <option>7 Plus / 7</option>\
                                            <option>6s Plus / 6s</option>\
                                            <option>6 Plus / 6</option>\
                                            <option>5 SE/5s/5c/5</option>\
                                            <option>2/3/4/Air</option>\
                                            <option>Air 2</option>\
                                            <option>Mini 1/2/3</option>\
                                            <option>Mini 4</option>\
                                        </select>\
                                    </div>\
                                    <div class='col-xs-6'>\
                                        <label class='required' for='serial_number'>12-Character Serial #</label>\
                                        <input class='form-control' id='serial_number' name='serial_number[]'>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class='form-group'>\
                                <div class='row'>\
                                    <div class='col-xs-6'>\
                                        <label class='required' for='problem'>Problem</label>\
                                        <input class='form-control' id='problem' name='problem[]'>\
                                    </div>\
                                    <div class='col-xs-6'>\
                                        <label for='cust_ref_num'>Customer Reference #</label>\
                                        <input class='form-control' id='cust_ref_num' name='cust_ref_num[]'>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class='form-group'>\
                                <div class='row'>\
                                    <div class='col-xs-12'>\
                                        <label for='other_info'>Other Info</label>\
                                        <textarea class='form-control' id='other_info' rows=4 name='other_info[]' style='resize:none;'></textarea>\
                                    </div>\
                                </div>\
                            </div>"
        document.getElementById(div_name).appendChild(new_div); //think: div_name stands in for "this"?
        counter++;
    }
}


function remove_device() {

    //console.log("Deleteing dynamic_device_group"+(counter-1));
    $("#dynamic_device_group"+(counter-1)).remove();
    counter--;

    //$("#start_a_repair_body").animate({scrollTop: ($("#dynamic_device_group"+(counter-1)).position().top + $("#dynamic_device_group"+(counter-1)).outerHeight(false))}, 300);


    if (counter === 1) {
        $("#remove_device_btn").css("display", "none");
    }
}


// ============== PICK-UP REQUEST SUBMISSION ==============
$("#pick_up_req_submit_btn, #pick_up_request_inner_submit").click(function() {

    $.ajax({
            type: "POST",
            url: "pick_up_request.php",
            data: $('form#pick_up_request_form').serialize(),
            success: function(msg){ //msg contains the echo value?
                //$("#thanks").show(); //Not if we make submit bring up the modal...
                //Note that #thanks, in the original code example, was merely a div...

                //Fill out the text in the modal...
                $("#processing_msg").hide();
                $("#pick_up_request_result_msg").html(msg);

                if (!msg.includes("Oops")) {
                    //I should also clear the text fields in addition to hiding...
                    $("#pick_up_request_modal").modal("hide"); 
                    $("#first_name").val("");
                    $("#last_name").val("");
                    $("#email").val("");
                    $("#phone").val("");
                    $("#company").val("");
                    $("#street_address").val("");
                    $("#city").val("Select City");
                    $("#address_line2").val("");
                    $("#zip_postal").val("");
                    $("#model_type").val("Select Model Type");
                    $("#serial_number").val("");
                    $("#problem").val("");
                    $("#cust_ref_num").val("");
                    $("#other_info").val("");

                    //Delete dynamically generated devices
                    var device_lst = $("#dynamic_input").children();
                    //console.log(device_lst);
                    for (var i = 0; i < device_lst.length; i++) {
                        if ($(device_lst[i]).attr("id").substr(-1) !== "0") {
                            $(device_lst[i]).remove();
                            counter--;
                        }
                    }

                    $("#hidden_service_type").prop("checked", "check");                              
                    $("#hidden_agree_to_terms").prop("checked", "check");                             
                }
            },
            error: function(){
                alert("failure");
            }
   });
});


$("#pick_up_request_result").on("hidden.bs.modal", function (e) {
    //Make visible the #processing_msg element:
    $("#processing_msg").show();
    //Hide text of #pick_up_request_result_msg element:
    $("#pick_up_request_result_msg").empty();
})


//============== CONTACT FORM SUBMISSION ==============
$("#contact_submit_btn").click(function() {
    //console.log("HEY IN CLICK!!");
    $.ajax({
            type: "POST",
            url: "send_msg.php",
            data: $('form#contact_form').serialize(),
            success: function(msg){ //msg contains the echo value?
                //$("#thanks").show(); //Not if we make submit bring up the modal...
                //Note that #thanks, in the original code example, was merely a div...

                //Fill out the text in the modal...
                $("#contact_us_result_msg").html(msg);

                if (!msg.includes("Oops")) {
                    //I should also clear the text fields in addition to hiding...
                    $("#contact_us_modal").modal("hide"); 
                    $("#contact_us_name").val("");
                    $("#contact_us_email").val("");
                    $("#contact_us_subject").val("");
                    $("#contact_us_msg").val("");
                }
            },
            error: function(){
                alert("failure");
            }
   });
});


function is_numeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
//^Got this from: http://stackoverflow.com/questions/18082/validate-decimal-numbers-in-javascript-isnumeric

function validate_phone_num(num) {
    var phone_num_regex = /^\(?([0-9]{3})\)?-?([0-9]{3})-?([0-9]{4})$/;
    if (num.match(phone_num_regex)) {
        return true;
    }
    else {
        return false;
        //Perhaps use AJAX here?
    }
}
//^Got this from http://stackoverflow.com/questions/18375929/validate-phone-number-using-javascript


$(".nav a, li > .pick_up_request_btn").click(function(e) {
    //console.log("LOL!");
    $("#collapsed_menu").collapse("hide");
});


//Code for closing an open collapsed navbar when clicking outside of it. Got this from:
//http://stackoverflow.com/questions/23764863/how-to-close-an-open-collapsed-navbar-when-clicking-outside-of-the-navbar-elemen
$(document).ready(function () {
    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("navbar-collapse collapse in");
        if (_opened === true && !clickover.hasClass("navbar-toggle")) {
            $("button.navbar-toggle").click();
        }
    });
});


//For having the background become a different color for different modals.
//Got this from: 
//http://stackoverflow.com/questions/12000011/bootstrap-change-modal-backdrop-opacity-only-for-specific-modals
$('.modal[data-color]').on('show.bs.modal hidden.bs.modal', function () {
    $('body').toggleClass('modal-color-'+ $(this).data('color'));
});


$("#envelope").click(function() {
   $("#msg_info_modal").modal("hide"); 
});


//For preventing user from submitting form by pressing enter
$(window).keydown(function(event){
    if(event.keyCode == 13) {
        event.preventDefault();
        return false;
    }
});


function get_location() {
    //navigator.permissions.query({"name": "geolocation"}).
    //then(permission => console.log(permission.state))
    navigator.permissions.query({"name": "geolocation"}).then(
        function(permission) {
            if (permission.state === "prompt") {
                $("#dir_msg").text("Please allow location access" +
                " in your browser to receive your directions!")
            }
            else if (permission.state === "granted") {
                $("#dir_msg").text("Sit tight! We'll have your directions in a moment...")
            }
        }
    );

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition
        (get_google_directions, show_error);
    } else { 
        var alert_msg = "Geolocation is not supported by this browser."
        alert(alert_msg)
    }
}


function get_google_directions(position) {
    var lat = position.coords.latitude
    var lon = position.coords.longitude

    var url = "https://www.google.com/maps/dir/"+lat+
              ","+lon+"/1150+Murphy+Ave+%23205,+San+Jose,+CA+95131/"
    window.location.href = url
}


function show_error(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            $("#dir_msg").text("You have denied location access.")
            break;
        case error.POSITION_UNAVAILABLE:
            $("#dir_msg").text("Location information is unavailable.")
            break;
        case error.TIMEOUT:
            $("#dir_msg").text("The request to obtain location timed out.")
            break;
        case error.UNKNOWN_ERROR:
            $("#dir_msg").text("An unknown error occurred.")
            break;
    }
}