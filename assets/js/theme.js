jQuery(document).ready(function($){
    'use strict';

//****************  Validation input in Form   ************************* */ 


const form = document.getElementById("creation-form");
const title_field = document.getElementById("title-field");
const email_field = document.getElementById("email-field");
console.log('OK');

form.addEventListener("submit", (e) => {
    e.preventDefault();
    checkInputFields();
});

function checkInputFields() {
    const titleField = title_field.value.trim();
    const emailField = email_field.value.trim();
 
    

    if (titleField === "") {
        setInvalid(title_field, "Поле заголовок не может быть пустым.");
    } else {
        setValid(title_field);
    }

    if (emailField === "") {
        setInvalid(email_field, "Поле для  емейла должно быть заполнено.");
    } else if(!validEmail(emailField)) {
        setInvalid(email_field, "Емейл неверно введен")
    
    } else {
        setValid(email_field);

    }
    
    console.log("titleField")
}

function setInvalid(input, msg) {
    const form_field = input.parentElement;
    const small_tag = form_field.querySelector("small");

    small_tag.innerText = msg;

    form_field.className = "form-field error";
}

function setValid(input) {
    const form_field = input.parentElement;
    form_field.className = "form-field success";

    
}

function validEmail(em) {
    return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(em);
}


//****************  Upload Image Button  ************************* */ 

var btnUpload = $("#upload_file"),
    btnOuter = $(".button_outer");
btnUpload.on("change", function(e){
    var ext = btnUpload.val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
        $(".error_msg").text("Not an Image...");
    } else {
        $(".error_msg").text("");
        btnOuter.addClass("file_uploading");
        setTimeout(function(){
            btnOuter.addClass("file_uploaded");
        },3000);
        var uploadedFile = URL.createObjectURL(e.target.files[0]);
        setTimeout(function(){
            $("#uploaded_view").append('<img src="'+uploadedFile+'" />').addClass("show");
        },3500);
    }
});
$(".file_remove").on("click", function(e){
    $("#uploaded_view").removeClass("show");
    $("#uploaded_view").find("img").remove();
    btnOuter.removeClass("file_uploading");
    btnOuter.removeClass("file_uploaded");
});



// **************************** Отправка формы AJAX *****************************

$(document).ready(function(){
    $(".creation-form").submit(function() {
        var str = $(this).serialize();

        $.ajax({
            method: "POST",
            url: "http://projecttest/wp-admin/admin-ajax.php",
            data : {
            str,
            action: 'send_mail'
        }
         }).done(function() {
            $('.js-overlay-thank-you').fadeIn();
            $(this).find('input').val('');
            $('#creation-form').trigger('reset');
            $('#main_full').trigger('reset');
        })
    });
    return false;
}); 


//************ Закрыть Popup "спасибо" по клику на крестик ***************************

$('.js-close-thank-you').click(function() {
    $('.js-overlay-thank-you').fadeOut();
});

//************ Закрыть Popup "спасибо" по клику вне Popups***************************

$(document).mouseup(function (e) {
    var popup = $('.popup');
    if(e.target!=popup[0]&&popup.has(e.target).length === 0){
        $('.js-overlay-thank-you').fadeOut();
    }
});






});
