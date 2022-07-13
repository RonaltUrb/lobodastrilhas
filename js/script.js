var url = '/saintexperience/';

(function ($) {
"use strict"; // Start of use strict

// Smooth scrolling using jQuery easing
$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
    if (
        location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
    ) {
        var target = $(this.hash);
        target = target.length
            ? target
            : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
            $("html, body").animate(
                {
                    scrollTop: target.offset().top - 70,
                },
                1000,
                "easeInOutExpo"
            );
            return false;
        }
    }
});

// Closes responsive menu when a scroll trigger link is clicked
$(".js-scroll-trigger").click(function () {
    $(".navbar-collapse").collapse("hide");
});

// Activate scrollspy to add active class to navbar items on scroll
$("body").scrollspy({
    target: "#mainNav",
    offset: 100,
});

// Collapse Navbar
var navbarCollapse = function () {
    if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
    } else {
        $("#mainNav").removeClass("navbar-shrink");
    }
};
// Collapse now if page is not at top
navbarCollapse();
// Collapse the navbar when page is scrolled
$(window).scroll(navbarCollapse);
})(jQuery); // End of use strict
      
$('.form-agendar').submit(function(){

    var dados = {
        nome: $('.input-nome').val(),
        email: $('.input-email').val(),
        telefone: $('.input-telefone').val(),
        data: $('.input-data').val(),
        horario: $('.input-horario').val(),
        quantidade: $('.input-quantidade').val()
    };

    $.get( url+"index.php", {acao:'agendar', p:'home', dados:dados}, function(data) {
        if(data == 'true'){
            Swal.fire({
                title: 'Sucesso ao efetuar reserva!',
                text: 'Entraremos em contato o mais breve possível.',
                type: 'success',
                confirmButtonClass: "btn btn-round btn-success",
                confirmButtonText: 'Fechar',
                buttonsStyling: false
            });
        } else if(data == 'reservado'){
            Swal.fire({
                title: 'Ops, este horário já está reservado!',
                type: 'error',
                confirmButtonClass: "btn btn-round btn-danger",
                confirmButtonText: 'Fechar',
                buttonsStyling: false
            });
        } else {
            Swal.fire({
                title: 'Erro ao efetuar reserva, tente novamente!',
                type: 'error',
                confirmButtonClass: "btn btn-round btn-danger",
                confirmButtonText: 'Fechar',
                buttonsStyling: false
            });        
        }


        $('.input-nome').val('');
        $('.input-email').val('');
        $('.input-telefone').val('');
        $('.input-data').val('');
        $('.input-horario').val(0);
        $('.input-quantidade').val(0);
    });

});

$(document).ready(function(){   

    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        startDate: today,
        beforeShowDay: function(date) {
            var day = date.getDay();
            if(day == 0 || day == 1){
                return false;
            } else {
                return true;
            }
        }
    });

    $('.datepicker').keypress(function(event) {
       event.preventDefault();
       return false;
   });

    $('.datepicker').on('change', function(){
        var dataBr = $(this).val();
        var explode = dataBr.split('/');
        var dataUs = explode[2]+'-'+explode[1]+'-'+explode[0];
        var today = new Date(dataUs);
        var day = today.getDay();
        if(day == 0 || day == 6){
            $(this).val('');
        }
    });
});

