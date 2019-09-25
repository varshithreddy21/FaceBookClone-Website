<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="signup_style.css">
    </head>
    <body>
            <div class="nav">
                    <table align="left">
                        <tr>
                            <td><h1 id="xfinity">Xfinity</h1></td>
                            <td><h3 id="communities">communities</h3></td>
                            <td><h2 id="control"><pre>|CONTROL CENTER</pre></h2></td>
                        </tr>
                    </table>
                 </div>
            <div class="register">
                <h1 id="h1tag">
                    Register
                </h1>
                <form action="register.php" method="POST">
                    <input type="text" name="firstname" placeholder="Enter FirstName">
                    <input type="text" name="lastname" placeholder="Enter LastName">
                    <input type="email" name="email" placeholder="Enter Email">
                    <input type="password" name="password" placeholder="Enter Password">
                    <input type="password" name="confirm" placeholder="Re-Enter Password">
                    <select name="country">
                        <option>india</option>
                        <option>others</option>
                    </select>
                    <select name="gender">
                        <option>
                            Male
                        </option>
                        <option>
                            Female
                        </option>
                        <option>
                            Others
                        </option>
                    </select>
                    <input type="date" name="birthday" placeholder="Date of birth" >
                    <input id="con" type="Submit" name="submit">
                </form>
            </div>     
    </body>
</html>

