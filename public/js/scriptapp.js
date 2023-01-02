
$(".image-card").each(function(id){
    var _id = id+1;
    $("#image-card"+_id).click(function(event){
        sendClick(_id,'click_image')
    });
});

$(".title-card").each(function(id){
    var _id = id+1;
    $("#title-card"+_id).click(function(event){
        sendClick(_id,'click_title');
    });
});

$(".content-card").each(function(id){
    var _id = id+1;
    $("#content-card"+_id).click(function(event){
        sendClick(_id,'click_content');
    });
});


function sendClick(id,type){
    let _token = $('meta[name="csrf-token"]').attr('content');

    id = parseInt(id);

    $.ajax({
        url: "/addstadistic",
        type: "POST",
        data: {
            type:type,
            id:id,
            _token: _token
        },
        success:function(response){
            console.log(response.success);
            window.location.href = "http://127.0.0.1:8000/post/"+id+"?";
        },
        error: function(error){
            console.log(error);
        }
    });
}
