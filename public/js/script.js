$().ready(function(){   
    //variables
    var show = true;
    var indexCarousel = 0;


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
    $('.btn-prev').click(function(){prevCarousel()});
    $('.btn-next').click(function(){nextCarousel()});


    roadCarousel();
    function roadCarousel () {
        indexCarousel ++;
        if (indexCarousel >= $('.slider').length) {
            indexCarousel=0;
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
        setTimeout(roadCarousel, 5000);
    }
    function nextCarousel (){
        indexCarousel ++;
        if (indexCarousel >= $('.slider').length) {
            indexCarousel=0;
        }

        $.each($('.slider'), function (i, e){
            document.getElementById('input'+i).checked=false;
            e.style.display='none';
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
    }
    function prevCarousel (){
        indexCarousel --;
        if (indexCarousel < 0) {
            indexCarousel=$('.slider').length;
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





/*

 var planos_index = 1;
    passar_planos();

    function passar_planos (){
        var content = document.getElementsByClassName("my-list-card-planos");
    
       
        if (planos_index > content.length) {
            planos_index = 1;
        }

        try {
            content[planos_index-1].style.display = "block";  
            content[planos_index-1].style.opacity = "0.2";  
            content[planos_index].style.display = "block";  
            content[planos_index].style.opacity = "1";    
            content[planos_index].style.transition = "5s";  
            content[planos_index+1].style.display = "block";    
            content[planos_index+1].style.opacity = "0.2";   
        }
        catch (e) {
            planos_index=1;
            for (i = 0; i < content.length; i++) {
                content[i].style.display = "none";  
                content[i].style.opacity = "1";  
            }

            content[planos_index-1].style.display = "block";  
            content[planos_index-1].style.opacity = "0.2";  
            content[planos_index].style.display = "block";   
            content[planos_index].style.opacity = "1";  
            content[planos_index+1].style.display = "block";   
            content[planos_index+1].style.opacity = "0.2";   
        }
        setTimeout(passar_planos, 5000);
    }
*/