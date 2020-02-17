$(window).load(function(){
// var id = window.location.search.split("id")[1].split("=")[1];
    $("#btncomment").click(function(e){
        e.preventDefault()
        var id = window.location.search.split("id")[1].split("=")[1];
        var comment = $("#comment").val()
        var valid = true

        if(comment == ""){
            valid = false
        }
        else{
            valid = true
        }
        if(valid){
            $("#commentError").html("")
            $.ajax({
                url: 'index.php?page=insertComment',
                method: 'POST',
                dataType: 'json',
                data: {
                    comment: comment,
                    id:id,
                    send: true
                },
                success:function(response,status,data){
                    $("#comment").val("")
                    if(data.status == 201){
                        showComments(data)
                        $("#commentError").html("")
                    }
                    if(data.status == 500){
                        $("#commentError").html("Problems with server, please try again later")
                    }
                },
                error:function(xhr, data){
                    console.log(xhr);
                    console.log(data)
                }

            })
        }
        else{
            $("#commentError").html("You can not leave an empty comment")
            $("#commentError").css("color", "red")
        }


    })

    $(document).on('click', '.reply', function(e){
        e.preventDefault()
        $("html, body").animate({ scrollTop: 2250}, 50)
    })


});

function showComments(data){
    var html = '';
    console.log(data.responseJSON)
    for(let c of data.responseJSON){
        html += `<li class="comment">
                    <div class="vcard bio">
                        <img src="app/assets/images/avatar.png" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                        <h3>${c.firstName} ${c.lastName}</h3>
                        <div class="meta mb-3">${c.commDateCreate}</div>
                        <p>${c.commentText}</p>
                        <p><a href="#" class="reply">Reply</a></p>
                    </div>
                   </li>`
    }

    document.getElementById("comments").innerHTML = html;
}
