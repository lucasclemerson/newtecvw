try {
    $(document).ready(function(){   
        //variables
        var show = true;
        var delayCarousel = 0;
        var indexCarousel = -1;
        var videoOne = document.getElementById('video-carousel0');
        var videoTwo = document.getElementById('video-carousel1');
    
        //start carousel
        roadCarousel();

        $('.btn-prev').click(function(){prevCarousel();});
        $('.btn-next').click(function(){nextCarousel();});
        $('.btn-toggle').click(function(){
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
        $('.btn-opcoes').click(function (){
            if (this.getElementsByTagName('ion-icon')[0].classList.contains('icon-ativo')){
                this.getElementsByTagName('ion-icon')[0].classList.remove('icon-ativo');          
                this.parentNode.getElementsByClassName('lista-header')[0].style.display="none";
            }else{
                //baixar todos os icon 
                $.each($('.btn-opcoes'), function(i, e){
                    
                    try {
                        if (e.getElementsByTagName('ion-icon')[0].classList.contains('icon-ativo')){
                            e.getElementsByTagName('ion-icon')[0].classList.remove('icon-ativo');            
                            e.parentNode.getElementsByClassName('lista-header')[0].style.display="none";
                        }
                    }catch(e){
                        console.log('Alguns botões não são dropdowns!');
                    }
                    


                });
                this.getElementsByTagName('ion-icon')[0].classList.add('icon-ativo');                
                this.parentNode.getElementsByClassName('lista-header')[0].style.display="block";
            }
        });


        function roadCarousel () {
            videoOne.volume="0.0";
            videoTwo.volume="0.0";
            indexCarousel ++;
            delayCarouse=5000;    
            if (indexCarousel > $('.slider').length) {
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
            });
           
            $.each($('.file-select'), function (i, e){
                e.classList.remove("checked");
            });
           

            try {
                $('.slider')[indexCarousel].style.display = "block"; 
            }
            catch (e) {
                indexCarousel=0;
                $.each($('.slider'), function (i, e){
                    e.style.display='none';
                });
                $('.slider')[indexCarousel].style.display = "block"; 
            }
            $('.file-select')[indexCarousel].classList.add("checked");     
            setTimeout(roadCarousel, delayCarouse);
        }



        function nextCarousel (){
            indexCarousel ++;
            if (indexCarousel > $('.slider').length) {
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

            //display:none all sources
            $.each($('.slider'), function (i, e){
                e.style.display='none';
            });

            //display:none all dots
            $.each($('.file-select'),function(i, e){
                e.classList.remove("checked");
            });

            $('.slider')[indexCarousel].style.display = "block"; 
            $('.file-select')[indexCarousel].classList.add("checked");

            /*
            try {
            }
            catch (e) {
                indexCarousel=0;
                $.each($('.slider'), function (i, e){
                    e.style.display='none';
                });
                $('.slider')[indexCarousel].style.display = "block"; 
            }*/
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

            //display:none all sources
            $.each($('.slider'), function (i, e){
                e.style.display='none';
            });

            //display:none all dots
            $.each($('.file-select'),function(i, e){
                e.classList.remove("checked");
            });

            try {
                $('.slider')[indexCarousel].style.display = "block";
            }
            catch (e) {
                indexCarousel=$('.slider').length;
                $.each($('.slider'), function (i, e){
                    e.style.display='none';
                });
                $('.slider')[indexCarousel].style.display = "block"; 
            }
            $('.file-select')[indexCarousel].classList.add("checked");
        }
    });
}catch (e){
    if (e instanceof TypeError){
        console.log('ERRO=> ' + e.message + '|uma variavel está com o tipo errado!'); 
    }
    else if (e instanceof DOMException){
        console.log('ERRO=> ' + e.message + '|um objeto não foi repassado para o dom!');     
    }
    else{
        logMyErrors(e);
    }
}