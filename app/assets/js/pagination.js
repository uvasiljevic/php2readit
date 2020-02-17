$(window).load(function(){

    console.log('radi')

    $(document).on('click', ".homepagination", function(e){
        e.preventDefault()
        var number1 = $(this).data('id')
        var number2 = 6

        $.ajax({
            url: "index.php?page=homePagination",
            method: "post",
            dataType: 'json',
            data:{
                number1: number1,
                number2: number2,
                send:true
            },
            success: function (response, status, data) {

                if(data.status == 200){
                    var el = document.getElementById('to');
                    el.scrollIntoView(true);
                    $("html, body").css('scroll-behavior', 'smooth')
                    showArticlesPag(data)

                }


            },
            error: function (data) {
                if(data.status == 500){
                    alert('server error')
                }
            }
        })

    })

})

function showArticlesPag(data){

    var html = ''
    for(let d of data.responseJSON){

        html += `<div class="case">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                            <a href="index.php?page=article&id=${d.id}" class="img w-100 mb-3 mb-md-0" style="background-image: url(app/assets/images/${d.imgLink});"></a>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                            <div class="text w-100 pl-md-3">
                                <span class="subheading">${d.categoryName}</span>
                                <h2><a href="index.php?page=article&id=${d.id}">${d.title}</a></h2>
                                <ul class="media-social list-unstyled">
                                    <li class="ftco-animate"><a href="https://twitter.com/"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="https://facebook.com/"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="https://instagram.com/"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <div class="meta">
                                    <p class="mb-0"><a href="index.php?page=article&id=${d.id}">${d.dateCreate}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`

    }
    $('#articles').html(html)

}

