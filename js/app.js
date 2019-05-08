/*Login or Registration Form Submit*/
/*$("#login_form, #login_form_manager, #register_student,#c,c").submit(function (e) {
    var obj = $(this), action = obj.attr('name'); /*Define variables*/
  /*  alert("hey");
    $.ajax({
        type: "POST",
        url: e.target.action,
        data: obj.serialize()+"&Action="+action,
        cache: false,
        success: function (JSON) {
            if (JSON.error != '') {
                alert(JSON.error);
                $("#"+action+" #display_error").show().html(JSON.error);
            } else {
                alert(JSON.error);
                window.location.href = "./";
            }
        }
    });
});*/
$(document).ready(function() {
    $( "#display_error_manager").hide();
    $( "#display_error_student").hide();
    $( "#display_error_register").hide();
    $("#display_error_add_manager").hide();
    $("#display_error_petition").hide();
    
    $("#login_form_student, #login_form_manager,#c,c").submit(function (e) {
     e.preventDefault();
     var obj = $(this);
     action = obj.attr('name'); /*Define variables*/
     var stdm = $("#StudentEmail").val();
     var stdp = $("#StudentPassword").val();
     var mngm = $("#ManagerEmail").val();
     var mngp = $("#ManagerPassword").val();
     var mail,password;
     if(action == 'student_login')
     {
         mail = stdm;
         password = stdp;
     }
     else
     {
         mail = mngm;
         password = mngp;
     }
     
     $.ajax({
         type: "POST",
         url:"submit.php",
         data: {action: action, mail: mail, password:password},
         cache: false,
         success:function(resp) {
             var response = resp;
            // var respp = JSON.parse(response);
             if(response.result == 'student')
               window.location.href="logged.php";
             else if (response.result == 'manager')
             window.location.href="admin.php";
             if(response.error)
             {
                 if(action == 'student_login')
                 {
                     $( "#display_error_student").show().html( response.error );
                     //$( "#display_error_student").style.display();
 
                 }
                 if(action == 'manager_login')
                 {
                     $( "#display_error_manager").show().html( response.error );
                    // $( "#display_error_manager").show();
 
                 }
             }
             //alert(JSON.stringify(response));
 
         },
         error:function(resp)
             {
               alert(JSON.stringify(resp));
             }
     });
 });
 $("#register_student").click(function (e) {
     e.preventDefault();
     var obj = $(this);
     action = 'register_student'; /*Define variables*/
     var reg_mail = $("#reg_mail").val();
     var reg_name = $("#reg_name").val();
     var reg_surname = $("#reg_surname").val();
     var reg_password = $("#reg_password").val();
     
     $.ajax({
         type: "POST",
         url:"submit.php",
         data: {action: action, reg_mail: reg_mail, reg_password:reg_password, reg_name:reg_name, reg_surname:reg_surname},
         cache: false,
         success:function(resp) {
             var response = resp;
            // var respp = JSON.parse(response);
             if(response.result == 'register')
               window.location.href="logged.php";
             if(response.error)
             {
                     $( "#display_error_register").show().html( response.error ); 
             }
             //alert(JSON.stringify(response));
 
         },
         error:function(resp)
             {
               alert(JSON.stringify(resp));
             }
     });
 
 
  
 });
 
 
 
 
 $("#addMan").click(function () {
    var Dtable = $('#dataTable');
    Dtable.append('<tr><th><input type="text" id="fname" placeholder = "Name"></th><th><input type="text" id="fsurname" placeholder = "Surame"></th><th><input type="text" id="fpassword" placeholder = "Password"></th><th><input type="text" id="fmail" placeholder = "Email"></th><th><input type="text" id="fcategory" placeholder = "Category"></th> <th><button id="saveAdd" class = "btn btn-danger">Save</button></th></tr>');
  
  $("#saveAdd").click(function () {
    var action = 'add_Manager';
    var fname = $("#fname").val();
    var fsurname = $("#fsurname").val();
    var fpassword = $("#fpassword").val();
    var fmail = $("#fmail").val();
    var fcategory = $("#fcategory").val();
    $.ajax({
        type: "POST",
        url:"submit.php",
        data: {action: action, fname: fname, fsurname:fsurname, fpassword:fpassword, fmail:fmail, fcategory:fcategory},
        cache: false,
        success:function(resp) {
            var response = resp;
           // var respp = JSON.parse(response);
            if(response.result == 'addManager')
              window.location.href="managers.php";
            if(response.error)
            {
                    $( "#display_error_add_manager").show().html( response.error ); 
            }
            //alert(JSON.stringify(response));

        },
        error:function(resp)
            {
              alert(JSON.stringify(resp));
            }
    });

    
  });
});


$("#submitPetition").click(function (e) {
    e.preventDefault();
    var obj = $(this);
    action = 'send_petition'; /*Define variables*/
    var petitionBody = $("#petitionBody").val();
    var topic  = $("#optPetition option:selected").val();  //header 
    var me = $('#Myinf').children("a").first().text();
    console.log(me);
    $.ajax({
        type: "POST",
        url:"submit.php",
        data: {action: action, petitionBody:petitionBody, topic:topic,me:me},
        cache: false,
        success:function(resp) {
            var response = resp;
           // var respp = JSON.parse(response);
            if(response.result == 'sent')
              window.location.href="logged.php";
            if(response.error)
            {
                    $( "#display_error_petition").show().html( response.error ); 
            }
            //alert(JSON.stringify(response));

        },
        error:function(resp)
            {
              alert(JSON.stringify(resp));
            }
    });


 
});




   });
 
 