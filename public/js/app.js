// new Vue({
//     el: '#enzoApp',
//     ready: function(){
//         alert(this.$el.id);
//     }
// });

// $( document ).ready(function() {
//   // alert('comecei');
// });


$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
    // forceParse: false
})

/* @TODO está sempre marcando o dashboard. Bolar um jeito pra excluir ele do IF
    trecho retirado do proprio demo do AdminLTE. estudar ele pra ver o q faz
    var d = $(this)
    var f = d.parents("ul").first()
    var h = d.parent("li");
    f.find("li.active").removeClass("active"), h.addClass("active")
*/
$(function() {
    // var pgurl = window.location.href.substr(7); //remove o http://
    // var pgurl = pgurl.substr(pgurl.indexOf("/")+1);
     var pgurl = window.location.href;//.substr(window.location.href.lastIndexOf("/")+1);
     $(".sidebar-menu li a").each(function(){
          if(pgurl.indexOf($(this).attr("href")) > -1)
            $(this).parent().addClass("active");
     })
});

function showInvestidorDetalhes(elem)
{
    var id = $(elem).attr("id");
    $("#"+id+"_detalhes").toggle();
}
