$(document).ready(() => {
    $.each(FiatAccounts, (k) => {
        $("#selectAcc").append(`
            <option value="${FiatAccounts[k].ID}">
                ${Vars.LngCurrency[FiatAccounts[k].CCY][1]} / **** ${FiatAccounts[k].AccNumber}
            </option>
        `)
    })

    $("#selectAcc").on("change", (e) => {
        CalcCurrency($(e.target).val())
    })

    CalcCurrency($("#selectAcc").val())
})

function CalcCurrency(id){
    var CCYXRate = Vars.LngCurrencyXRate;
    var selectedCCY = Vars.LngCurrency[FiatAccounts.filter(x => x.ID == id)[0].CCY][0];
    var BaseCCY = CCYXRate[4];
    var ForeignCCY = CCYXRate[selectedCCY];
    var FinalPrice = 1;
    var priceXR = xrateprice(BaseCCY, ForeignCCY, FinalPrice);

    $("#currCCY").text(priceXR + " " + Vars.LngCurrency[FiatAccounts.filter(x => x.ID == id)[0].CCY][1].split(' ')[0])
}


function xrateprice(b, f, a) {
    x1 = a / (1/b);
    x2 = x1 / f;
    return Math.round(x2 * 100) /100;
}