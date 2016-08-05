
jQuery(document).ready(function() {
    
    jQuery('.brick').each(function() { 
        
        var colors = ["#CCCCCC","#333333","#990099"];   
        
        var rand = Math.floor(Math.random()*colors.length);
        
        $(".brick").css("background-color", colors[rand]);
        
    });
    
});