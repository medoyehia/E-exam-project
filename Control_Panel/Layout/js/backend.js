$(function()
 {
   
    'user strict';
    $('.condition .full-view').fadeOut(200);
    //Dashboard
    $('.toggle-info').click(function(){
        $(this).toggleClass('selected').parent().next('.card-body').fadeToggle(300);
        
        if($(this).hasClass('selected')){
            $(this).html('<i class="fa fa-minus fa-lg"></i>');
        }else{
            $(this).html('<i class="fa fa-plus fa-lg"></i>')
        }
    });
    
    $("#add_fields_placeholderValue").hide();
        $("#showf").hide();
    // hide placeholder on form focus
    $('[placeholder]').focus(function(){
        
        $(this).attr('data-text',$(this).attr('placeholder'));
        
        $(this).attr('placeholder','');
        
    }).blur(function(){
        
       $(this).attr('placeholder',$(this).attr('data-text')); 
    });
    
    
        
    // Add Asterisk On Required Field
   /* $('input').each(function(){
    
        if($(this).attr('required') === 'required'){
        $(this).after('<span class="asterisk" >*</span>');
       
            }
        }); 
    */
    //Convert Password Field To Text Filed On Hover
    var passField=$('.password');
    $('.show-pass').hover(function(){
       passField.attr('type','text'); 
        
    }, function(){
        passField.attr('type','password');
        
    });
    
    //Confirmation message on Button
    $('.confirm').click(function(){
        return confirm('Are you sure?');
    });
    
    //validation in email
    $(document).ready(function()
    {
        $("#email").keyup(function(){
           if(valideEmail()){
                $("#email").css("border","1px solid green");
                $("#emailMeg").html("<p class='text-success par'><i class='fa fa-check'></i> </p>");
                
            }else{
                $("#email").css("border","1px solid #c0392b");
                $("#emailMeg").html("<p class='text-danger par'><i class='fa fa-exclamation-circle'></i></p>");
            }
        });
        $("#otherEmail").keyup(function(){
           if(valideOtherEmail()){
                $("#otherEmail").css("border","1px solid green");
                $("#otherEmailMeg").html("<p class='text-success par'><i class='fa fa-check'></i> </p>");
                
            }else{
                $("#otherEmail").css("border","1px solid #c0392b");
                $("#otherEmailMeg").html("<p class='text-danger par'><i class='fa fa-exclamation-circle'></i></p>");
            }
        });
    });

    $(document).ready(function()
    {
        $("#name").keyup(function(){
           if(emptyfiled()){
                $("#name").css("border","1px solid green");
                $("#nameMeg").html("<p class='text-success par'><i class='fa fa-check'></i> </p>");
                
            }else{
                $("#name").css("border","1px solid #c0392b");
                $("#nameMeg").html("<p class='text-danger par'><i class='fa fa-exclamation-circle'></i></p>");
            }
        });
        
        $("#body").keyup(function(){
           if(emptybody()){
                $("#body").css("border","1px solid green");
                $("#bodyMeg").html("<p class='text-success par'><i class='fa fa-check'></i> </p>");
                
            }else{
                $("#body").css("border","1px solid #c0392b");
                $("#bodyMeg").html("<p class='text-danger par'><i class='fa fa-exclamation-circle'></i></p>");
            }
        });
        
        
         $("#scode").keyup(function(){
           if(scode()){
                $("#scode").css("border","1px solid green");
                $("#scodeMeg").html("<p class='text-success par'><i class='fa fa-check'></i> </p>");
                
            }else{
                $("#scode").css("border","1px solid #c0392b");
                $("#scodeMeg").html("<p class='text-danger par'><i class='fa fa-exclamation-circle'></i></p>");}});
        
        
        
        //Enabling a text field based on selecting a certain drop down value
        $("select[name=f]").change(function() {
            if (this.value == 20){
                $("input[name=t]").prop("disabled", false);
                $("#add_fields_placeholderValue").hide();
            }else if(this.value == 7){
                 $("input[name=t]").prop("disabled", true);
                
                 $("#conditionMsg").html("<div class='alert alert-success alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>الرجاء تسديد الرسوم الدراسية , الرجاء طباعة اذن توريد ب 50 جنية, احضار عدد 2 طابع جامعة فئة خمسون قرش, احضار تمغة فئة واحد جنية </div>");
                
                $("input[name=t]").prop("disabled", true);
                $("#add_fields_placeholderValue").show();
                
            }else if(this.value == 13){
                $("#add_fields_placeholderValue").show();
                 $("input[name=t]").prop("disabled", true);
            }else if(this.value == 8){
                $("#GmMsg").html("<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-exclamation-circle'></i> okkkkkkkkkkkkkkk </div>");
                
            }else{
                $("input[name=t]").prop("disabled", true);
                $("#add_fields_placeholderValue").hide();
            }
            
        }).change();
    });
   
        
   $('.showf').click(function(){
         $("#showf").show();
    });
    
    
    function valideEmail(){ var email=$("#email").val(); var reg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(reg.test(email)){return true;}else{return false;}}
     function valideOtherEmail(){ var otherEmail=$("#otherEmail").val(); var reg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(reg.test(otherEmail)){return true;}else{return false;}}
    
    function emptyfiled(){var name=$("#name").val();if(name.length > 15){return true;}else{return false;}}
    function emptybody(){var body=$("#body").val();if(body.length > 100){return true;}else{return false;}}
    
    function scode(){ var scode=$("#scode").val();if(scode.length > 15){return true;}else{return false;}}

    // Connect TO DropDown To Each Other  
     $(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "Level")
   {
    result = 'Department';
   }
   else
   {
    result = 'Wish';
   }
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});

/*sidebar*/
$(".sidebar-dropdown > a").click(function() {
      $(".sidebar-submenu").slideUp(200);
      if ($(this).parent().hasClass("active")) 
      {
        $(".sidebar-dropdown").removeClass("active");
        $(this).parent().removeClass("active");
      } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this).next(".sidebar-submenu").slideDown(200);
        $(this).parent().addClass("active");
      }
  });

  $("#close-sidebar").click(function() {
      $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
       $(".page-wrapper").addClass("toggled");
  });

 
      load_data();
      function load_data(page)  
                  {  
                       $.ajax({  
                            url:"pagination.php",  
                            method:"GET",  
                            data:{page:page},  
                            success:function(data){  
                                 $('#pagination_data').html(data);  
                            }  
                       })  
                  }  
                  $(document).on('click', '.pagination_link', function(){  
                       var page = $(this).attr("id");  
                       load_data(page);  
                  }); 

      

// Add active state to sidbar nav links
    
var path = window.location.href; 
// because the 'href' property of the DOM element is the absolute path
      
$("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            
if (this.href === path) {
                
$(this).addClass("active");
           
 }
        
});

 
   // Toggle the side navigation
    
$("#sidebarToggle").on("click", function(e) {
        
e.preventDefault();
        
$("body").toggleClass("sb-sidenav-toggled");
 
   });

    $(document).ready(function(){
    $('#example').DataTable();
    });
 
    
 /////////////////////////////////////////////////////////////////////////////////////   
function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetchs.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"Requests.php?do=Response",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
//////////////////////////////////////////////////////////////////////Department conditions //////////////////////////////////////
    $('.condition h3').click(function(){
        $(this).next('.full-view').fadeToggle(200);
    });
    // Exchange class active(color red) in Display
    $('.option span').click(function(){
        $(this).addClass('active').siblings('span').removeClass('active');
        if($(this).data('view') === 'full'){
            $('.condition .full-view').fadeIn(200);
        }else{
            $('.condition .full-view').fadeOut(200);
        }
    });
});






     
