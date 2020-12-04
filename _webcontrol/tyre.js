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


    //Oders fire

    $(document).on("click", "#markProcess", function(){
        var orderId = $(this).attr("orderId");
        magicFunction('Mark as Confirmed?', 'ajax-new', 'markProcess', 'order-view?orderid='+orderId, orderId, 'Confirmed!');
    })

    $(document).on("click", "#markPaid", function(){
        var orderId = $(this).attr("orderId");
        magicFunction('Mark as Paid?', 'ajax-new', 'markPaid', 'order-view?orderid='+orderId, orderId, 'Confirmed!');
    })

    $(document).on("click", "#markShip", function(){
        var orderId = $(this).attr("orderId");
        var rowId = $(this).attr("rowId");
        magicFunction('Mark as Dispatched?', 'ajax-new', 'markShip', 'order-view?orderid='+orderId, orderId, 'Dispatched!', rowId);
    })

    $(document).on("click", "#markDelivered", function(){
        var orderId = $(this).attr("orderId");
        var rowId = $(this).attr("rowId");
        magicFunction('Mark as Delivered?', 'ajax-new', 'markDelivered', 'order-view?orderid='+orderId, orderId, 'Delivered!', rowId);
    })

    $(document).on("click", "#markReturned", function(){
        var orderId = $(this).attr("orderId");
        var rowId = $(this).attr("rowId");
        magicFunction('Mark as Returned?', 'ajax-new', 'markReturned', 'order-view?orderid='+orderId, orderId, 'Returned!', rowId);
    })


    $(document).on("click", "#corders", function(){
        var orderId = $(this).attr("orderId");
        var rowId = $(this).attr("rowId");
        magicFunction('Mark as cancelled?', 'ajax-new', 'corders', 'order-view?orderid='+orderId, orderId, 'Returned!', rowId);
    })



    $(document).on("change", "#location", function(){
        var option = $(this).find('option:selected');
        var value= option.val();
    
        if (value != "") {
            fireDataForMe('agent-fetch', 'Fetch', value, "#result");
            // fireDataForMe('agent-fetch', 'FetchOrder', value, "#resultorder");
            $("#myInput").val(value)
            var value = $(this).val().toLowerCase();
            $("#myDIV tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        }
    
        })

        $(document).on("click", "#customCheck", function(){
            // var checkMe = $(".checkMe");
            CheckPowerAll("#customCheck");
        })

        // $('#myTable').DataTable();



        $(document).on("click", "#approve", function(){
            var vid = $(this).attr("vid");        
            var user = $(this).attr("user"); 
            magicFunction('Approve this request?', 'ajax-new', 'Approve', '', vid, 'Approved!', user);
        })
    
        $(document).on("click", "#cancel", function(){
            var vid = $(this).attr("vid");        
            var user = $(this).attr("user");      
            var amount = $(this).attr("amount");    
            magicFunction('Cancel this request?', 'ajax-new', 'CanReq', '', vid, 'Cancelled!', user, amount);
        })
    
    
        $(document).on("click", "#paid", function(){
            var vid = $(this).attr("vid");         
            var user = $(this).attr("user");     
            magicFunction('Mark as Paid?', 'ajax-new', 'Paid', '', vid, 'Paid!', user); 
        })






})






function CheckPowerAll(dataId) {
    var elements = $(".checkMe");
    var l = elements.length;

    if ($(dataId).is(":checked")) {
        for (var i = 0; i < l; i++) {
            elements[i].checked = true;
        }
    } else {
        for (var i = 0; i < l; i++) {
            elements[i].checked = false;
        }
    }
}







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

function magicFunction(sweetTitle, dataPost, dataTitle, dataLink, dataId, dataSuccess, dataValueA='', dataValueB='', dataValueC='' ){
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
            sendAjaxMessage(dataPost, dataTitle, dataLink, dataId, dataSuccess,'success', dataValueA, dataValueB, dataValueC)
        }
    });    
   
}


function sendAjaxMessage(dataPost, dataTitle, dataLink='', dataId, sweetTitle, sweetType, dataValueA='', dataValueB='', dataValueC='' ){
    $.ajax({
        url:dataPost,
        method:"POST",                    
        data:{Message:dataTitle, id:dataId, valueA:dataValueA, valueB:dataValueB, valueC:dataValueC},        
        success:function(){
            setInterval(function(){
                // window.location.assign(dataLink);
                window.location.reload();
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