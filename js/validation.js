
//signup form validation
$(function(){

  $('#errorname').hide();
  $('#errorusername').hide();
  $('#erroremail').hide();
  $('#errorpass').hide();
  $('#errorconpass').hide();

  var error_name = false;
  var error_username = false;
  var error_email = false;
  var error_pass = false;
  var error_conpass = false;

  $('#form_name').focusout(function(){
    checkName();
  });
  $('#form_username').focusout(function(){
    checkUserName();
  });
  $('#form_email').focusout(function(){
    checkEmail();
  });
  $('#form_pwd').focusout(function(){
    checkPass();
  });
  $('#form_conpwd').focusout(function(){
    checkConPass();
  });

  // check name
  function checkName(){
    var name = $('#form_name').val();
    var pattern = new RegExp(/^[a-zA-Z ]{5,30}$/);
    if (!pattern.test(name)) {
      $('#errorname').html('Should be between 5-30 contains only space');
      $('#errorname').show(300);
      error_name = true;
    }
    else {
        $('#errorname').hide(400);
    }
  }
  // check username
  function checkUserName(){
    var username = $('#form_username').val();
    var pattern = new RegExp(/^[a-zA-Z0-9._]{6,20}$/);
    if (!pattern.test(username)) {
      $('#errorusername').html('Should be between 6-20 contains only alphabets numbers . _');
      $('#errorusername').show(300);
      error_username = true;
    }
    else {
        $('#errorusername').hide(400);
    }
  }

  //check email
  function checkEmail(){
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    if (pattern.test($("#form_email").val())) {
      $('#erroremail').hide(400);
    }
    else {
        $('#erroremail').html('Invalid email address');
        $('#erroremail').show(300);
        error_email = true;
    }
  }

  // check password
  function checkPass(){
    var password = $('#form_pwd').val();
    var pattern = new RegExp(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/);

    if (!pattern.test(password)) {
      $('#errorpass').html('Should be at least a uppercase,lowercase,number,special characters and minimum length 8');
      $('#errorpass').show(300);
      error_pass = true;
    }
    else {
        $('#errorpass').hide(400);
    }
  }

  // check confirm password
  function checkConPass(){
    var password = $('#form_pwd').val();
    var con_pass = $('#form_conpwd').val();
    if (password != con_pass) {
      $('#errorconpass').html('Password not match');
      $('#errorconpass').show(300);
      error_conpass = true;
    }
    else {
        $('#errorconpass').hide(400);
    }
  }

  //form submit
  $('#reg_form').submit(function(){
    error_name = false;
    error_username = false;
    error_email = false;
    error_pass = false;
    error_conpass = false;
    checkName();
    checkUserName();
    checkEmail();
    checkPass();
    checkConPass();

    if (error_name == false && error_username == false && error_email==false && error_pass == false && error_conpass == false) {
      return true;
    }
    else {
      return false;
    }
  });

});




//post validation
$(function(){

  $('#errortitle').hide();
  $('#errorcatagory').hide();
  $('#errorbody').hide();

  var error_title = false;
  var error_cat = false;
  var error_body = false;

  $('#post-tittle').focusout(function(){
    checkTitle();
  });
  $('#taginput1').focusout(function(){
    checkTag();
  });
  $('#form_cat').focusout(function(){
    checkCatagory();
  });
  $('#form_body').focusout(function(){
    checkBody();
  });

  // check title
  function checkTitle(){
    var title = $('#post-tittle').val().length;
    if (title < 10) {
      $('#errortitle').html('Field is empty or too short');
      $('#errortitle').show(300);
      error_title = true;
    }
    else {
        $('#errortitle').hide(400);
    }
  }

  // check catagory
  function checkCatagory(){
    var catagory = $('#form_cat').val();
    if (catagory == "null" ) {
      $('#errorcatagory').html('Please select a catagory');
      $('#errorcatagory').show(300);
      error_cat = true;
    }
    else {
        $('#errorcatagory').hide(400);
    }
  }

  // check body
  function checkBody(){
    var postbody = $('#form_body').val().length;
    if (postbody==0) {
      $('#errorbody').html('Should be between 20-200');
      $('#errorbody').show(300);
      error_body = true;
    }
    else {
        $('#errorbody').hide(400);
    }
  }

  //form submit
  $('#post_form_question').submit(function(){
    error_title = false;
    error_cat = false;
    error_body = false;

    checkTitle();
    checkCatagory();
    checkBody();

    if (error_title == false && error_cat == false && error_body==false) {
      return true;
    }
    else {

      return false;
    }

  });

});


//tag validation
function addTag() {
  var tag1 = document.getElementById('taginput1').value;
  var tag2 = document.getElementById('taginput2').value;
  var tag3 = document.getElementById('taginput3').value;

  if (tag1.length<5 || tag1.length>20) {
    document.getElementById('error-messege').innerHTML = "Tags can only contain small letters and numbers. No space or special characters please. Min 4 and max 20 chars.";
    document.getElementById("post-tag").focus();
    return false;
  }
  if (tag2.length<5 || tag2.length>20) {
    document.getElementById('error-messege').innerHTML = "Tags can only contain small letters and numbers. No space or special characters please. Min 4 and max 20 chars.";
    document.getElementById("post-tag").focus();
    return false;
  }
  if (tag3.length<5 || tag3.length>20) {
    document.getElementById('error-messege').innerHTML = "Tags can only contain small letters and numbers. No space or special characters please. Min 4 and max 20 chars.";
    document.getElementById("post-tag").focus();
    return false;
  }
  else {
    document.getElementById('error-messege').innerHTML = "Tag added";
    document.getElementById('error-messege').style.color = "green";
    return true;
  }
}
