$.each(MessageList, function(k, v) {
    let msgids = MessageList[k]['AccFrom'];
    let msgtxt = MessageList[k]['Message'];
    var htmlcode = '<div class="description__text description__text-first"><div class="avatar"><img class="client__photo" src="/static/img/ava.png" alt="avatar"><div class="name__client"><h6>From: Alex</h6><div><span>Jan</span><span>2020</span></div></div></div><div class="container__description"><h4><a href="c_showmessage/id:'+msgids+'">'+msgtxt+'</a></h4></div></div>';
    $('#MsgList').append(htmlcode);
});