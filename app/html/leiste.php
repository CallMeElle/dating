<div class="topbar">
    <div class="navigation">
        <a href="home.php">Home</a>
        <span style="padding-left:20px">
        <a href="profil.php">Profil</a>
        <span style="padding-left:20px">
        <a href="support.php">Support</a>
    </div>
    <div class="logout-field">
        <form action="logout.php" method="post" >
            Angemeldet als: <?php echo getLogin() ?>
            <input type="Submit" name="Submit" value="Log Out">
        </form>
    </div>
</div>


