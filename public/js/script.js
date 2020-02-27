$("[id^=add_to_basket-]").on("click", function(){
    var arrDetails = this.id.split('-');
    var product_id = arrDetails[1];

    var quantity = $("#quantity-" + product_id).val();
    var price = $("#price-" + product_id).val();
    var code = $("#code-" + product_id).val();

    var postData = 
                {
                    "product_id" : product_id
                    , "quantity" : quantity
                    , "price" : price    
                    , "code" : code            
                }

    $.ajax({  
        type: "POST",  
        url: "add_to_cart.php",  
        data: { productData : JSON.stringify(postData) },  
        dataType: 'json',
        beforeSend: function(data) {  
            $("#add_to_basket-" + product_id).text('Updating Cart')
        },  
        success: function(response) {
            
            $("#quantity-" + product_id).val("1");
            alert("Product added to cart.");
            window.location.reload();
         }
     });  
});

$("#btn_confirm").on("click", function(){
    location.href = "cart.php?mode=confirm";
});

$("#btn_clear").on("click", function(){
    location.href = "cart.php?mode=clear";
});
