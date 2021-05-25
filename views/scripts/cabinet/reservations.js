function createPage(tdata,adata) {
return `
<tr class="nk-tb-item reserv">
    
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="reservID">
                <span># ${tdata.ID}</span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="reservImg">
                <a href="/${Lng}/cabinet.reservationdetails/api__Details:1/id:${tdata.ID}" target="_blank">
                    <img class="rounded" src="/static/uploads/listings/m_thumbs/${tdata.Filename}" alt="">
                </a>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="reservDateFrom">
                <span class="tb-lead">${tdata.DateFrom}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="reservDateTo">
                <span class="tb-lead">${tdata.DateTo}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="reservPrice">
                <span class="tb-lead">${tdata.Price}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="reservAddress">
                <span class="tb-lead">${tdata.City}, ${tdata.Street} ${tdata.Building}, <span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="/${Lng}/cabinet.reservationdetails/api__Details:1/id:${tdata.ID}" target="_blank"><em class="icon ni ni-eye"></em><span class="res_Review">Смотреть</span></a></li>
                            <li><a href="#" class="review" id="rw${tdata.ListingID}" data-toggle="modal" data-target="#listingReview"><span class="res_Review">Оставить отзыв</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </td>
</tr><!-- .nk-tb-item  -->
`
}

$.each( Reservations, function( key, value ) {
    if(Reservations[key]['Status']==3) {
        var data = {
            'ccy': Vars2['LngCurrency'][Reservations[key]['Currency']][2],
            'class1': 'text-warning',
            'class2': 'ni-alert-circle',
            'sText': Vars2['LngTransactionStatus'][Reservations[key]['Status']][1]
        };
    } else
    if(Reservations[key]['Status']==4) {
        var data = {
            'ccy': Vars2['LngCurrency'][Reservations[key]['Currency']][2],
            'class1': 'text-danger',
            'class2': 'ni-cross-circle',
            'sText': Vars2['LngTransactionStatus'][Reservations[key]['Status']][1]
        };
    } else 
    if(Reservations[key]['Status']==1) {
        var data = {
            'ccy': Vars2['LngCurrency'][Reservations[key]['Currency']][2],
            'class1': 'text-success',
            'class2': 'ni-check-circle',
            'sText': Vars2['LngTransactionStatus'][Reservations[key]['Status']][1]
        };
    } 
    // else {
    //     var data = {
    //         'ccy': Vars2['LngCurrency'][Reservations[key]['Currency']][2],
    //         'class1': 'text-warning',
    //         'class2': 'ni-alert-circle',
    //         'sText': Vars2['LngTransactionStatus'][Reservations[key]['Status']][1]
    //     };
    // }
    if(Reservations){
        $("#reservationsList").append(createPage(Reservations[key],data));
    }
});

$(document).ready(() => {
    $(document.body).on("click", ".review", (e) => {
        var id = $(e.target).closest('a').attr('id').slice(2);
        $("#listingReview input[name=listingID]").val(id)
    })

    $(".btnrating").on('click',(function(e) {
        var previous_value = $($(e.target).closest(".rating").find('.selected_rating')).val();
        
        var selected_value = $(this).attr("data-attr");
        $($(e.target).closest(".rating").find('.selected_rating')).val(selected_value);
        
        $($(e.target).closest(".rating").find('.selected-rating')).empty();
        $($(e.target).closest(".rating").find('.selected-rating')).html(selected_value);
        
        for (i = 1; i <= selected_value; ++i) {
            $(e.target).closest(".rating").find(".rating-star-"+i).toggleClass('btn-warning');
            $(e.target).closest(".rating").find(".rating-star-"+i).toggleClass('btn-light');
        }
        
        for (ix = 1; ix <= previous_value; ++ix) {
            $(e.target).closest(".rating").find(".rating-star-"+ix).toggleClass('btn-warning');
            $(e.target).closest(".rating").find(".rating-star-"+ix).toggleClass('btn-light');
        }
	
	}));
})