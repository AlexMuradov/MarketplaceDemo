var x = 0;
var compElement;

$.each(CountryList, function(k, v) {
    $('#CountryList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
 });

 console.log("vars : " + Vars);
 console.log("vars1 : " + Vars['LngAddProperty']['DoubleKing']);
function addInput() {
    var profile = document.getElementById('bedroom__code');
    var div = document.createElement('div');
    div.id = 'input' + ++x;
    div.innerHTML = `<div class="sleeping__arrangements-item sleeping__arrangements-add">
                        <div class="sleeping__arrangements-title">
                            <p>${Vars['LngAddProperty']['Bedroom'] + ` ` + x}</p>
                        </div>
                        <ul class="dropdown__noactive">
                            <li class="dropdown-item">
                                <p class="c-gray">${ Vars['LngAddProperty']['DoubleKing']}</p>
                                <div class="count">
                                    <button type="button" disabled class="btn-count btn-count-minus"></button>
                                    <input type="text" name="King${x}" id="King${x}" class="input-count count__children" value="0"readonly="">
                                    <button type="button" class="btn-count btn-count-plus"></button>
                                </div>
                            </li>
                            <li class="dropdown-item">
                                <p class="c-gray">${Vars['LngAddProperty']['DoubleQueen']}</p>
                                <div class="count">
                                    <button type="button" disabled class="btn-count btn-count-minus"></button>
                                    <input type="text" name="Queen${x}" id="Queen${x}" class="input-count count__children" value="0"readonly="">
                                    <button type="button" class="btn-count btn-count-plus"></button>
                                </div>
                            </li>
                            <li class="dropdown-item"><p class="c-gray">${Vars['LngAddProperty']['Single']}</p>
                                <div class="count">
                                    <button type="button" disabled class="btn-count btn-count-minus"></button>
                                    <input type="text" name="Single${x}" id="Single${x}" class="input-count count__children" value="0"readonly="">
                                    <button type="button" class="btn-count btn-count-plus"></button></div></li>
                                <li class="dropdown-item">
                                    <p class="c-gray">${Vars['LngAddProperty']['Sofa']}</p>
                                    <div class="count">
                                        <button type="button" disabled class="btn-count btn-count-minus"></button>
                                        <input type="text" name="Sofa${x}" id="Sofa${x}" class="input-count count__children" value="0"readonly="">
                                        <button type="button" class="btn-count btn-count-plus"></button>
                                    </div>
                                </li>
                        </ul>
                    </div>`;
    profile.appendChild(div);
}


function delInput() {
    var div = document.getElementById('input' + x);
    div.remove();
    --x;
}

if (Page_Data_Rooms.length != 0)
{
    for (var i = 0; i < Page_Data_Rooms.length; i++) {
        if (Page_Data_Rooms[i].RoomType == 1) {
            if (i > 0) {
                x = i;
                addInput();
            }
            $.each(BedTypes, function(k, v) {
                compElement = "#" + v[1] + (i+1)
                $(compElement).val(BedsCount(Page_Data_Rooms[i].ID, k) );
            })
        }
        else if (Page_Data_Rooms[i].RoomType == 2) {
            $.each(BedTypes, function(k, v) {
                compElement = "#" + v[1] + "_CS"
                $(compElement).val(BedsCount(Page_Data_Rooms[i].ID, k) );
            })
        }
    }
    $("input[name='Bedrooms']").val(x)
}

function BedsCount (roomID, bedType) {
    var result= 0;
    for (var i = 0; i < Page_Data_Beds.length; i++) {
        if (Page_Data_Beds[i].BedType == bedType && Page_Data_Beds[i].RoomID == roomID) {
            ++result;            
        }
    }
    return result;
}

if (Page_Data_Listings[0].Bathrooms != null)
{
    $("input[name='Bathrooms']").val(Page_Data_Listings[0].Bathrooms)
}

if (Page_Data_Listings[0].MaxGuests != null)
{
    $("input[name='MaxGuests']").val(Page_Data_Listings[0].MaxGuests)
}

function validate() {
    var questCount = document.getElementById("maxGuests").value;

    var bedCounts = 0;
    var beds = document.getElementsByClassName("count__children");
    $.each(beds, function(index, bed){
        bedCounts += parseInt(bed.value);
    });
    console.log("questCount -"  +  questCount + " bedCounts : " + bedCounts);
    // if (questCount > bedCounts) {
    //     // alert('Where are you going to arrange all guests????');
    //     return false;
    // }
    return true;
}

$(document).ready(() => {
    var list = 
    $.each($(".input-count"), (k) => {
        if($($(".input-count")[k]).val() != 0) {
            $($($(".input-count")[k]).parent().children()[0]).attr('disabled', false);
        }
    })
})

