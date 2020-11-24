$(document).ready(function(){

    //
    $(document).on("change", "#category", function(){
        var option = $(this).find('option:selected');
        // var selected =$(this).attr("select")
        var value= option.val();
        if(value !=""){
            fireDataForMe("category-search", "Sub", value, "#sub");
            fireDataForMe("category-search", "Brand", value, "#brand");
            $.ajax({
                success:function(){
                   $("#groups").html('');
                }
    
            });

        }        
    });


    $(document).on("click","#inlineFormCheck",function(){        
        if($(this).is(":checked")){
        fireDataForMe("category-search", "First", '', "#first");
    }else{
        $.ajax({
            success:function(){
               $("#first").html('');
            }

        });
    }
    })


    //update product
    $(document).on("change", "#categoryup", function(){
        var option = $(this).find('option:selected');
        var value= option.val();
        var id = option.attr("idx");
        // alert(id)
        if(value !=""){ 
            fireDataForMe("category-search", "Sub", value, "#subs"+id);
            fireDataForMe("category-search", "Brand", value, "#brands"+id);
        }
        
    });




})


function fireDataForMe(dataLink, dataPost, dataValue, dataId){
    $.ajax({
        url:dataLink,
        method:"POST",
        data:{search:dataPost,id:dataValue},
        success:function(data){
            $(dataId).html(data);           
        }    
    });
}