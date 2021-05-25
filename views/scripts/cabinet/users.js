function createPage(tdata,adata) {
return `
<tr class="nk-tb-item users">
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="DateCreated">
                <span class="tb-lead">${tdata.DateCreated}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="ID">
                <span># ${tdata.ID}</span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="Email">
                <span class="tb-lead">${tdata.Email}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="DateModified">
                <span class="tb-lead">${tdata.DateModified}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="DisplayName">
                <span class="tb-lead">${tdata.DisplayName}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="Name">
                <span class="tb-lead">${tdata.Name != null ? tdata.Name : ''}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="Surname">
                <span class="tb-lead">${tdata.Surname != null ? tdata.Surname : ''}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="Address">
                <span class="tb-lead">${tdata.Country != null ? tdata.Country : ''}, ${tdata.City != null ? tdata.City : ''}, ${tdata.Street != null ? tdata.Street : ''} ${tdata.Building != null ? tdata.Building : ''},${tdata.Appartment != null ? tdata.Appartment : ''} <span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="Phone">
                <span class="tb-lead">${tdata.PhoneCode + tdata.Phone != null ? tdata.PhoneCode + tdata.Phone : ''}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="VerifiedEmail">
                <span class="tb-lead">${tdata.VerifiedEmail != null ? tdata.VerifiedEmail : ''}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
        </div>
    </td>
</tr><!-- .nk-tb-item  -->
`
}

$.each( UsersList, function( key, value ) {
    if(UsersList[key]['Status']==3) {
        var data = {
            'ccy': Vars2['LngCurrency'][UsersList[key]['Currency']][2],
            'class1': 'text-warning',
            'class2': 'ni-alert-circle',
            'sText': Vars2['LngTransactionStatus'][UsersList[key]['Status']][1]
        };
    } else
    if(UsersList[key]['Status']==4) {
        var data = {
            'ccy': Vars2['LngCurrency'][UsersList[key]['Currency']][2],
            'class1': 'text-danger',
            'class2': 'ni-cross-circle',
            'sText': Vars2['LngTransactionStatus'][UsersList[key]['Status']][1]
        };
    } else 
    if(UsersList[key]['Status']==1) {
        var data = {
            'ccy': Vars2['LngCurrency'][UsersList[key]['Currency']][2],
            'class1': 'text-success',
            'class2': 'ni-check-circle',
            'sText': Vars2['LngTransactionStatus'][UsersList[key]['Status']][1]
        };
    } 
    // else {
    //     var data = {
    //         'ccy': Vars2['LngCurrency'][UsersList[key]['Currency']][2],
    //         'class1': 'text-warning',
    //         'class2': 'ni-alert-circle',
    //         'sText': Vars2['LngTransactionStatus'][UsersList[key]['Status']][1]
    //     };
    // }
    if(UsersList){
        $("#UsersList").append(createPage(UsersList[key],data));
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