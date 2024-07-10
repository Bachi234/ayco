$(function(){
    $(document).ready(function() {
        $('.delcat').click(function(){
            var id = $(this).data('id');
            var text = $(this).data('text');
            $.ajax({
                type:'POST',
                url: surl+'admin/deleteCategory',
                data: {
                    id:id, 
                    text:text
                },
                success:function(data){
                    console.log(data);
                }
                ,
                error:function(){
                } 
            });
        });
    });
})