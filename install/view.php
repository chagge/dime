<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <title>InstallShield Dime Install Wizard 2.0</title>
        
        <link rel="stylesheet" href="css/install.css">
        
        <script src="../dime/assets/zepto.js"></script>
        <script src="js/listen.js"></script>
        <script src="js/install.js"></script>

        <script src="js/database.js"></script>
        <script src="js/metadata.js"></script>
        <script src="js/account.js"></script>
    </head>
    <body>
        <noscript>
            turn on your javascript, the internet will be a nicer place for it
        </noscript>
        
        <header id="global">
            <nav>
                <img class="logo" src="img/logo.png" alt="Dime" title="Dime logo">
                <ul role="progress">
                    <li class="database">Database</li>
                    <li class="metadata">Metadata</li>
                    <li class="account">Account</li>
                    <li class="done">Done!</li>
                </ul>
            </nav>
        </header>
        
        <section id="intro" class="wrapper" style="margin-top: -127.5px !important;">
            <header>
                <img class="logo" src="img/logo.png" alt="Dime" title="Dime logo">
                
                <h1>Thanks for picking Dime! I’ll get you set up now (as long as you have database access). You can change this info at any time.</h1>
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
        
        <section id="database" class="wrapper">
            <h1>Alright. What’s your database info?</h1>
            
            <form>
                <p>
                    <input name="db_host" id="db_host" value="localhost" placeholder="localhost">
                    <label for="db_host">Database host</label>
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
                    <button class="btn secondary arrow" disabled href="#metadata">All done, next step</button>
                </footer>
            </form>
        </section>
        
        <section id="metadata" class="wrapper">
            <h1>Nice one! Tell me a bit about your shop.</h1>
            
            <form>
                <p>
                    <input name="shop_name" id="shop_name" placeholder="My Dime Shop">
                    <label for="shop_name">Shop name</label>
                </p>
                <p>
                    <textarea name="shop_description" id="shop_description" placeholder="We sell things. They’re very nice things you should buy."></textarea>
                    <label for="username">Shop description</label>
                </p>
                <p>
                    <select name="currency" id="currency">
                        <?php foreach(array(
                            'gbp' => 'Great British Quids and Coppers',
                            'usd' => 'USA Freedom Dollars',
                            'aud' => 'Aussie Dollars',
                            'cad' => 'Canadian Dollars, eh?'
                        ) as $code => $currency): ?>
                            <option value="<?php echo $code; ?>"><?php echo $currency; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="currency">Currency</label>
                </p>
                
                <footer>
                    <button class="btn arrow" href="#account">What do you think of my shop?</button>
                </footer>
            </form>
        </section>
        
        <section id="account" class="wrapper">
            <h1>Sounds like a cool shop! Let’s get an account.</h1>
            
            <form>
                <p>
                    <input name="user" id="user" placeholder="mclovin">
                    <label for="user">Username</label>
                </p>
                
                <p>
                    <input name="pass" id="pass" type="password">
                    <label for="pass">Password</label>
                </p>
                
                <p>
                    <input name="email" id="email" type="email" placeholder="Xxblazin420bill_gatesxX@microsoft.com">
                    <label for="email">Email address</label>
                </p>
                
                <footer>
                    <button class="btn arrow" href="#done">Create my account, please!</button>
                </footer>
            </form>
        </section>
        
        <section id="done" class="wrapper">
            <h1>All done. Pretty painless, huh? Anyway, stop reading me and go play with your shiny new Dime installation. It’s pretty shiny.</h1>
            
            <footer>
                <a class="btn secondary" href="../">Check out the shop front</a>
                <a class="btn arrow" href="../admin">Log me in, Scotty!</a>
            </footer>
        </section>
    </body>
</html>