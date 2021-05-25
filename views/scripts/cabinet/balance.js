var NewWallet = {};

$(document).ready(() => {
    $("#addWallet input[name=number]").on("keypress", (e) => {
        if(['1','2','3','4','5', '6', '7', '8', '9', '0'].indexOf(e.key) !== -1 && $(e.target).val().replaceAll(" ", "").length < 16){
            if($(e.target).val().replaceAll(" ", "").length % 4 == 0 && $(e.target).val().length != 0){
                $(e.target).val($(e.target).val() + ' ')
            }
          } else {
            e.preventDefault();
          }
    })

    $("#addWallet input[name=monthYear]").on("keypress", (e) => {
        if(['1','2','3','4','5', '6', '7', '8', '9', '0'].indexOf(e.key) !== -1 && $(e.target).val().replaceAll("/", "").length < 4){
            if($(e.target).val().replaceAll("/", "").length % 2 == 0 && $(e.target).val().length != 0){
                $(e.target).val($(e.target).val() + '/')
            }
          } else {
            e.preventDefault();
          }
    })

    $("#confirmWallet").on("click", () => {
        var formData = new FormData();
        formData.append("api__CreateFiatAccount", 1);
  
        NewWallet = {
          AccNumber:  $("#newWalletNum").val().replaceAll(" ", ""),
          CCY:  $("#newWalletCurr").val(),
          HolderName:  $("#newWalletName").val(),
          HolderAddress:  $("#newWalletAddress").val()
        }
        
        for ( var key in NewWallet ) {
          formData.append(key, NewWallet[key]);
        }

        if(NewWallet.AccNumber && NewWallet.CCY && NewWallet.HolderName && NewWallet.HolderAddress){
          fetch(`/api/v1`, {
            method: 'POST',
            body: formData
          })
          .then((response) => {
              return response.json();
          })
          .then((data) => {
              if(data){
                $("#addWallet input").val('');
                $("#addWallet").modal('hide');
                $("#verifyWallet").modal('show');
              }
              else{
                  $("#addWallet").modal('hide');
                  NioApp.Toast(
                      'Error!',
                      'error', {
                      position: 'top-center'
                    });
              }
          })
        }
        else{
          $.each($("#addWallet input"), (i) => {
            if(!$($("#addWallet input")[i]).val()){
              $($("#addWallet input")[i]).css('border-color', '#ff3535')
            }
          })
        }
    })

    $("#addWallet input").on('keypress', (e) => {
      $(e.target).attr('style', '')
    })

    $("#confirmVerifyWallet").on("click", () => {
      var formData = new FormData();
        formData.append("api__VerifyWallet", 1);
        formData.append("vcode", $("#verificationCode").val());

        fetch(`/api/v1`, {
          method: 'POST',
          body: formData
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            if(data){
              NewWallet.ID = data[0].ID;
              NewWallet.AccNumber = NewWallet.AccNumber.slice(-4);
              $("#verifyWallet").modal('hide');
              $("#verificationCode").val('');
              CreateFiatAccount(NewWallet)
              NioApp.Toast(
                  'Wallet created!',
                  'success', {
                  position: 'top-center'
                });

            }
            else{
                $("#addWallet").modal('hide');
                NioApp.Toast(
                    'Error!',
                    'error', {
                    position: 'top-center'
                  });
            }
        })
    })

    $(document.body).on("click", ".deleteWallet", (e) => {
      item = e.target;
      id = $(item).closest(".fiatAcc").attr("id").slice(2);
      $("#deleteWallet input[name=deleteID]").val(id)
      $("#deleteWallet").modal("show");
    })

    $("#deleteWallet #confirmDelete").on("click", () => {
      var formData = new FormData();
      formData.append('api__DeleteFiatAccount', 1);
      formData.append('deleteID', $("#deleteWallet input[name=deleteID]").val());

      fetch(`/api/v1`, {
        method: 'POST',
        body: formData
      })
      .then((response) => {
          return response.json();
      })
      .then((data) => {
          if(data){
            $("#fa" + $("#deleteWallet input[name=deleteID]").val()).remove()
            NioApp.Toast(
                'Wallet deleted!',
                'success', {
                position: 'top-center'
              });
          }
          else{
              $("#addWallet").modal('hide');
              NioApp.Toast(
                  'Error!',
                  'error', {
                  position: 'top-center'
                });
          }
      })
    })

    
    $(document.body).on("click", ".makeDefWallet", (e) => {
      item = e.target;
      id = $(item).closest(".fiatAcc").attr("id").slice(2);
      var formData = new FormData();
      formData.append('api__DefaultFiatAccount', 1);
      formData.append('accountID', id);

      fetch(`/api/v1`, {
        method: 'POST',
        body: formData
      })
      .then((response) => {
          return response.json();
      })
      .then((data) => {
          if(data){
            $(".is-default").removeClass("is-default");
            $("#fa" + id + " .nk-wgw-icon").addClass("is-default");
          
          }
          else{
              $("#addWallet").modal('hide');
              NioApp.Toast(
                  'Error!',
                  'error', {
                  position: 'top-center'
                });
          }
      })
    })
    
    if(FiatAccounts){
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

      FillFiatAccounts();
    }
    FillCurrencySelect();
    FillVirtuaWallet();
})

function FillCurrencySelect(){
  $.each(Vars.LngCurrency, (k) => {
    $("#addWallet select").append(`
        <option value="${Vars.LngCurrency[k][0]}">${Vars.LngCurrency[k][1]}</option>
    `)
  })
}

function FillVirtuaWallet(){
  if(TotalBalance[0].Summa) $("#virtualAcc1 .amount").prepend(TotalBalance[0].Summa)
  else $("#virtualAcc1 .amount").prepend(0)
}

function FillFiatAccounts(){
  $.each(FiatAccounts, (i) => {
    CreateFiatAccount(FiatAccounts[i])
  })
}

function CreateFiatAccount(acc){
  $("#fiatAcc").prepend(`
    <div class="col-md-6 col-lg-4 fiatAcc" id="fa${acc.ID}">
      <div class="card card-bordered">
          <div class="nk-wgw">
              <div class="nk-wgw-inner">
                  <a class="nk-wgw-name" href="">
                      <div class="nk-wgw-icon ${acc.DefaultAccount == 1 ? 'is-default' : ''}">
                          <em class="icon ni" style="padding-top: 3px; height: 100%;">${Vars.LngCurrency[acc.CCY][2]}</em>
                      </div>
                      <h5 class="nk-wgw-title title" style="white-space: normal; width: calc(100% - 80px);">${Vars.LngCurrency[acc.CCY][1]}</h5>
                  </a>
                  <br>
                  <div class="nk-wgw-balance">
                      <div class="amount">**** **** **** ${acc.AccNumber}</div>
                      <div class="amount-sm">${acc.HolderName}</div>
                      <br>
                  </div>
              </div>
              <div class="nk-wgw-more dropdown">
                  <a href="#" class="btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                  <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                      <ul class="link-list-plain sm">
                          <li><a href="#" class="deleteWallet">Delete</a></li>
                          <li><a href="#" class="makeDefWallet">Make Default</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div><!-- .card -->
    </div><!-- .col -->
    `)
}

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
