
<!-- HEDHY EL NAVBAR -->
<link href="navbarpages.css" rel="stylesheet">

<nav>
    <div id="logo">
        <img src="logo.png" alt="logo" width="95px" height="65px">
    </div>
  
    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
        <ul class="menu">
    
            <li>
                <!-- First Tier Drop Down -->
                <label for="drop-1" class="toggle">Acceuil</label>
                <?php
                 if (isset($_SESSION['connected']) && isset($_SESSION['role'])=='0' )
                { ?>
                    <a href="panel-user.php">Acceuil</a>   
                <?php
               
                 

                }

                else if (isset($_SESSION['connected']) && isset($_SESSION['role'])=='1' )
                {
                ?>
                <a href="panel-admin.php">Acceuil</a> 
                <?php
                }
                else if (isset($_SESSION['connected']) && isset($_SESSION['role'])=='2' )
                {
                ?>
                    <a href="panel-gestionnaire.php">Acceuil</a>
                    <?php    
                }
                ?>


                
                

                <input type="checkbox" id="drop-1"/>
                
            </li>
            <li>
                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle">Mon Profil</label>
                <a href="#">Mon Profil</a>
                <input type="checkbox" id="drop-1"/>
                
            </li>
           
           
            
   

           <li style="float: right;"><a href="deconnexion.php" class="deconnexion">Déconnexion</a></li>
        </ul>
    </nav>
  