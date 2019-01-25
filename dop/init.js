$(document).ready(function(){
    $('.mob-slider-cont').slick({
        infinite: true,
        autoplay: false,
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        appendDots: '.slider-navig',
        prevArrow: '<span data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">prev</span>',
        nextArrow: '<span data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">next</span>',
    });
    $('.mob-slider-cont-2').slick({
        infinite: true,
        autoplay: false,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        appendDots: '.slider-navig-2',
    });
    
    $('a[href^="#"]').click(function (){
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated), body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    })
    
    times=function(){         
        now = new Date();  
        
        hour=24-now.getHours();
        minu=60-now.getMinutes();
        secu=60-now.getSeconds(); 
        str=((hour+'').length==1?hour='0'+hour:hour)+'';
        $('.timer-h').html('<span class="timer-c">'+str.substring(0, 1)+'</span>'+'<span class="timer-c">'+str.substring(1)+'</span>');
        str=((minu+'').length==1?minu='0'+minu:minu)+'';
        $('.timer-m').html('<span class="timer-c">'+str.substring(0, 1)+'</span>'+'<span class="timer-c">'+str.substring(1)+'</span>');
        str=((secu+'').length==1?secu='0'+secu:secu)+'';
        $('.timer-s').html('<span class="timer-c">'+str.substring(0, 1)+'</span>'+'<span class="timer-c">'+str.substring(1)+'</span>');
    }                                                 
    setInterval(times,1000);
           
});
 