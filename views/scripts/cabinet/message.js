function listUsers (data, data2, data3,data4,data5,l) {
    return `
    <li class="chat-item ${data3.class}">
    <a class="chat-link chat-open" href="/${l}/cabinet.message/api__Read:1/From:${data.accs}">
        <div class="chat-media user-avatar bg-purple">
            <span>${data2}</span>
            <span class="status dot dot-lg ${data4}"></span>
        </div>
        <div class="chat-info">
            <div class="chat-from">
                <div class="name">${data.Name} ${data.Surname}</div>
                <span class="time">${data5}</span>
            </div>
            <div class="chat-context">
                <div class="text">
                    <p>${data.Message}</p>
                </div>
                ${data3.div}
            </div>
        </div>
    </a>
    <div class="chat-actions">
        <div class="dropdown">
            <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
            <div class="dropdown-menu dropdown-menu-right">
                <ul class="link-list-opt no-bdr">
                    <li><a href="#">Delete</a></li>
                </ul>
            </div>
        </div>
    </div>
</li>
    `
}

function chatLine(data, data2) {
    return `
<div class="chat ${data2}">
    <div class="chat-content">
        <div class="chat-bubbles">
            <div class="chat-bubble">
                <div class="chat-msg">${data.Message}</div>
            </div>
        </div>
        <ul class="chat-meta">
            <li>${data.DateCreated}</li>
        </ul>
    </div>
</div>
    `
}

const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];

var userInfo = new Array();

$.each( Inbox, function( key, value ) {
    var dateParts = value['DateCreated'].split("-");
    var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
    var dd = jsDate.getDate();
    var mm = monthNames[jsDate.getMonth()];
    var displayDate = dd + ' ' + mm;
    var Initials = value['Name'].substring(0,1) + value['Surname'].substring(0,1);
    if(value['Status'] == 2) {
        var unread = {
            class: "is-unread",
            div: "<div class='status unread'><em class='icon ni ni-bullet-fill'></em></div>"
        }
    } else {
        var unread = {
            class: "",
            div: "<div class='status delivered'><em class='icon ni ni-check-circle-fill'></em></div>"
        }
    }
    if(value['OnlineStatus'] == 1) {
        var online = "dot-success";
    } else {
        var online = "dot-gray";
    }
    
    var userInfo_m = [
        value['Name'] + ' ' + value['Surname'],
        Initials,
        value['DateCreated'],
        value['accs']
    ];
    userInfo[value['accs']] = userInfo_m;
    //userInfo.push(userInfo_m);
    $(".chat-list").append(listUsers(value, Initials, unread, online, displayDate,lng));
});
console.log(userInfo);
if(Read) {
    $("#userTitle").html(userInfo[From][0]);
    $("#userTitleInitials").html(userInfo[From][1]);
    $("#userTitleActive").html("Last message at " + userInfo[From][2]);

    $.each( Read, function( key, value ) {
        if(value['AccFrom'] == userInfo[From][3]) {
            var sender = "is-you";
        } else {
            var sender = "is-me";
        }
        $(".chat-lines").append(chatLine(value, sender));
    });
    $("#messageTo").val(From)
}