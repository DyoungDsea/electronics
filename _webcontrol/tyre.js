$(document).ready(function(){
// alert("yes")
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









    $(document).on("click","#app", function(){
        var cid = $(this).attr("user");
        magicFunction('You want to approve this?', 'ajax-new', 'approveStore', 'new-store', cid, 'Approved');
    })

    $(document).on("click","#storeUn", function(){
        var cid = $(this).attr("user");
        magicFunction('You want to unban this?', 'ajax-new', 'storeUn', 'new-store', cid, 'Confirmed');
    })

    $(document).on("click","#storeBan", function(){
        var cid = $(this).attr("user");
        magicFunction('You want to ban this?', 'ajax-new', 'storeBan', 'new-store', cid, 'Confirmed');
    })

    $(document).on("click","#storeDel", function(){
        var cid = $(this).attr("user");
        magicFunction('You want to delete this?', 'ajax-new', 'storeDel', 'new-store', cid, 'Deleted');
    })



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




function magicFunction(sweetTitle, dataPost, dataTitle, dataLink, dataId, dataSuccess){
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: sweetTitle,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'        
        }).then((result) => {
        if (result.value){
            sendAjaxMessage(dataPost, dataTitle, dataLink, dataId, dataSuccess,'success')
        }
    });    
   
}


function sendAjaxMessage(dataPost, dataTitle, dataLink, dataId, sweetTitle, sweetType, dataValueA='', dataValueB='', dataValueC='' ){
    $.ajax({
        url:dataPost,
        method:"POST",                    
        data:{Message:dataTitle, id:dataId, valueA:dataValueA, valueB:dataValueB, valueC:dataValueC},        
        success:function(){
            setInterval(function(){
                window.location.assign(dataLink);
            },2000);             
        }
    }) .done(function(){
        Swal.fire({
            type:sweetType, 
            title:sweetTitle
        });
    }) .fail(function(){
        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
    });
}