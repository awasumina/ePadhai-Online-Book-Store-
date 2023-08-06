
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Subscribe to our Youtube channel "Coder ACB"-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment completed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="paymentSuccess.css">


    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200&display=swap');
*{
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
    margin:0;
}
body{
    display:flex;
    align-items:center;
    justify-content: center;
    height:95vh;
}
.alert-box{
    padding:1rem;
    margin:2rem;
    width:60%;
    margin:auto;
    background: #1ff71c21;
    border-radius: 10px;
    box-shadow:rgba(0,0,0,0.24) 0px 3px 8px;
}
.alert{
    display:flex;
    align-items: center;
    position: relative;
}
.alert .ico{
    margin-right:2rem;
    width:30px;
    height:30px;
    color:#39ff21;
    font-size:50px;
    transform:translateY(-40px);
}
.alert h3{
font-size:18px;
color:#28e53f;
}
.alert-content{
    margin-top:1rem;
    margin-bottom: 2rem;
    font-size:16px;
    color:#28e53f;
}
.alert .button{
    color:#fff;
    background: #1fe41c;
    padding:0.5rem 1rem;
    margin-right:1rem;
    align-items: center;
    text-align: center;
    display: inline-flex;
    outline:none;
    border:none;
    border-radius:10px;
    cursor:pointer;
    box-shadow:rgba(0,0,0,0.15) 2.4px 2.4px 3.2px;
}
.alert .button:hover{
    color:#fff;
    background: #21ce1e;
}
.button i{
    font-size:17px;
    margin-right:0.5em;
    width:20px;
    height:20px;
    color:#fff;
}
.dismiss-btn{
    border:1px solid #1fe41c;
    border-radius:10px;
    padding: 0.4rem 0.9rem;
    background: transparent;
    cursor: pointer;
    color:#1fe41c;
    box-shadow:rgba(0,0,0,0.15) 2.4px 2.4px 3.2px;
}
.dismiss-btn:hover{
    background: #1fe41c;
    color:#fff;
}
.img{
    position:relative;
}
.img img{
    width:100px;
    position:absolute;
    float:right;
    right:-56px;
    transform:translateY(-10px);
    clip:rect(0px ,60px, 200px, 0px);
}
    </style>


</head>

<body>
    <div class="container">
        <div id="alert-additional-content-5" class="alert-box" role="alert">
            <div class="img">
                <img class="img" src="images/869563.png">
            </div>
            <div class="alert">
                <i class="fa-solid fa-circle-check ico"></i>
                <h3>Payment Successful !!!</h3>
            </div>
            <div class="alert-content alert">
                Your Payment is Successfull and you would be informed about your awaited ordered book thorugh provided email. 
            </div>
            <div class="alert"><a href="home.php">
                <button type="button" class="button">
                    <i class="fa-solid fa-eye"></i>
                    Ok
                </button></a><a href="home.php">
                <button type="button" onclick="Close()" class="dismiss-btn" id="close">Dismiss</button></a>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>