
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){

    console.log($(this).parents('fieldset').index());

    if($(this).parents('fieldset').index() == 2) {
       typeID =  $('#type').val();

        if(typeID == null){
            $('select[name="types[_ids][]"]').css('border', '1px solid red');
            return false;
        }else{
            $('#type').css('border', '1px solid #CCCCCC');
        }
    }

    if($(this).parents('fieldset').index() == 3) {

       categoryID =  $('#category').val();

        if(categoryID == null){
            $('select[name="categories[_ids][]"]').css('border', '1px solid red');
            return false;
        }else{
            $('#category').css('border', '1px solid #CCCCCC');
        }
    }

    $('.submit').click(function(){
        var minPrice = $('input[name="min_price"]').val();
        var maxPrice = $('input[name="max_price"]').val();
        var minRoom = $('input[name="min_room"]').val();
        var maxRoom = $('input[name="max_room"]').val();
                if(!minPrice){
                    $('input[name="min_price"]').css('border', '1px solid red');
                    return false;
                }else{
                    $('input[name="min_price"]').css('border', '1px solid #CCCCCC');
                }

                if(!maxPrice){
                    $('input[name="max_price"]').css('border', '1px solid red');
                    return false;
                }else{
                    $('input[name="max_price"]').css('border', '1px solid #CCCCCC');
                }

                if(!minRoom){
                    $('input[name="min_room"]').css('border', '1px solid red');
                    return false;
                }else{
                    $('input[name="min_room"]').css('border', '1px solid #CCCCCC');
                }

                if(!maxRoom){
                    $('input[name="max_room"]').css('border', '1px solid red');
                    return false;
                }else{
                    $('input[name="max_room"]').css('border', '1px solid #CCCCCC');
                }

        //return false;
    });


    //if($(this).parents('fieldset').index() == 3){
    //    var minRange = $('input[name="min_range"]').val();
    //    var maxRange = $('input[name="max_range"]').val();
    //    var room = $('input[name="room"]').val();
    //
    //
    //        if(!minRange){
    //            $('input[name="min_range"]').css('border', '1px solid red');
    //            return false;
    //        }else{
    //            $('input[name="min_range"]').css('border', '1px solid #CCCCCC');
    //        }
    //
    //        if(!maxRange){
    //            $('input[name="max_range"]').css('border', '1px solid red');
    //            return false;
    //        }else{
    //            $('input[name="max_range"]').css('border', '1px solid #CCCCCC');
    //        }
    //
    //        if(!room){
    //            $('input[name="room"]').css('border', '1px solid red');
    //            return false;
    //        }else{
    //            $('input[name="room"]').css('border', '1px solid #CCCCCC');
    //        }
    //
    //}



    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50)+"%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale('+scale+')',
                'position': 'absolute'
            });
            next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: 800,
        complete: function(){
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        },
        duration: 800,
        complete: function(){
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

