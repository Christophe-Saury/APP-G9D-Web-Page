
<!-- HEDHY EL NAVBAR -->
<link href="navbar.css" rel="stylesheet">

<nav>
    <div id="logo">
        <img src="logo.png" alt="logo" width="95px" height="65px">
    </div>
  
    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
        <ul class="menu">
    
            <li>
                <!-- First Tier Drop Down -->
                <label for="drop-1" class="toggle">Mon Profil</label>
                <a href="#">Mon Profil</a>
                <input type="checkbox" id="drop-1"/>
                
            </li>
           
           
             <?php
    if (isset($_SESSION['role'])=='1') {
        ?>
        <li >
                <!-- First Tier Drop Down -->
                <label for="drop-1" class="toggle">Ajouter utilisateur</label>
                <a href="inscription.php">Ajouter utilisateur</a>
                <input type="checkbox" id="drop-1"/>
                
            </li>
    

        <?php 
            } else { 

            
            ?><?php }?>


           <li style="float: right;"><a href="deconnexion.php" class="deconnexion">Déconnexion</a></li>
        </ul>
    </nav>
  