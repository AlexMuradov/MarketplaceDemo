function createPage(tdata,adata) {
    return `
    <div class="col-lg-4">
    <div class="card card-bordered justify-content-between" id="${adata.ID}">
    ${adata.Filename ? `<img src="/static/uploads/listings/${adata.Filename}" class="card-img-top" alt="">` : `<img src="/static/v2/img/no_image2.svg" class="card-img-top" alt="">`}
    
            <div class="drodown listings-dropdown">
                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="link-list-opt no-bdr">
                        <li><a href="/${Lng}/property.add/step:1/listing:${adata.ID}"><em class="icon ni ni-edit"></em><span class="res_Edit"></span></a></li>
                        <li><a href="#" id="deleteBtn" data-toggle="modal" data-target="#deleteListing"><em class="icon ni ni-trash"></em><span class="res_Delete"></span></a></li>
                        <li>
                            <a href="#" class="changeStatusBtn" data-toggle="modal" data-target="#changeStatus">
                                <span class="res_ChangeStatus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        
        <div class="card-inner">
            <div class="row mb-3">
                <h5 class="card-title">${adata.Title}</h5>
            </div>
            <div class="row lisStatusD">
                ${adata.Status == 1 ? 
                `<span class="badge badge-pill badge-outline-success res_Active"></span>`
                : `<span class="badge badge-pill badge-outline-danger res_Inactive"></span>`}
            </div>
            
        </div>

    </div>
    </div>
`
}



if(Listings){
    $.each( Listings, function( key, value ) {
        console.log(key);
        console.log(value);
        $("#list").prepend( createPage(key,value) );
    });
}

$(document).ready(() => {
    $(document.body).on("click", "#deleteBtn", (e) => {
        var lid = $(e.target).closest(".card").attr('id');
        listing = Listings.filter(el => el.ID == lid)
        $("input[name=deleteID]").val(lid);
        $("#propertyName").text('"' + listing[0].Description + '"');
    })

    $("#confirmDelete").on("click", () => {
        const formData = new FormData();
        formData.append('api__DeleteListing', 1)
        formData.append('deleteID', $("input[name=deleteID]").val())
        fetch(`/api/v1`, {
            method: 'POST',
            body: formData
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            if(data){
                $("#deleteListing").modal('hide');
                $("#" + $("input[name=deleteID]").val()).parent().remove()
                NioApp.Toast(
                    'Listing successfully deleted!',
                    'success', {
                    position: 'top-center'
                  });
                  
            }
            else{
                $("#deleteListing").modal('hide');
                NioApp.Toast(
                    'Error!',
                    'error', {
                    position: 'top-center'
                  });
            }
        })
    })

    $(document.body).on("click", ".changeStatusBtn", (e) => {
        var lid = $(e.target).closest(".card").attr('id');
        listing = Listings.filter(el => el.ID == lid)
        $("input[name=listingID]").val(lid);
    })

    $("#confirmStatus").on("click", () => {
        const formData = new FormData();
        formData.append('api__ChangeListingStatus', 1)
        formData.append('lid', $("input[name=listingID]").val())
        formData.append('status', $("input[name=status]:checked").val())
        fetch(`/api/v1`, {
            method: 'POST',
            body: formData
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            if(data){
                $("#changeStatus").modal('hide');
                var lid = $("input[name=listingID]").val();
                $("#" + lid + " .lisStatusD").empty()
                $("input[name=status]:checked").val() == 0 ? $("#" + lid + " .lisStatusD").append(`<span class="badge badge-pill badge-outline-danger">${Vars.LngCabinetListings.Inactive}</span>`) : $("#" + lid + " .lisStatusD").append(`<span class="badge badge-pill badge-outline-success">${Vars.LngCabinetListings.Active}</span>`)
                NioApp.Toast(
                    'Listing status changed!',
                    'success', {
                    position: 'top-center'
                  });
                  
            }
            else{
                $("#changeStatus").modal('hide');
                NioApp.Toast(
                    'Error!',
                    'error', {
                    position: 'top-center'
                  });
            }
        })
    })

})

