$.each(Currency, function(k, v) {
   if (Page_Data_Listings != '') {
      if (Page_Data_Listings[0].Currency == k) {
         $('#CurrencyList').append("<li class='select-option active' id='" + k + "'>" + v[1] + "</li>");
         $('#currencyVal').val(v[1])
         $("input[name='Currency']").val(k);
      }
      else
         $('#CurrencyList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
   }
   else  
      $('#CurrencyList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
});

if (Page_Data_Listings != '') {
   if (Page_Data_Listings[0].IntelligentPricing == 1) 
   {
      $("#intelegent").prop('checked', true);
      var billingItems = document.querySelectorAll('#dis1 input[type="text"]');
      var basePrice = document.querySelectorAll('#dis input[type="text"]');
      console.log(basePrice);
         for (var i = 0; i < billingItems.length; i++) 
         {
            billingItems[i].disabled = false;
         }
         basePrice[0].disabled = true;
   }
   else
   {
      $("#fixed").prop('checked', true);
      var billingItems = document.querySelectorAll('#dis1 input[type="text"]');
      var basePrice = document.querySelectorAll('#dis input[type="text"]');
         for (var i = 0; i < billingItems.length; i++) 
         {
            billingItems[i].disabled = true;
         }
         basePrice[0].disabled = false;
   }
}

   if (Page_Data_Listings[0].BasePrice != null)
      $("input[name='BasePrice']").val(Page_Data_Listings[0].BasePrice);

   if (Page_Data_Listings[0].MinPrice != null)
      $("input[name='MinPrice']").val(Page_Data_Listings[0].MinPrice);

   if (Page_Data_Listings[0].MaxPrice != null)
      $("input[name='MaxPrice']").val(Page_Data_Listings[0].MaxPrice);
   
   if (Page_Data_Listings[0].BasePrice != null)
      $("input[name='BasePrice']").val(Page_Data_Listings[0].BasePrice);
   
   if (Page_Data_Listings[0].PromoDiscount == 1)
      $("#promo").prop('checked', true);
   else 
      $("#disablePromo").prop('checked', true);

   if (Page_Data_Listings[0].WeeklyDiscount != null)
      $("input[name='WeeklyDiscount']").val(Page_Data_Listings[0].WeeklyDiscount);
   
   if (Page_Data_Listings[0].MonthlyDiscount != null)
      $("input[name='MonthlyDiscount']").val(Page_Data_Listings[0].MonthlyDiscount);
   


// $(document).on('click', '.select-option', function (e) {
//    let option = $(this).text();
   
//    e.preventDefault();
//    $(this).addClass('active').siblings().removeClass('active');
//    $(this).closest(".select").slideUp(300);
   
//    var str = $(this).attr("id");

//    var parentElement = $(this).parentsUntil("form");
//    $(parentElement[1]).children('#input-id').val(str);
// });
 
$(document).ready(() => {
   $("form").on("submit", (e) => {
      if($("input[name=IntelligentPricing]:checked").val() != '0'){
         if(!  $("input[name=MinPrice]").val()){
            $("input[name=MinPrice]").css("border", "1px solid #ff3535")
            e.preventDefault()
         }
         if(!$("input[name=MaxPrice]").val()){
            $("input[name=MaxPrice]").css("border", "1px solid #ff3535")
            e.preventDefault()
         }
      }
      else if(!$("input[name=BasePrice]").val()){
         $("input[name=BasePrice]").css("border", "1px solid #ff3535")
         e.preventDefault()
      }
      if(!$("#input-ids").val()){
         $("#currencyVal").css("border", "1px solid #ff3535")
         e.preventDefault()
      }
   })

   $("input").on("keypress", (e) => {
      $(e.target).attr("style", "")
   })
})