$().ready(function(){   
    //variables
    var show = true;
    var delayCarousel = 1000;
    var indexCarousel = -1;
    let videoOne = document.getElementById('video-carousel0');
    let videoTwo = document.getElementById('video-carousel1');
   

    $('#btn-toggle').click(function(){
        if (show){
            $.each($('.hidden'), function (i, e){
                e.style.display='block';
            });
        }else{
            $.each($('.hidden'), function (i, e){
                e.style.display='none';
            });
        }
        show = !show;
    }); 
 

    //start carousel
    roadCarousel();

    $('.btn-prev').click(function(){prevCarousel();});
    $('.btn-next').click(function(){nextCarousel();});

    function roadCarousel () {
        videoOne.volume="0.1";
        videoTwo.volume="0.1";
        indexCarousel ++;
        delayCarouse=5000;    
        if (indexCarousel >= $('.slider').length) {
            indexCarousel=0;
            videoOne.play();
            videoOne.currentTime = 0;
            videoTwo.pause();
            delayCarouse = videoOne.duration*1000;
        }else if(indexCarousel == 1) { 
            videoTwo.play();
            videoTwo.currentTime = 0;
            videoOne.pause();
            delayCarouse = videoTwo.duration*1000;
        }else{
            videoOne.pause();
            videoTwo.pause();
        }
        $.each($('.slider'), function (i, e){
            e.style.display='none';
            document.getElementById('input'+i).checked=false;
        });
        try {
            document.getElementById('input'+indexCarousel).checked=true;
            $('.slider')[indexCarousel].style.display = "block"; 
        }
        catch (e) {
            indexCarousel=0;
            $.each($('.slider'), function (i, e){
                e.style.display='none';
            });
            document.getElementById('input'+indexCarousel).checked=true;
            $('.slider')[indexCarousel].style.display = "block"; 
        }
        setTimeout(roadCarousel, delayCarouse);
    }
    function nextCarousel (){
        indexCarousel ++;
        if (indexCarousel >= $('.slider').length) {
            indexCarousel=0;
            videoOne.play();
            videoOne.currentTime = 0;
            videoTwo.pause();
        }else if(indexCarousel == 1) { 
            videoTwo.play();
            videoTwo.currentTime = 0;
            videoOne.pause();
        }else{
            videoOne.pause();
            videoTwo.pause();
        }

        $.each($('.slider'), function (i, e){
            e.style.display='none';
            document.getElementById('input'+i).checked=false;
        });

        try {
            $('.slider')[indexCarousel].style.display = "block"; 
            document.getElementById('input'+indexCarousel).checked=true;
        }
        catch (e) {
            indexCarousel=0;
            $.each($('.slider'), function (i, e){
                e.style.display='none';
            });
            $('.slider')[indexCarousel].style.display = "block"; 
            document.getElementById('input'+indexCarousel).checked=true;
        }
    }
    function prevCarousel (){
        indexCarousel --;
        if (indexCarousel < 0) {
            indexCarousel=0;
            videoOne.play();
            videoOne.currentTime = 0;
            videoTwo.pause();
        }else if(indexCarousel == 1) { 
            videoTwo.play();
            videoTwo.currentTime = 0;
            videoOne.pause();
        }else{
            videoOne.pause();
            videoTwo.pause();
        }

        $.each($('.slider'), function (i, e){
            e.style.display='none';
            document.getElementById('input'+i).checked=false;
        });

        try {
            $('.slider')[indexCarousel].style.display = "block";
            document.getElementById('input'+indexCarousel).checked=true;
        }
        catch (e) {
            indexCarousel=$('.slider').length;
            $.each($('.slider'), function (i, e){
                e.style.display='none';
            });
            $('.slider')[indexCarousel].style.display = "block"; 
            document.getElementById('input'+indexCarousel).checked=true;
        }
    }

});