<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <title>InstallShield Dime Install Wizard 2.0</title>
        
        <link rel="stylesheet" href="css/install.css">
        
        <script src="../dime/assets/zepto.js"></script>
        <script src="js/listen.js"></script>
        <script src="js/install.js"></script>
    </head>
    <body>
        <section id="intro" class="wrapper">
            <header>
                <img class="logo" src="img/logo.png" alt="Dime" title="Dime logo">
                
                <h1>Thanks for picking Dime! I’ll get you set up now, but first you need to make sure you’ve got database information and products to sell.</h1>
            </header>
            
            <footer>
                <a class="btn secondary help" href="#">
                    I don’t have a database
                    
                    <span class="popup">
                        Unfortunately, you need a database to run Dime. Your web host should be able to set it up for you if you get stuck.
                    </span>
                </a>
                <a class="btn arrow" href="#database">Let’s get started!</a>
            </footer>
        </section>
        
        <section id="database" class="wrapper" style="left: 150%;">
            <header>
                <img class="logo" src="img/logo.png" alt="Dime" title="Dime logo">
                
                <ul role="progress">
                    <li class="current">Database</li>
                    <li>Metadata</li>
                    <li>Account</li>
                    <li>Done</li>
                </ul>
                
                <h1>Alright. What’s your database info?</h1>
            </header>
            
            <form>
                <p>
                    <input name="host" id="host" value="localhost" placeholder="localhost">
                    <label for="host">Database host</label>
                </p>
                <p>
                    <input name="username" id="username" value="root" placeholder="root">
                    <label for="username">Username</label>
                </p>
                <p>
                    <input name="password" id="password" type="password" value="">
                    <label for="password">Password</label>
                </p>
                
                <p class="spaced">
                    <input name="name" id="name" value="dime" placeholder="dime">
                    <label for="name">Database name</label>
                </p>
                
                <footer>
                    <span class="checker spinner">Checking database, hold on…</span>
                    <span class="checker success">Database connected fine. Nice job!</span>
                    <button class="btn secondary arrow" disabled href="#metadata">All done, next step</button>
                </footer>
            </form>
        </section>
    </body>
</html>