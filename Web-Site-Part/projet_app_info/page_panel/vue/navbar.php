
<!-- HEDHY EL NAVBAR -->
<link href="../vue/css/navbar.css" rel="stylesheet">

<nav>
    <div id="logo">
        <img src="../vue/Images/logo.png" alt="logo" width="100px" height="90px">
    </div>
  
    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
        <ul class="menu">
    
            <li>
                <!-- First Tier Drop Down -->
                <label for="drop-1" class="toggle">Mon Profil</label>
                <a href = "../../page_gestion_profil_VF/controleur/EditerInformationsUtilv3.php">Mon Profil</a>  <!--Il faut changer le lien ici -->
                <input type="checkbox" id="drop-1"/>
                
            </li>
           
           
             <?php
            
             
    if (isset($_SESSION['role']) && ($_SESSION['role']=='1' || $_SESSION['role']=='0')) {
        ?>
        <!--   <li >
            
                <label for="drop-1" class="toggle">Ajouter utilisateur</label>
                <a href="/ISEPAPP1/page_connexion/control/inscriptionControl.php">Ajouter utilisateur</a>
                <input type="checkbox" id="drop-1"/>
                
            </li> -->
    

        <?php 
            } else { 

            
            ?><?php }?>


           <li style="float: right;"> <a href="../../pages_connexion/control/deconnexionControl.php" class="deconnexion">Déconnexion</a></li>
        </ul>
    </nav>
  