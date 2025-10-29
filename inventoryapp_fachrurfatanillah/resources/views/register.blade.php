<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Buat Account Baru!</h2>

    <h3>Sign Up Form</h3>

    <form action="/register" method="post">
        @csrf
        <label for="fname">First Name:</label><br><br>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="lname">Last Name:</label><br><br>
        <input type="text" id="lname" name="lname"><br><br>
        
        
        <label>Gender:</label><br><br>
        <input type="radio" id="male" name="r-gender">
        <label for="male" for="male">Male</label><br>
        <input type="radio" id="female" name="r-gender">
        <label for="female" for="female">Female</label><br>
        <input type="radio" id="other" name="r-gender">
        <label for="other">Other</label><br><br>

        <label for="nationality">Nationality:</label><br><br>
        <select name="nationality" id="nationality">
            <option value="indonesia">Indonesia</option>
            <option value="malaysia">Malaysia</option>
            <option value="singapore">Singapore</option>
        </select><br><br>

        <label>Laguage Spoken:</label><br><br>
        <input type="checkbox" id="bahasa-indonesia">
        <label for="bahasa-indonesia">Bahasa Indonesia</label><br>
        <input id="english" type="checkbox">
        <label for="english">English</label><br>
        <input id="language-other" type="checkbox">
        <label for="language-other">Other</label><br><br>

        <label for="bio">Bio:</label><br><br>
        <textarea name="" id="bio"></textarea><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>