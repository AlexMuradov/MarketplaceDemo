function createPage(data, file, status, verified, propDesc) {
    return `
    <tr class="nk-tb-item" id="row${data['ID']}">
        <td class="nk-tb-col">
            <div class="user-card">
                    <img style="margin-right:7px; border-radius:3px" src="/static/uploads/listings/m_thumbs/${file}" alt>
                <div class="user-info">
                    <span class="tb-lead">${propDesc} <span class="dot dot-success d-md-none ml-1"></span></span>
                    <span>${data['Street']}</span>
                </div>
            </div>
        </td>
        <td class="nk-tb-col">
            <div class="user-card">
                <div class="user-info">
                    <span class="tb-lead">${data['Name']} ${data['Surname']} <span class="dot dot-success d-md-none ml-1"></span></span>
                   ${verified}
                </div>
            </div>
        </td>
        <td class="nk-tb-col tb-col-md">
            <span>${data['DateFrom'].substring(0, 10)}</span>
        </td>
        <td class="nk-tb-col tb-col-md">
            <span>${data['DateTo'].substring(0, 10)}</span>
        </td>
        <td class="nk-tb-col tb-col-mb">
            <span class="tb-amount">${data['Price']} <span class="currency">${Vars2['LngCurrency'][data['Currency']][2]}</span></span>
        </td>
        <td class="nk-tb-col nk-tb-col-tools" id="status${data.ID}">
            ${status}
        </td>
    </tr>`
}

    
    $.each(Requests, function( key, value ) {
        var file;
        var status;
        var propDesc;
        var verified;

        $.each(Photos, function(k,v) {
            if (v.ListingID == value.ListingID){
                file = v.Filename;
                return false;
            }
        })

        if (value.Description.length > 20)
            propDesc = value.Description.substring(0, 17) + "...";
        else
            propDesc = value.Description

        if (value.Status == 1) {
            status = '<span class="tb-status text-success">' + Vars['LngCabinetRequests']['Confirmed'] + '</span>';
        }
        else if (value.Status == 2){
            status = '<span class="tb-status text-danger">' + Vars['LngCabinetRequests']['Rejected'] + '</span>';
        }
        if (value.Verified == 1) {
            verified = '<span class="badge badge-dot badge-success">' + Vars['LngCabinetRequests']['Verified'] + '</span>'
        }

        $('#requestsList').append(createPage(value, file, status, verified, propDesc));
    });

