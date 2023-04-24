$(document).ready(function(){

     $(".toggle-btn").click(function(){
        $("body").addClass('menuShow');
     });
     $(".menu-close").click(function(){
        $("body").removeClass('menuShow');
    });

    
    $(".font-btn.font-btn-increase").click(function(){
        $("body *").css('font-size','+=1');
    });

    $(".font-btn.font-btn-decrease").click(function(){
        $("body *").css('font-size','-=1');
    });

    $(".font-btn.font-btn-default").click(function(){
        $("body *").css('font-size','=1');
    });

    $(window).on('load', function() {
        $(".home-page").addClass('modal-open');
    });

    $(".modal-closebtn").click(function(){
        $(".home-page").removeClass('modal-open');
        

    });

    $('#pendingdrive').DataTable();
      

    



    $('.news-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots: true,
        autoplay :true,
        responsive:{
            0:{
                items:1
            }
        }
    });




    
})
