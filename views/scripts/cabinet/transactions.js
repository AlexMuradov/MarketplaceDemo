function createPage(tdata,adata) {
return `
<tr class="nk-tb-item">
    <td class="nk-tb-col nk-tb-col-check">
        <div class="custom-control custom-control-sm custom-checkbox notext">
            <input type="checkbox" class="custom-control-input" id="uid${tdata.ID}">
            <label class="custom-control-label" for="uid${tdata.ID}"></label>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="user-info">
                <span class="tb-lead">${tdata.ByDisplayName}<span class="dot dot-success d-md-none ml-1"></span></span>
                <span>${tdata.ByEmail}</span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col">
        <div class="user-card">
            <div class="user-info">
                <span class="tb-lead">${tdata.ToDisplayName}<span class="dot dot-success d-md-none ml-1"></span></span>
                <span>${tdata.ToEmail}</span>
            </div>
        </div>
    </td>
    <td class="nk-tb-col tb-col-mb" data-order="${tdata.Amount}">
        <span class="tb-amount">${tdata.Amount} <span class="currency">${adata.ccy}</span></span>
    </td>
    <td class="nk-tb-col tb-col-md">
        <span>${tdata.Datestamp}</span>
    </td>
    <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
        <ul class="list-status">
            <li><em class="icon ${adata.class1} ni ${adata.class2}"></em> <span>${adata.sText}</span></li>
            <!--<li><em class="icon ni ni-alert-circle"></em> <span>KYC</span></li>-->
        </ul>
    </td>
    <td class="nk-tb-col tb-col-lg">
        <span># ${tdata.ID}</span>
    </td>
    <td class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="/${Lng}/cabinet.invoice/api__InvoiceDetails:1/id:${tdata.ID}"><em class="icon ni ni-eye"></em><span class="res_Invoice"></span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </td>
</tr><!-- .nk-tb-item  -->
`
}

$.each( Transactions, function( key, value ) {
    if(Transactions[key]['Status']==3) {
        var data = {
            'ccy': Vars2['LngCurrency'][Transactions[key]['Currency']][2],
            'class1': 'text-warning',
            'class2': 'ni-alert-circle',
            'sText': Vars2['LngTransactionStatus'][Transactions[key]['Status']][1]
        };
    } else
    if(Transactions[key]['Status']==4) {
        var data = {
            'ccy': Vars2['LngCurrency'][Transactions[key]['Currency']][2],
            'class1': 'text-danger',
            'class2': 'ni-cross-circle',
            'sText': Vars2['LngTransactionStatus'][Transactions[key]['Status']][1]
        };
    } else 
    if(Transactions[key]['Status']==1) {
        var data = {
            'ccy': Vars2['LngCurrency'][Transactions[key]['Currency']][2],
            'class1': 'text-success',
            'class2': 'ni-check-circle',
            'sText': Vars2['LngTransactionStatus'][Transactions[key]['Status']][1]
        };
    } else {
        var data = {
            'ccy': Vars2['LngCurrency'][Transactions[key]['Currency']][2],
            'class1': 'text-warning',
            'class2': 'ni-alert-circle',
            'sText': Vars2['LngTransactionStatus'][1][1]
        };
    }
    $("#transactionsList").append(createPage(Transactions[key],data));
});
