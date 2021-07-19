$(document).ready(function(){

  //code pour l'initialisation de la sidenav
    $('.sidenav').sidenav();

    //inistialisation du modal
    $('.modal').modal();

    $('.tabs').tabs();

    $('#alert_close').click(function(){
      $('#alert_box').fadeOut("slow", function(){

      });
    });

    $('.fixed-action-btn').floatingActionButton();

    $('.tooltipped').tooltip();
    $('.collapsible').collapsible();
    $('.datepicker').datepicker();
    

    //slides des images

    $('.slider').slider({indicators: false, height: 400, duration: 400 });

    /* =============== Back To Top =============== */
    var offset = 300,
        scroll_top_duration = 1400,
        $back_to_top = $('.back-to-top');
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('back-to-top-is-visible') : $back_to_top.removeClass('back-to-top-is-visible');
    });

    //smooth scroll to top --->>> Optional
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
                scrollTop: 0 ,
            }, scroll_top_duration
        );
    });



    /*$('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators:true
    });*/

    //galery
      $('.materialboxed').materialbox();

    //select dans les formulaires
    $('select').formSelect();

    //caroussel
    $('.carousel').carousel();

    //initialisation du dropdown dans le menu
    $('.dropdown-trigger').dropdown({
        'alignment' : 'bottom',
        'coverTrigger' : false,
        'constrainWidth' : false,
        'inDuration' : 300,
        'outDuration' : 300
    });

    //inistialisation du modal
    /*$('.modal').modal({
        'startingTop' : '4%'
    });
    */


    $('.chips').chips({
        placeholder: 'Enter a tag',
        secondaryPlaceholder: '+Tag',
    });
    $('.chips-initial').chips({
        data: [{
          tag: 'Apple',
        }, {
          tag: 'Microsoft',
        }, {
          tag: 'Google',
        }],
    });
    $('.chips-placeholder').chips({
        placeholder: 'Enter a tag',
        secondaryPlaceholder: '+Tag',
    });
    $('.chips-autocomplete').chips({
        autocompleteOptions: {
          data: {
            'PHP': null,
            'JAVA': null,
            'LARAVEL': null,
            'JEE' : null,
            'Android Studio' : null,
            'Ubuntu Server' : null
          },
          limit: Infinity,
          minLength: 1
        }
    });
    
     
    
  });



