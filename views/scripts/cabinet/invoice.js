$(document).ready(() => {
    FillInvoice();
})

function FillInvoice(){
    $(".invoiceID").html("#" + Invoice[0].ID)
    $(".invoiceTo").html(Invoice[0].ToDisplayName + " / "+ Invoice[0].ToEmail)
    $(".invoiceToAddress").html(Invoice[0].ToAddress)
    $(".invoiceToPhone").html(Invoice[0].ToPhone)
    $(".invoiceDate").html(Invoice[0].Datestamp)
    $(".ld").html(Invoice[0].Datestamp)
    $(".ppn").html(Invoice[0].Datestamp)
    // $(".invoiceID").html()
}