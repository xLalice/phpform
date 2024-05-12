<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="survey">
        <div class="heading">
            <h1 class="legend">Customer<br> Survey Form</h1>
            <img class="chat" src="./img/bubblechat.png" alt="bubble chat">
        </div>
        <form id="surveyForm" action="index.php" method="post">
            <label for="lastName">Name</label>    
            <input type="text" id="firstName" name="firstName" placeholder="First">
            <input type="text" id="lastName" name="lastName" placeholder="Last" required>
            <label for="streetAddress">Address</label>
            <input class="fill-width" type="text" id="streetAddress" name="streetAddress" placeholder="Street address" required>

            <input type="text" id="city" name="city" placeholder="City" required>
            <input type="text" id="region" name="region" placeholder="Region" required>
            <input type="text" id="zipcode" name="zipcode" placeholder="Zipcode" required>
            <input type="text" id="country" name="country" placeholder="Country" required>

            <label for="phoneNo">Phone</label>
            <input class="fill-width" type="text" id="phone" name="phone" required>

            <label for="birthday" class="onecol">Birthday</label>
            <label for="age" class="form-label" class="onecol">Age</label>
            <input type="text" id="birthday" name="birthday" required>
            <input type="number" id="age" name="age" required>

            <label for="review">Review</label>
            <input class="fill-width textarea" type="text" id="review" name="review" required>
            <label for="suggestion">Suggestion</label>
            <input class="fill-width textarea" type="text" id="suggestion" name="suggestion" required>
            <button type="submit">Submit</button>
        </form> 
        <div class="footer">                
                <p class="footer-msg">Thank you for your participation and continued support! </p>
                <img src="./img/headset.png" alt="headset">
        </div>
    </div>
    <?php include './forms/form.php';?>
</body>
</html>
