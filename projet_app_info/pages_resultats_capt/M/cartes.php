<?php
    function afficheCartes(){
        $requeteCARTE = 'SELECT id_chantier, latitude, longitude FROM chantier';
        $resultatsCARTE = requeteSimple($requeteCARTE);
        foreach($resultatsCARTE as $CARTE){
            $id_chantier = $CARTE[0];
            $longitude = $CARTE[1];
            $latitude = $CARTE[2];
            $haut = $longitude + 0.0005;
            $bas = $longitude - 0.0005;
            $gauche = $latitude - 0.0005;
            $droite = $latitude + 0.0005;
            $lien = "https://www.openstreetmap.org/export/embed.html?bbox=".$gauche."%2C".$bas."%2C".$droite."%2C".$haut."&amp;layer=mapnik&amp;marker=".$longitude."%2C".$latitude;
            echo "<div class = 'carte' id=$id_chantier style='margin:50px;' style = 'border: 2px solid black;'>";
            echo "<h3 style='text-align:center; border : 2px solid black; cursor : pointer;'> Chantier ".$id_chantier."</h3>";
            echo "<iframe id='carte".$id_chantier."' width='300px' height='300px' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src=$lien style='border: 1px solid black'></iframe>";
            echo "</div>";
        }
    }






