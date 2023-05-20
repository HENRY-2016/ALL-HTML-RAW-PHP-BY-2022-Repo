
<?php include('login_user_process.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Log In</title>
    <link rel="stylesheet" type="text/css" href="static/w3.css">
<style>

.main_body 
{
    background-color:  #222831;;
}
.header {
    width: 50%;
    color: #060606;
    background: #c3cfd0;
    text-align: center;
    border: 1px solid #a4a8ad;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
}

.input-group {margin: 10px 0px 10px 0px;}

.log-in-form-class{
    width: 100%;
    background-color:#A0522D;
    font-size: 18px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.error {
    width: 100%;
    border: 1px solid #a94442;
    color: red;
    background: #f2dede;
    border-radius: 5px;
    padding-left: 20px;
    text-align: left;
}


.html-form-inputs
    {
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    display: block;
    width: 200px;
    padding: 7px;
    border: none;
    border-bottom: 2px solid#317873;
    background: transparent;
    margin-bottom: 10px;
    height: 35px;
    font-family:Times New Roman Times, serif;
    color:white;


    

}


.log-in-btn
{
    font-family:Times New Roman Times, serif;
    margin-bottom: 3%;
    width:100%;
    height:40px;
    border-radius:18px;

    color:white;
    background-color:#D2691E;
    text-decoration:none;
    transition:0.3s;
    display:block;
    /* padding:10px 10px; */
    border-radius:10px;
}

.sign-up-btn
{
    background-color:#78a494;
    color: white;
    font-weight: bold;
    font-family:Times New Roman Times, serif;
    margin-bottom: 3%;
    border:none;
    width:100%;
    height:40px;
    border-radius:18px;
}

.sign-up-sign-in-container 
{
    width: 50%;
    margin-top: 20%;
    margin-bottom: 20%;
}

/* Extra small devices (phones, 600px and down) */
@media only  screen and (max-width: 600px) 
{
    .sign-up-sign-in-container {width: 90%;}
}
</style>
</head>
<body class="main_body">
    <center><br><br>
    <div class="sign-up-sign-in-container">
        <div class="w3-container">
                <div class="w3-container">
                    <div class="log-in-form-class">
                        <?php include("login_errors.php");?>
                        <form id="login-form"  method="post" action="adminlogin.php">
                            <div class="input-group">
                                <br>
                                <label>Username</label>
                                <input type="text" name="username" class="html-form-inputs" autocomplete="off" placeholder="User Name" required="required">
                            </div>

                            <div class="input-group">
                            <br>
                                <label>Password</label>
                                <input type="password" name="password" class="html-form-inputs" autocomplete="off" required="required" placeholder="Password">
                            </div>

                            <div class="input-group"><br>
                                <button type="submit" class="log-in-btn" name="user-login-btn">Log in</button><br>
                            </div>
                        </form>
                    </div>
                <!-- </div> -->
                <!-- <footer class="w3-container">
                    <button type="button" onclick="LoadRegisterPage ()" class="sign-up-btn" name="user-login-btn">Setup Account</button>
                </footer> -->
            </div>
        </div>
    </div>
</center>

<script>

function LoadRegisterPage () {window.location="register_user.php"}
    // const htmlform = document.getElementById("login-form");
    // htmlform.addEventListener("submit",(event) => 
    // {
    //     event.preventDefault();
    //     console.log("form submited...")

    //     const request = new XMLHttpRequest ();
    //     request.open("post","login.php");
    //     request.onload = function ()
    //         {
    //             console.log(request.responseText);
    //         }
    //     request.send(new FormData(htmlform));
    // });

</script>
</body>
</html>