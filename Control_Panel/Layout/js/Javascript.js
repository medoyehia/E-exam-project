$(function()
 {
    'user strict';
    
    // hide placeholder on form focus
    $('[placeholder]').focus(function(){
        
        $(this).attr('data-text',$(this).attr('placeholder'));
        
        $(this).attr('placeholder','');
        
    }).blur(function(){
        
       $(this).attr('placeholder',$(this).attr('data-text')); 
    });
    
    
        
    // Add Asterisk On Required Field
    $('input').each(function(){
    
        if($(this).attr('required') === 'required'){
        $(this).after('<span class="asterisk" > * </span>');
    
            }
        }); 
    
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
});




     
