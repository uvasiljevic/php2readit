$(window).load(function () {
    console.log('radi')

    document.getElementById("emailL").addEventListener("blur", function(){
        var email = document.getElementById("emailL").value;

        var reEmail = /^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.([a-z]+\.)?[a-z]{2,4}$/;
        if(!reEmail.test(email.trim())){
            document.getElementById("emailL").style.borderColor = "red"
            document.getElementById("emailL").style.color = "red"

        }else{
            document.getElementById("emailL").style.borderColor = "green"
            document.getElementById("emailL").style.color = "green"

        }

    });

    document.getElementById("passwordL").addEventListener("blur", function(){
        var password = document.getElementById("passwordL").value;
        if(password==""){
            document.getElementById("passwordL").style.borderColor = "red"
            document.getElementById("passwordL").style.color = "red"

        }else{
            document.getElementById("passwordL").style.borderColor = "green"
            document.getElementById("passwordL").style.color = "green"

        }
    });

    document.getElementById("btnlogin").addEventListener("click", function(e){
        e.preventDefault()
        var email = document.getElementById("emailL").value;
        var password = document.getElementById("passwordL").value;

        var reEmail =/^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.([a-z]+\.)?[a-z]{2,4}$/;
        var valid = true;

        if(!reEmail.test(email.trim())){
            valid = false
            document.getElementById("emailL").style.borderColor = "red"
            document.getElementById("emailL").style.color = "red"

        }

        if(password==""){
            valid = false
            document.getElementById("passwordL").style.borderColor = "red"
            document.getElementById("passwordL").style.color = "red"

        }
        if(valid){

            var error = document.getElementById("logError");
            error.innerHTML = ""
            $.ajax({
                url:"index.php?page=log",
                method:"post",
                type:"json",
                data:{
                    email:email,
                    password:password,
                    send: true
                },
                success: function(response,status,data){
                    console.log(data);
                    if(data.status==200){
                        var error = document.getElementById("logError");
                        error.style.color ="red";
                        error.innerHTML = ""
                        window.location.replace("index.php");
                    }
                },
                error: function(data){
                    if(data.status==409){
                        var error = document.getElementById("logError");
                        error.style.color ="red";
                        error.innerHTML = "User not found. Check your email or password."
                    }
                }
            })
        }
        else{



            var error = document.getElementById("logError");
            error.style.color ="red";
            error.innerHTML = "Fill or correct fields colored in red!"

        }
    })

    document.getElementById("firstName").addEventListener("blur", function(){
        var firstName = document.getElementById("firstName").value;
        var reFirstName = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
        if(!reFirstName.test(firstName.trim())){
            document.getElementById("firstName").style.borderColor = "red"
            document.getElementById("firstName").style.color = "red"

        }else{
            document.getElementById("firstName").style.borderColor = "green"
            document.getElementById("firstName").style.color = "green"

        }
    });

    document.getElementById("lastName").addEventListener("blur", function(){
        var lastName = document.getElementById("lastName").value;
        var reLastName = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
        if(!reLastName.test(lastName.trim())){
            document.getElementById("lastName").style.borderColor = "red"
            document.getElementById("lastName").style.color = "red"

        }else{
            document.getElementById("lastName").style.borderColor = "green"
            document.getElementById("lastName").style.color = "green"

        }
    });

    document.getElementById("emailR").addEventListener("blur", function(){
        var email = document.getElementById("emailR").value;

        var reEmail = /^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.([a-z]+\.)?[a-z]{2,4}$/;
        if(!reEmail.test(email.trim())){
            document.getElementById("emailR").style.borderColor = "red"
            document.getElementById("emailR").style.color = "red"

        }else{
            document.getElementById("emailR").style.borderColor = "green"
            document.getElementById("emailR").style.color = "green"

        }

    });

    document.getElementById("passwordR").addEventListener("blur", function(){
        var password = document.getElementById("passwordR").value;
        if(password==""){
            document.getElementById("passwordR").style.borderColor = "red"
            document.getElementById("passwordR").style.color = "red"

        }else{
            document.getElementById("passwordR").style.borderColor = "green"
            document.getElementById("passwordR").style.color = "green"

        }
    });

    document.getElementById("repassword").addEventListener("blur", function(){
        var rePassword = document.getElementById("repassword").value;
        var password = document.getElementById("passwordR").value;
        if(password != rePassword || rePassword==""){
            document.getElementById("repassword").style.borderColor = "red"
            document.getElementById("repassword").style.color = "red"

        }else{
            document.getElementById("repassword").style.borderColor = "green"
            document.getElementById("repassword").style.color = "green"

        }
    });

    document.getElementById("btnregistration").addEventListener("click", function(e){
        e.preventDefault()
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("emailR").value;
        var password = document.getElementById("passwordR").value;
        var rePassword = document.getElementById("repassword").value;


        var reFirstName = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
        var reLastName = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
        var reEmail =/^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.([a-z]+\.)?[a-z]{2,4}$/;
        var valid = true;
        if(!reFirstName.test(firstName.trim())){
            valid = false
            document.getElementById("firstName").style.borderColor = "red"
            document.getElementById("firstName").style.color = "red"

        }

        if(!reLastName.test(lastName.trim())){
            valid = false
            document.getElementById("lastName").style.borderColor = "red"
            document.getElementById("lastName").style.color = "red"

        }

        if(!reEmail.test(email.trim())){
            valid = false
            document.getElementById("emailR").style.borderColor = "red"
            document.getElementById("emailR").style.color = "red"

        }

        if(password==""){
            valid = false
            document.getElementById("passwordR").style.borderColor = "red"
            document.getElementById("passwordR").style.color = "red"

        }if(password != rePassword || rePassword==""){
            valid = false
            document.getElementById("repassword").style.borderColor = "red"
            document.getElementById("repassword").style.color = "red"

        }

        if(valid){

            var error = document.getElementById("regError");
            error.innerHTML = ""
            $.ajax({
                url:"index.php?page=registration",
                method:"post",
                type:"json",
                data:{
                    firstName:firstName,
                    lastName:lastName,
                    email:email,
                    password:rePassword,
                    send: true
                },
                success: function(response,status,data){
                    document.getElementById("firstName").value = ""
                    document.getElementById("lastName").value = ""
                    document.getElementById("emailR").value = ""
                    document.getElementById("passwordR").value = ""
                    document.getElementById("repassword").value = ""
                    document.getElementById("firstName").style.borderColor = "black"
                    document.getElementById("lastName").style.borderColor = "black"
                    document.getElementById("emailR").style.borderColor = "black"
                    document.getElementById("passwordR").style.borderColor = "black"
                    document.getElementById("repassword").style.borderColor = "black"
                    //console.log(data.status);
                    if(data.status==201){
                        alert("You are registered successfuly!");
                    }
                    if(data.status==500){
                        alert("Problem with server, please try again");
                    }

                },
                error: function(){
                    alert("NEUSPESNO");
                }
            })
        }
        else{



            var error = document.getElementById("regError");
            error.style.color ="red";
            error.innerHTML = "Fill or correct fields colored in red! First name and last name must start with first letter big!"

        }
    })

})
