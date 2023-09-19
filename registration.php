<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
        href="https://getbootstrap.com/docs/5.2/assets/css/docs.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script
        src="https://kit.fontawesome.com/64585f28ed.js"
        crossorigin="anonymous"
    ></script>

    <script src="scripts/scriptt.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>
    <script src="scripts/formCheck.js"></script>
    <title>Register</title>
</head>
<body >
<header id="intro-header" class="container-fluid mb-4">
    <?php include 'nav.php';?>

</header>
<section>
    <div class="container-fluid">
        <div class="container" id="login-container">
            <div class="row">
                <div class="col-lg-6 col-md-6" id="login-col1">
                    <img src="images/placeholder-loginimg.png" alt="login-img" />
                    <h2>MingleZone</h2>
                    <p>
                        login to enter an environment where you'll find thousands of
                        people that share you same interests and are willing to interact
                        with you
                    </p>
                </div>
                <form
                    method="post"
                    onsubmit="return sub();"
                    action="formHandlings/subRegistration.php"
                    class="col-lg-6 col-md-6 register-form"
                    enctype="multipart/form-data"
                    style="height: 700px"
                >
                    <img src="images/logoimg.png" alt="" />
                    <h2>hello again !</h2>
                    <p>
                        fill in the form with the needed informations to create an
                        account
                    </p>

                    <input
                        type="text"
                        class="form-control register-input"
                        placeholder="First name"
                        name="firstName"
                        id="fname"
                        style="margin-top: 30px"
                    />
                    <small id="sm-fname" class="err-sm"></small>

                    <input
                        type="text"
                        class="form-control register-input"
                        id="lname"
                        name="lastName"
                        placeholder="Last name"
                    />
                    <small id="sm-lname" class="err-sm"></small>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control register-input"
                        placeholder="Email address"
                    />
                    <small id="sm-email" class="err-sm"></small>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control register-input"
                        placeholder="Password"
                    />
                    <small id="sm-password" class="err-sm"></small>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control register-input"
                        placeholder="phone"
                    />
                    <small id="sm-phone" class="err-sm"></small>
                    <input class="form-control register-input" type="file" id="image" name="image" />

                    <p style="text-align: left" class="mt-4">Birthdate</p>
                    <div class="date">
                        <select
                            class="form-select"
                            id="date-day"
                            aria-label="Default select"
                            name="bd_day"
                        >
                            <option value="1" selected="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>

                        <select
                            class="form-select"
                            id="date-month"
                            aria-label="Default select"
                            name="bd_month"
                        >
                            <option value="1" selected="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">Mar</option>
                            <option value="1">Apr</option>
                            <option value="2">May</option>
                            <option value="4">Jun</option>
                            <option value="1">Jal</option>
                            <option value="2">Aug</option>
                            <option value="4">Sep</option>
                            <option value="1">Oct</option>
                            <option value="2">Nov</option>
                            <option value="4">Dec</option>
                        </select>
                        <select
                            aria-label="Year"
                            name="birthday_year"
                            id="date-year"
                            title="Year"
                            class="form-select"

                        >
                            <option value="2015" selected="1">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                            <option value="1929">1929</option>
                            <option value="1928">1928</option>
                            <option value="1927">1927</option>
                            <option value="1926">1926</option>
                            <option value="1925">1925</option>
                            <option value="1924">1924</option>
                            <option value="1923">1923</option>
                            <option value="1922">1922</option>
                            <option value="1921">1921</option>
                            <option value="1920">1920</option>
                            <option value="1919">1919</option>
                            <option value="1918">1918</option>
                            <option value="1917">1917</option>
                            <option value="1916">1916</option>
                            <option value="1915">1915</option>
                            <option value="1914">1914</option>
                            <option value="1913">1913</option>
                            <option value="1912">1912</option>
                            <option value="1911">1911</option>
                            <option value="1910">1910</option>
                            <option value="1909">1909</option>
                            <option value="1908">1908</option>
                            <option value="1907">1907</option>
                            <option value="1906">1906</option>
                            <option value="1905">1905</option>
                        </select>
                    </div>

                    <input

                        type="submit"

                        value="register"
                        class="btn btn-light"

                    />
                </form>
            </div>
        </div>
    </div>
</section>
<footer>
    <div>
        <hr />
        <ul class="d-flex">
            <li><a href="index.php"> HOME</a></li>
            <li><a href="feed.php"> FEED</a></li>
            <li><a href="login.php"> LOGIN</a></li>
            <li><a href="registration.php"> REGISTER</a></li>
            <li><a href="myProfile.php"> PROFILE</a></li>
        </ul>
    </div>
</footer>
</body>
</html>

<?php
