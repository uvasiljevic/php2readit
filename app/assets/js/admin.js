$(window).load(function(){

    console.log('update')
    $("#update").hide()
    $("#btnhide").click(function () {
        $("#update").hide()
    })


    $(document).on('click', ".btnupdate", function () {

        var id = $(this).data('id')
        $("html, body").animate({ scrollTop: 2200}, 50)
        
        $.ajax({
            url: "index.php?page=getArticleForUpdate",
            method: "post",
            dataType: 'json',
            data:{
                id:id,
                send:true
            },
            success: function (data) {
                $("#update").show()
                $('#updateid').val(data.id)
                $('#updatetitle').val(data.title)
                $('#updatedescription').val(data.description)
                $('#updatetext').val(data.text)
                $('#updatecategories').val(data.categoryId)


            },
            error: function () {
                
            }
        })

    })

    $("#btnupdatefinish").click(function(e) {

        e.preventDefault()
        var id = $('#updateid').val()
        var title = $('#updatetitle').val()
        var description = $('#updatedescription').val()
        var text = $('#updatetext').val()
        var categoryId = $('#updatecategories').val()

        $.ajax({
            url: "index.php?page=updateArticle",
            method: "post",
            dataType: 'json',
            data:{
                id:id,
                title: title,
                description: description,
                text: text,
                categoryId: categoryId,
                send:true
            },
            success: function (response, status, data) {


                if(data.status == 200){
                    console.log(data)
                    showArticlesTable(data)
                    alert('Successful update')
                    $("#update").hide()
                    var el = document.getElementById('articles');
                    el.scrollIntoView(true);
                    $("html, body").css('scroll-behavior', 'smooth')


                }

            },
            error: function (xhr) {

                if(xhr.status == 500){
                    alert('NOT DONE')
                }


            }
        })

    })

    $(document).on('click', ".btndeleteuser", function () {

        var id = $(this).data('id')

        $.ajax({
            url: "index.php?page=deleteUser",
            method: "post",
            dataType: 'json',
            data:{
                id:id,
                send:true
            },
            success: function (data) {

                showUsersTable(data)
                alert('Successful delete')



            },
            error: function (xhr) {

                alert('NOT DONE')

            }
        })

    })

    $(document).on('click', ".btndelete", function () {

        var id = $(this).data('id')

        $.ajax({
            url: "index.php?page=deleteArticle",
            method: "post",
            dataType: 'json',
            data:{
                id:id,
                send:true
            },
            success: function (response, status, data) {
                if(data.status == 200){
                    showArticlesTable(data)
                    alert('Successful delete')
                }

            },
            error: function (xhr) {
                if(xhr.status == 500) {
                    alert('NOT DONE')
                }
            }
        })

    })

    $(document).on('click', ".adminpagination", function(e){
        e.preventDefault()
        var number1 = $(this).data('id')
        var number2 = 10
        console.log(number1)
        $.ajax({
            url: "index.php?page=adminPagination",
            method: "post",
            dataType: 'json',
            data:{
                number1: number1,
                number2: number2,
                send:true
            },
            success: function (response, status, data) {

                if(data.status == 200){
                    showArticlesTable(data)
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

function showUsersTable(data){

    var html = ''

    for(let d of data){
        html+=`<tr>
                    <td>
                        ${d.id}
                    </td>
                    <td>
                        ${d.firstName}
                    </td>
                    <td>
                        ${d.lastName}
                    </td>
                    <td>
                        ${d.email}
                    </td>
                    <td>
                        ${d.dateCreate}
                    </td>
                    <td>
                        <input type="submit" class="btndeleteuser btn btn-primary py-3 px-5" data-id="${d.lastName}" value="delete">
                    </td>
                </tr>`
    }


    $("#tbodyusers").html(html)
}

function showArticlesTable(data){
    console.log(data)
    var html = ''
    console.log(data.responseJSON)
    for(let d of data.responseJSON){

        html += `<tr>
                <td>
                    ${d.id}
                </td>
                <td>
                    ${d.title}
                </td>
                <td>
                    ${d.text}
                </td>
                <td>
                    ${d.description}
                </td>
                <td>
                    <img  href="app/assets/images/${d.imgLink}" alt="article"/>
                </td>
                <td>
                    ${d.categoryName}
                </td>
                <td>
                    ${d.dateCreate}
                </td>
                <td>
                    <input type="submit" class="btnupdate btn btn-primary py-3 px-5" data-id="${d.id}" value="update">
                </td>
                <td>
                    <input type="submit" class="btndelete btn btn-primary py-3 px-5" data-id="${d.id}" value="delete">
                </td>
            </tr>`

    }

    $("#tbody").html(html)


}