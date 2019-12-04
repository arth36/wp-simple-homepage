// This is JavaScript file for add logo image for footer.

jQuery( function() {
    jQuery("#btn_image").on("click",function(){
        var images=wp.media({
            title:"Upload Image for footer",
            multiple:false
        }).open().on("selec",function(){
            var UploadedImages = images.state().get("selection");
            console.log(UploadedImages.toJSON());
        });
    });  
});