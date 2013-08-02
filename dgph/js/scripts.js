(function ($) {
    $(document).ready(function() {
        $( "#accordion" ).accordion();
        $( "#accordion2" ).accordion();
        $( "#accordion3" ).accordion();
        
        $(document).on('click', 'form.custom span.custom.checkbox', function (event) {
                $(this).toggleClass('checked');
        });
        
        $('.has-tip').tooltip({
                    position: {
                    my: "center bottom-20",
                    at: "center top",
                    using: function( position, feedback ) {
                        $( this ).css( position );
                        $( "<div>" )
                        .addClass( "arrow" )
                        .addClass( feedback.vertical )
                        .addClass( feedback.horizontal )
                        .appendTo( this );
                    }
                }
            });
    });
})(jQuery);


function importDataTypeChanged() {
    var sel = jQuery('#dataType').val();
    var deptDisabled = (sel=='apcpi');
    jQuery('#department').attr('disabled', deptDisabled);
}

function setGridView(chk, typeName){
    console.log(typeName);
    if(chk == 1){
        if (jQuery("."+typeName).removeClass("list")){
            jQuery(".gridicon").css("opacity","0.1");
            jQuery(".listicon").css("opacity","1");
            jQuery("."+typeName).addClass("grid");
        }
    }
    else{
        if(jQuery("."+typeName).removeClass("grid")){
            jQuery(".gridicon").css("opacity","1");
            jQuery(".listicon").css("opacity","0.1");
            jQuery("."+typeName).addClass("list");
        }
    } 
}