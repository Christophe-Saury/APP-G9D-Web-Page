# -*- coding: utf-8 -*-
"""
Spyder Editor

This is a temporary script file.
"""
import random


def mdpalea(n):
    lettre='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    chiffreCaractère='0123456789!./?#@'
    mot = ""
    for i in range(n):
        mot += lettre[random.randrange(0,51,1)]
        mot += lettre[random.randrange(0,51,1)]
        mot += chiffreCaractère[random.randrange(0,15,1)]
    return mot



def creerTableUtilisateurs(a,b, poste, nom_fichier):
    c = open("C:\\Users\\Benjamin\\Downloads\\" + nom_fichier + ".txt", "w")

    
    NOMS = ['Martin','Bernard','Thomas','Petit','Robert','Richard','Durand','Dubois','Moreau','Laurent','Simon',
            'Michel','Lefebvre','Leroy','Roux','David','Bertrand','Morel','Fournier','Girard','Bonnet','Dupont',
            'Lambert','Fontaine','Rousseau','Vincent','Muller','Lefevre','Faure','Andre','Mercier','Blanc',
            'Guerin','Boyer','Garnier','Chevalier','Francois','Legrand','Gauthier','Garcia','Perrin','Robin',
            'Clement','Morin','Nicolas','Henry','Roussel','Mathieu','Gautier','Masson']    
    PRENOMS = ['Léa','Manon','Chloé','Maxime','Camille','Emma','Océane','Nicolas','Marie','Quentin','Clément',
              'Alexandre','Sarah','Alexis','Thomas','Enzo','Laura','Lucas','Clara','Julie','Théo','Valentin',
              'Lucie','Léo','Inès','Louis','Romain','Pauline','Benjamin','Tom','Marine','Pierre','Hugo','Adrien',
              'Maeva','Kevin','Mathis','Antoine','Axel','Juilette','Guillaume','Jade','Louise','Mattéo','Jules',
              'Margaux','Célia','Clémence','Vincent','Mathilde']
    
    
    for x in range(a,b):
        i = str(x)
        N = NOMS[random.randint(0, 49)]
        P = PRENOMS[random.randint(0,49)]
        AM = str.lower(P)+"."+str.lower(N)+"@mail.com"
        M = mdpalea(33)
        poste = str(random.randint(1,9))
        #poste = "NULL"
        #role = str(random.randint(0, 2))
        role = str(poste)
        c.write(str("INSERT INTO utilisateur VALUES ( " + i + ", '" + AM +"', '" + M + "', '" + N + "', '" + P + "', " + role + ", " + poste +");\n"))

    c.close()
creerTableUtilisateurs(0,10,0,"nomsAdministrateurs")
creerTableUtilisateurs(10,30,1,"nomsGestionnaires")
creerTableUtilisateurs(30,100,2,"nomsUtilisateurs")

#print(str("UPDATE utilisateur SET poste = "+ poste + " WHERE id_utilisateur=" + i + ";"))


"""
def TableCapteurCardiaque(a,n,m):
    c = open("C:\\Users\\Benjamin\\Downloads\\" + nom_fichier + ".txt", "w")
    for x in range(a,n):
        for y in range(m):    
            heure = str(random.randint(8, 20))
            minute = str(random.randint(0, 59))
            seconde = str(random.randrange(0, 59, 15))
            if len(heure) == 1:
                heure = "0" + heure
            if len(minute) == 1:
                minute = "0" + minute
            if len(seconde) == 1:
                seconde = "0" + seconde
            horaire = heure + ":" + minute + ":" + seconde
            frequence = str(random.randint(40, 200))
            c.write(str("INSERT INTO mesures_cardiaque VALUES (DEFAULT, '2022-01-01', '" + horaire + "', " + frequence + ", " + str(x+1) + ");" ))  
    c.close()
    
print(TableCapteurCardiaque(140,150,40))
"""


def TableCapteurFixe(n1,n2,nom_fichier):
    c = open("C:\\Users\\Benjamin\\Downloads\\Mai" + nom_fichier + ".sql", "w")
    texte = "INSERT INTO mesures_fixes VALUES\n"
    for k in range(n1,n2):
        co2 = random.randint(400,800)
        humidite = random.randrange(0,1000,1)/10
        temperature = random.randrange(0,250,1)/10
        bruit = random.randrange(60,100,1)/10
        for jour in range(1,32):
            day = str(jour)
            if len(day) == 1:
                day = "0" + day
            day = "2022-05-" + day
            # ----------------------------------------------------------------------------------
            for heure in range(0,24):
                hour = str(heure)
                if len(hour) == 1:
                    hour = "0" + hour
                # ------------------------------------------------------------------------------
                for minute in range(0,60,20):
                    minutes = str(minute)
                    if len(minutes) == 1:
                        minutes = "0" + minutes
                    # --------------------------------------------------------------------------
                    for seconde in range(0,60,60):
                        sec = str(seconde)
                        if len(sec) == 1:
                            sec = "0" + sec
                        horaire = hour + ":" + minutes + ":" + sec
                        # ----------------------------------------------------------------------
                        varCo2 = random.randint(-5,5)
                        co2 = max(varCo2 + co2,200)
                        co2 = min(co2,1500)
                        strCo2 = str(co2)
                        # ----------------------------------------------------------------------
                        varHumidite = random.randrange(-10,11,1)/10
                        humidite = max(humidite + varHumidite, 0)
                        humidite = min(humidite,100)
                        humidite = round(humidite, 4)
                        strHumidite = str(humidite)
                        # ----------------------------------------------------------------------
                        varTemperature = random.randrange(-3,4,1)/10
                        temperature = max(temperature + varTemperature, -10)
                        temperature = min(temperature,50)
                        temperature = round(temperature, 4)
                        strTemperature = str(temperature)                      
                        # ----------------------------------------------------------------------
                        varBruit = random.randrange(-30,31,1)/10
                        bruit = max(bruit + varBruit, 40)
                        bruit = min(bruit,130)
                        bruit = round(bruit, 4)
                        strBruit = str(bruit)    
                        # ----------------------------------------------------------------------
                        id_capteur = str(k)
                        texte += str("\n (DEFAULT, '"+ day + "', '" + horaire + "', " + strCo2 + ", " + strHumidite + ", " + strTemperature + ", " + strBruit + ", " + id_capteur+ ")," )  
    texte=texte[:-1]
    texte+=";"
    c.write(texte)
    c.close()
    
TableCapteurFixe(0,5,"capteurs_fixes_mai1")
TableCapteurFixe(5,10,"capteurs_fixes_mai2")

#TableCapteurFixe(1,2,"capteurs_fixes_mai_1")
#TableCapteurFixe(2,3,"capteurs_fixes_mai_2")
#TableCapteurFixe(3,4,"capteurs_fixes_mai_3")
#TableCapteurFixe(4,5,"capteurs_fixes_mai_4")
#TableCapteurFixe(5,6,"capteurs_fixes_mai_5")
#TableCapteurFixe(6,7,"capteurs_fixes_mai_6")
#TableCapteurFixe(7,8,"capteurs_fixes_mai_7")
#TableCapteurFixe(8,9,"capteurs_fixes_mai_8")
#TableCapteurFixe(9,10,"capteurs_fixes_mai_9")



#print(str("UPDATE mesures_fixes SET id_capteur = "+ id_capteur + " WHERE id_mesures_fixes=" + str(x+1) + ";"))
# SELECT nom, prenom, frequence FROM utilisateur INNER JOIN mesures_cardiaque ON utilisateur.id_utilisateur = mesures_cardiaque.id_utilisateur;



# SELECT nom, prenom FROM utilisateur INNER JOIN (SELECT COUNT(frequence) FROM mesures_cardiaque GROUP BY id_utilisateur) ON utilisateur.id_utilisateur = mesures_cardiaque.utilisateur;

"""CREATE TABLE mesures_cardiaque(
    id_mesure INTEGER NOT NULL AUTO_INCREMENT,
    jour DATE,
    horaire TIME,
    frequence DECIMAL,
    id_utilisateur INTEGER,
    PRIMARY KEY (id_mesure),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
    );"""


#print(str("INSERT INTO utilisateur VALUES ("+ i +", '" + AM +"', '" + M + "', '" + N + "', '" + P + "', " + poste + ", " + role +");"))
#print(str("UPDATE utilisateur SET ("+ i +", '" + AM +"', '" + M + "', '" + N + "', '" + P + "', " + poste + ", " + role +") WHERE id_utilisateur=" + i + ";"))
        
        
        
        
"""CREATE TABLE mesures_fixes(
    id_mesure INTEGER AUTO_INCREMENT,
    jour DATE,
    horaire TIME,
    co2 INTEGER,
    humidite DECIMAL,
    temperature DECIMAL,
    bruit DECIMAL,
    id_capteur INTEGER,
    PRIMARY KEY id_mesure
    FOREIGN KEY (id_capteur) REFERENCES capteurs_fixes(id_capteur)
    );"""




def compléterTableValeurs(id1,id2, jour, nom_fichier):
    c = open("C:\\Users\\Benjamin\\Downloads\\valeurs" + nom_fichier + ".sql", "w") 
    texte = "INSERT INTO mesures_cardiaque VALUES \n"
    day = str(jour)
    if len(day) == 1:
        day = "0" + day
    day = "2022-06-" + day
    for x in range(id1,id2,20):
        seuilMin = 40
        seuilMax = 180
        frequence = random.randint(50,80)
        # ----------------------------------------------------------------------------------
        for heure in range(8,18):
            hour = str(heure)
            if len(hour) == 1:
                hour = "0" + hour
            # ------------------------------------------------------------------------------
            for minute in range(0,60,1):
                minutes = str(minute)
                if len(minutes) == 1:
                    minutes = "0" + minutes
                # --------------------------------------------------------------------------
                for seconde in range(0,60,5):
                    sec = str(seconde)
                    if len(sec) == 1:
                        sec = "0" + sec
                    horaire = hour + ":" + minutes + ":" + sec
                    # ----------------------------------------------------------------------
                    modifFreq = random.randrange(-5,6,1)
                    frequence = modifFreq + frequence
                    frequence = max(seuilMin, frequence)
                    frequence = min(seuilMax, frequence)
                    text = str("\n(DEFAULT, '" +
                               str(day) + "', '" + 
                               str(horaire) + "', " + 
                               str(frequence) + ", " + str(x) + "),")
                    texte += text
    texte = texte[:-1]
    c.write(texte)
    c.write(";")
    c.close()
    
compléterTableValeurs(0, 20, "_cardiaque_mai_0_20")
compléterTableValeurs(20, 40, "_cardiaque_mai_20_40")
compléterTableValeurs(40, 60, "_cardiaque_mai_40_60")
compléterTableValeurs(60, 80, "_cardiaque_mai_60_80")
compléterTableValeurs(60, 80, "_cardiaque_mai_80_100")


    
    
    
    
for jour in range(3,4):
    day = str(jour)
    if len(day) == 1:
        day = "0" + day
    day = "2022-06-" + day
    phrase = "valeursCardiaques" + str(day)
    compléterTableValeurs(1,50,jour, phrase + "_0_25")


                 
    


