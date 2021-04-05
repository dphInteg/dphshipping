define(['jquery'], function($){
    "use strict";
        return function(config) {
            $('#carriers_dphshipping_partner').on('change', function(){
                $.ajax({
                    url: config.productInfoUrl + '/product?client_id='+$(this).val(),
                    type: "GET",
                    headers: {"Authorization" : config.authKey},
                    showLoader: true,
                    success: function(data){
                      var len = data.result.length;
                        $("#carriers_dphshipping_packaging_size").empty();
                        for( var i = 0; i<len; i++ ){
                            var size_label = data.result[i]['size'];
                            var size_code = "";
                            switch (size_label) {
                                case 'small':
                                    size_code = 'S';
                                    break;
                                case 'medium':
                                    size_code = 'M';
                                    break;
                                case 'large':
                                    size_code = 'L';
                                    break;
                                case 'extra_large':
                                    size_code = 'XL';
                                    break;    
                            }
                            $("#carriers_dphshipping_packaging_size").append("<option value='"+size_code+"'>"+size_code+"</option>");

                        }    
                    }
                }); 
            });
        }
 });