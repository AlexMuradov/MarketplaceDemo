
$(document.body).on("click", ".collapse_text_btn", (e) => {
        var text = $(e.target).closest("div").find('.rv_liked_text');
        var text2 = $(e.target).closest("div").find('.rv_notliked_text');
        // $(text).animate()
        if($(text).hasClass("collapsed_text")){
            $(e.target).closest("div").find(".collapse_text_btn p").text("Скрыть");
            $(e.target).closest("div").find(".collapse_text_btn img").toggleClass('flip');
            $(text).find('.rvt').css("white-space", "normal");
            $(text).height($(text).find('.rvt').height());
            $(text).toggleClass("collapsed_text");
        }
        else{
            $(e.target).closest("div").find(".collapse_text_btn p").text("Читать полностью");
            $(e.target).closest("div").find(".collapse_text_btn img").toggleClass('flip');
            $(text).find('.rvt').css("white-space", "nowrap");
            $(text).height(''); 
            $(text).toggleClass("collapsed_text");
        }
        if($(text2).hasClass("collapsed_text")){
            $(e.target).closest("div").find(".collapse_text_btn p").text("Скрыть");
            $(e.target).closest("div").find(".collapse_text_btn img").toggleClass('flip');
            $(text2).find('.rvt').css("white-space", "normal");
            $(text2).height($(text2).find('.rvt').height());
            $(text2).toggleClass("collapsed_text");
        }
        else{
            $(e.target).closest("div").find(".collapse_text_btn p").text("Читать полностью");
            $(e.target).closest("div").find(".collapse_text_btn img").toggleClass('flip');
            $(text2).find('.rvt').css("white-space", "nowrap");
            $(text2).height(''); 
            $(text2).toggleClass("collapsed_text");
        }
    }) 


    
$(document.body).on("click", ".collapse_amenities", (e) => {
    if($(".amenities .pc_content_sec_hidden").hasClass("hdn")){
        $(".amenities .pc_content_sec_hidden").slideDown("fast");
        $(".collapse_amenities p").text("скрыть")
        $(".collapse_amenities img").addClass('flip');
    }
    else{
        $(".amenities .pc_content_sec_hidden").slideUp("fast")
        $(".collapse_amenities p").text("смотреть все удобства")
        $(".collapse_amenities img").removeClass('flip');
    }
    // $(".pc_content_sec_hidden").slideToggle("medium")
    $(".amenities .pc_content_sec_hidden").toggleClass("hdn")
}) 

    
$(document.body).on("click", ".collapse_rules", (e) => {
    if($(".rules .pc_content_sec_hidden").hasClass("hdn")){
        $(".rules .pc_content_sec_hidden").slideDown("fast");
        $(".collapse_rules p").text("скрыть")
        $(".collapse_rules img").addClass('flip');
    }
    else{
        $(".rules .pc_content_sec_hidden").slideUp("fast")
        $(".collapse_rules p").text("смотреть все правила")
        $(".collapse_rules img").removeClass('flip');
    }
    // $(".pc_content_sec_hidden").slideToggle("medium")
    $(".rules .pc_content_sec_hidden").toggleClass("hdn")
    
}) 

$(document.body).on("click", ".propety_gallery img", (e) => {
    currentSlide($(e.target).attr("alt"))
    openModal();
}) 



// Open the Modal
function openModal() {
    $("#myModal").css("display", "flex");
  }
  
  // Close the Modal
  function closeModal() {
    $("#myModal").css("display", "none");
  }
  
  var slideIndex = 1;
  showSlides(slideIndex);
  
  // Next/previous controls
  function plusSlides(n) {
    slideIndex = +slideIndex + n
    showSlides(slideIndex);
  }
  
  // Thumbnail image controls
  function currentSlide(n) {
    slideIndex = n;
    showSlides(n);
  }
  
  function showSlides(n) {
    var i;
    var slides = $(".mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      $(slides[i]).css("display", "none");
    }
    $(slides[slideIndex-1]).css("display", "flex");
  }