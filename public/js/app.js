// new Vue({
//     el: '#enzoApp',
//     ready: function(){
//         alert(this.$el.id);
//     }
// });

// $( document ).ready(function() {
//   // alert('comecei');
// });

$(function() {
     var pgurl = window.location.href;//.substr(window.location.href.lastIndexOf("/")+1);
     $(".sidebar-menu li a").each(function(){
          if($(this).attr("href") == pgurl)
            $(this).parent().addClass("active");
     })
});

function showInvestidorDetalhes(elem)
{
    var id = $(elem).attr("id");
    $("#"+id+"_detalhes").toggle();
}
