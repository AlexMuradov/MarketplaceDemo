var pageCount;
var visiblePages = 7

$(document).ready(() => {
    pageCount = SearchResult[3][0].PageCount;
    // pageCount = 11;
    $(document.body).on('click', ".pagination .page-link", (e) =>{
        // if(!$(e.target).hasClass("active")){
        //     var cp = GetSelectedPage(e.target);
        //     page = '/Page:' + cp;
        //     SetFilters();
    
        //     $( ".pagination .page-link.active").removeClass("active");
        //     $(e.target).addClass("active");
        // }
        ChangePage(e);
    })

    $(document.body).on('click', ".pagination .page-prev, .pagination .page-next", (e) =>{
        ChangePage(e);
    })
    
    CreatePagination()
})

function GetSelectedPage(e){
    if(e){
        var elementlist = $(e).closest('ul');
        var li = $(e).parent();
    }
    else{
        var elementlist = $(".pagination");
        var li = $(".pagination .page-link.active").parent();
    }
    // return $(elementlist).children().index(li);
    return $(li).text();
}


function CreatePagination(){
    $('.pagination').append(`<li class="page-item xx__mob-pagination-arrow">
                                <button class="page-prev page-arrow">
                                <span class="xx__mob-pagination-left">Предыдущая</span>
                                </button>
                            </li>`)

    for(var i = 0; i < pageCount; i++){
        if(i < visiblePages + 2){
            $('.pagination').append(`<li class="page-item"><button class="page-link ${i == 0 ? 'active' : ''}">${i+1}</button></li>`)
        }
        else{
            $('.pagination').append(`<li class="page-item"><button class="page-link ${i == pageCount - 1 ? '' : 'hidden'}">${i+1}</button></li>`)
        }
    }

    if(pageCount > visiblePages + 2){
        $($(".pagination").children()[pageCount]).before(`<li class="page-item"><button class="page-dots" disabled style="opacity:1;">...</button></li>`)
    }

    $('.pagination').append(`<li class="page-item xx__mob-pagination-arrow">
                                <button class="page-next page-arrow">
                                    <span class="xx__mob-pagination-right">Следующая</span>
                                </button>
                            </li>`)
}

function ChangePage(e){
    if($(e.target).hasClass('page-next')){
        var cp = GetSelectedPage();
        if(cp != pageCount){
            rebuildPagination(+cp + 1);
            page = '/Page:' + (+cp + 1);
            SetFilters();
            $(".pagination .page-link.active").removeClass("active");
            $($(".pagination .page-link")[cp]).addClass("active");
        }
    }
    
    else if($(e.target).hasClass('page-prev')){
        var cp = GetSelectedPage();
        if(cp != 1){
            page = '/Page:' + (cp - 1);
            rebuildPagination(cp - 1);
            SetFilters();
            $(".pagination .page-link.active").removeClass("active");
            $($(".pagination .page-link")[cp - 2]).addClass("active");
        }
    }

    else{
        if(!$(e.target).hasClass("active")){
            var cp = GetSelectedPage(e.target);
            if(pageCount > visiblePages) rebuildPagination(cp);
            page = '/Page:' + cp;
            SetFilters();
    
            $( ".pagination .page-link.active").removeClass("active");
            $(e.target).addClass("active");
        }
    }

}

function rebuildPagination(cp){
    if(pageCount > visiblePages + 2){
        if(cp == $($(".pagination .page-link")[$(".pagination .page-link").length - 1]).text()){
            $(".pagination .page-dots").parent().remove();
            for(var i = 0; i < pageCount; i++){
                if(i >= pageCount - (visiblePages + 1)){
                    $($(".pagination .page-link")[i]).removeClass('hidden')
                }  
                else if(i == 0 ){
                    $($(".pagination .page-link")[i]).removeClass('hidden')
                }
                else{
                    $($(".pagination .page-link")[i]).addClass('hidden');
                } 
            }
            $($(".pagination").children()[1]).after(`<li class="page-item"><button class="page-dots" disabled style="opacity:1;">...</button></li>`)
        }
        
        if(cp == 1){
            $(".pagination .page-dots").parent().remove();
            for(var i = 0; i < pageCount; i++){
                if(i <= visiblePages){
                    $($(".pagination .page-link")[i]).removeClass('hidden')
                }  
                else if(i == pageCount - 1 ){
                    $($(".pagination .page-link")[i]).removeClass('hidden')
                }
                else{
                    $($(".pagination .page-link")[i]).addClass('hidden');
                } 
            }
            $($(".pagination").children()[pageCount]).before(`<li class="page-item"><button class="page-dots" disabled style="opacity:1;">...</button></li>`)
        }
    
        if(cp > 5 && cp <= pageCount - 4){
            $(".pagination .page-dots").parent().remove();
            for(var i = 0; i < pageCount; i++){
                var l1 = cp - 3;
                var l2 = +cp + 1;
                if(l1 <= i && i <= l2){
                    $($(".pagination .page-link")[i]).removeClass('hidden')
                }  
                else if(i == 0 || i == pageCount - 1){
                    $($(".pagination .page-link")[i]).removeClass('hidden')
                }
                else{
                    $($(".pagination .page-link")[i]).addClass('hidden');
                } 
            }
    
            $($(".pagination").children()[1]).after(`<li class="page-item"><button class="page-dots" disabled style="opacity:1;">...</button></li>`)
            $($(".pagination").children()[pageCount]).after(`<li class="page-item"><button class="page-dots" disabled style="opacity:1;">...</button></li>`)
        }
    
        if(cp <= 5){
            $(".pagination .page-dots").parent().remove();
            $($(".pagination .page-link")[1]).removeClass('hidden')
            $($(".pagination .page-link")[2]).removeClass('hidden')
            $($(".pagination .page-link")[3]).removeClass('hidden')
            $($(".pagination .page-link")[7]).addClass('hidden')
            $($(".pagination .page-link")[8]).addClass('hidden')
            $($(".pagination").children()[pageCount-1]).after(`<li class="page-item"><button class="page-dots" disabled style="opacity:1;">...</button></li>`)
        }
        
        if(cp >= pageCount - 4){
            $(".pagination .page-dots").parent().remove();
            $($(".pagination .page-link")[pageCount-2]).removeClass('hidden')
            $($(".pagination .page-link")[pageCount-3]).removeClass('hidden')
            $($(".pagination .page-link")[pageCount-8]).addClass('hidden')
            $($(".pagination .page-link")[pageCount-9]).addClass('hidden')
            $($(".pagination").children()[1]).after(`<li class="page-item"><button class="page-dots" disabled style="opacity:1;">...</button></li>`)
        }
    }
}