<!-- It's like HTML emails all over again. -->
<body style="font: 18px/26px Gotham, 'Proxima Nova', Avenir, 'Trebuchet MS', sans-serif; background: #f8f7f4; color: #8a7b6a;">
    <div style="width: 600px; height: 180px; position: absolute; top: 50%; left: 50%; margin-top: -90px; margin-left: -300px;">
        <h1 style="font-size: 40px; color: #d36f3e; font-weight: 100;">No database connection!</h1>
        <p style="font-size: 21px; line-height: 28px">Unfortunately, it looks like your version of PHP is a bit too old to run Dime.</p>
        
        <p>The version of PHP Dime needs is <code><?php echo REQUIRED_PHP_VERSION; ?></code>, and the version you have right now is <code><?php echo phpversion(); ?></code>. You&rsquo;ll need to ask your host to upgrade.</p>
    </div>
</body>