$(document).ready(function() {
       
       $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');
   
            if(!$('#dataConfirmModal').length) {
             $('body').append('<div id="dataConfirmModal" class="modal fade bs-modal-sm" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hiden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="dataConfrimLabel">Konfirmasi</h4><button type="button" class="close" data-dismiss="modal" aria-hiden="ture">&times;</button></div><div class="modal-body"> <h4 class="tanya"></h4> </div><div class="modal-footer"><button type="button" class="btn btn-default btn-sx" data-dismiss="modal" aria-hiden=""true"><i class="fa fa-close"></i> Tidak </button><a class="btn btn-danger btn-sx" aria-hiden="true" id="dataConfirmOK"><i class="fa fa-check-square-o"></i> Ya </a></div></div></div></div>');
             }
   
            $('#dataConfirmModal').find('.tanya').text($(this).attr('data-confirm'));
   
            $('#dataConfirmOK').attr('href',href);
   
            $('#dataConfirmModal').modal({show:true});
            return false;
           });
         
      });