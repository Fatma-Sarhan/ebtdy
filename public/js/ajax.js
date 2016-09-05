$(function () {
	console.log('ajax here');


    $("body").delegate('.create','click',function(e){
                console.log("ajaxcreate");
                e.preventDefault();
                // var feedback_id = $(this).data('rowid');
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
                        
                        $('.title').addClass("hidden");
                        $('.add').addClass("hidden");
                        document.getElementById('msg').innerHTML='<h3 style="left-align:50px;color:green;">Product created successfully ....</h3>';
                      
                           
                    }
                 });
            });
})