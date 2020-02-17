$(window).load(function(){

$(document).on('click', '.categories ', function(e){

    e.preventDefault()
    let id = $(this).data('id')
    $('.categories').removeClass('active')
    $(this).addClass('active')
    console.log(id)
    $.ajax({
        url: 'index.php?page=filterArticles',
        method: 'post',
        data: {
            id: id,
            send: true
        },
        dataType: 'json',
        success: function (response,status,data) {

            showArticles(data)

        },
        error: function (xhr, status, error) {
            console.log(error)
        }
    })

})

});

function showArticles(data){

    var html = '';

    for(let d of data.responseJSON){
        var day = d.dateCreate.split('-')[2]
        var day1 = day.split(" ")[0]
        var year = d.dateCreate.split('-')[0]

        html += `<div class="col-md-4">
                <div class="blog-entry justify-content-end">
                    <a href="index.php?page=article&id=${d.id}" class="block-20" style="background-image: url('app/assets/images/${d.imgLink}');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day">${day1}</span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr">${year}</span>
                                <span class="mos">Feb</span>
                            </div>
                        </div>
                        <h3 class="heading mb-3"><a href="index.php?page=article&id=${d.id}">${d.title}</a></h3>
                        <p>${d.description}</p>
                        <p><a href="index.php?page=article&id=${d.id}" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                    </div>
                </div>
            </div>`

    }

    $('.art').html(html)
}

