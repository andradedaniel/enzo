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

// "Seleciona" o menu lateral que foi selecionado baseado na URL
// @TODO quando tem http://server.app/funcao/metodo nao está funcionando 
$(function() {
    var path = window.location.pathname;
     $(".sidebar-menu li a").each(function(){
        // alert('url='+url+"\n"
        //     +'pgurl='+pgurl+"\n"
        //     +'href='+$(this).attr("href")+'\n')
        if(location.origin+'/' == $(this).attr("href") && $(this).attr("href") == document.URL)
            $(this).parent().addClass("active");
         if(location.pathname != '/' && $(this).attr("href").indexOf(location.pathname) > -1) //location.pathname.substring(1,location.pathname.lastIndexOf('/'))
//           if( pgurl == $(this).attr("href"))
            $(this).parent().addClass("active");
     })
});



function showInvestidorDetalhes(elem)
{
    var id = $(elem).attr("id");
    $("#"+id+"_detalhes").toggle();
}




$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-body').css({
  //             width:'auto', //probably not needed
  //             height:'auto', //probably not needed
  //             'max-height':'100%'
  //      });
  var base_url = modal.find('.modal-body input').val()
  modal.find('.modal-body img').attr('src',base_url+'/'+recipient)
  // alert(base_url+'/'+recipient)
})
