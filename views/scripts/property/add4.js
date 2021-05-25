$.each(Amenities, function(k, v) {
    $('#AmenitiesList').append('<label class="label-checkbox"><input type="checkbox" name="' + v[1] + '" class="checkbox"><span class="check"></span><span class="check-text">' + v[0] + '</span></label>');
    if (Page_Data_Amenities != '')
    {
        for(i=0; i < Page_Data_Amenities.length ; i++) {
             var str = "input[name='" + v[1] +"']"
            if (Page_Data_Amenities[i].AmenityID == k) {
                $(str).prop('checked', true);
            }
        }
    }
 });



