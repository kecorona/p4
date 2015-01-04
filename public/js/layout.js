<script>
    $("document").ready(function(){
        $("#frm").submit(function(e){
            e.preventDefault();
            var username = $("input#username").val();
            var token =  $("input[name=_token]").val();
            var dataString = 'username='+username+'&token='+token; 
            $.ajax({
                type: "POST",
                url : "admin/login",
                data : dataString,
                success : function(data){
                    console.log(data);
                }
            },"json");

    });
    });//end of document ready function
    </script>