
console.log("hola mundo")


$(".title-card").each(function(id){
    var _id = id+1
    $("#title-card"+_id).click(function(event){
        event.preventDefault();
        sendClick(_id,'click_title');

    });
});
$(".image-card").each(function(id){
    var _id = id+1
    $("#image-card"+_id).click(function(event){

        event.preventDefault();

        sendClick(_id,'click_image');

    });
});
$(".content-card").each(function(id){
    var _id = id+1
    $("#content-card"+_id).click(function(event){
        event.preventDefault();
        sendClick(id = _id, type = 'click_content');

    });
});





function sendClick(id,type,clickCard){
    let _token   = $('meta[name="csrf-token"]').attr('content');
    id = parseInt(id,type);
    $.ajax({
      url: "/addstadistic",
      type:"POST",
      data:{
        type:type,
        id:id,
        clickCard,clickCard,
        _token: _token
      },
      success:function(response){
        console.log(response.success);
        window.location.href = "http://blog-laravel.test/post/"+id+"?";
      },
      error: function(error) {
       console.log(error);

      }
     });

}
