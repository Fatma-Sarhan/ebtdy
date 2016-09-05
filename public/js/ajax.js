$(function () {
	console.log('ajax here');

//Add product....
    $("body").delegate('.create','click',function(e){
                console.log("ajaxcreate");
                e.preventDefault();
                var _token=$(this).data('rowtok');
               	var name =  $(this).parent().parent().find("#name-field").val();
                var cat_id = $(this).parent().parent().find("#cat_id-field").val();
                var data ={};
                
                data._token=_token;
                data.name=name;
                data.cat_id=cat_id;
                console.log(data);

                $.ajax({
                    url:'/products/store',
                    type:'post',
                    data:data,
                    success:function(data)
                    {
                        
                        // $('.title').addClass("hidden");
                        $('.add').addClass("hidden");
                        document.getElementById('msg').innerHTML='<h3 style="left-align:50px;color:green;">Product created successfully ....</h3>';
                      
                           
                    }
                 });
            });
//Delete product....
            $("body").delegate('.delete','click',function (e){
            
            e.preventDefault();
            console.log("ajaxdelete");
            var product_id = $(this).data('rowid');

                    $.ajax({
                        url:'/products/destroy/'+product_id,
                        type:'GET',
                        success:function(data)
                        {
                            $('.title').addClass("hidden");
                            $('.table').addClass("hidden");
                            document.getElementById('msg').innerHTML='<h3 style="left-align:50px;color:green;">Product deleted successfully ....</h3>';
                            

                        }
                 })
             });

// Edit product....

            $("body").delegate(".edit",'click',function(e){
                console.log("ajaxedit");
                e.preventDefault();
                var _token=$(this).data('rowtok');
                var product_id=$(this).data('rowid');
                var name = $(this).parent().parent().find("#name-field").val();
                var cat_id = $(this).parent().parent().find("#cat_id-field").val();
                var data ={};
                data.cat_id=cat_id;
                data._token=_token;
                data.name=name;
                
                console.log(data);
                $.ajax({
                    url:'/products/edit/'+product_id,
                    type:'post',
                    data:data,
                    success:function(data)
                    {
                        // console.log(data);
                        $('.edit').addClass("hidden");
                        document.getElementById('msg').innerHTML='<h3 style="left-align:50px;color:green;">Product updated successfully ....</h3>';
                         

                                               
                    }
                });
            });




})