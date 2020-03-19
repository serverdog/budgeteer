<div class="modal fade" id="siteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <!--<div class="modal-footer"></div>-->
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#siteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
     
      var url = button.data('url');// Extract info from data-* attributes
      var size = button.data('size');
      var modal = $(this);
  
        modal.find('.modal-title').html(button.data('title'))
     
  
      if (typeof(size) !== 'undefined') {
      
        modal.find('.modal-dialog').addClass(size)
      }
      
      modal.find('.modal-body').load(url);
      
    
    });
  $('#siteModal').on("hidden.bs.modal", function(){
      $(".modal-body").html("");
      $(".modal-title").html("Loading...");
  });        
</script>