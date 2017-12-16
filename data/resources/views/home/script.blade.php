<!-- TEST AJAX GET BOOOK NAME WHEN HOVE -->
<script>
    jQuery(document).ready(function(){
        jQuery('.bookimage').mouseover(function(){
            var id =  jQuery(this).data('id');
            console.log(id);
            $.get('ajax/getvoice/' + id, function(data){
                console.log(data);
                jQuery('.voice').attr('src',data).get(0).play();
            });
        });
        jQuery('.voice-comment').click(function(){
            var id =  jQuery(this).data('id');
            console.log(id);
            try {
                $.get('../ajax/getvoicecomment/' + id, function(data){
                console.log(data);
                jQuery('.voice').attr('src',data).get(0).play();
            });
            }
            catch(err) {
                alert("Nhấn lại lần nữa.");
            }
        });
    });
</script>