//#include "logo_iclald.h"
#include "IsepScreen.h"
#define MY_LEDV  PF_1
const int micPin  = A0;
#define BUTTON_SELECT 10
#define INTERVAL_LECTURE 100
#define BUF_SIZE  500     // size of the buffer containing the input samples. Must be greater than the order of the filters + K


//INITIALISATION DES VARIABLES
String cmd="";
int screenID = 0,
    oldScreenID = -1;
boolean shouldUpdateScreen = false;
float Puis_Inst;                // input power
float buff[BUF_SIZE];  
int compteur;

int buttonSelectState = 1,
    buttonGoState = 1;
int i;
char M[5],
     T[7],
     H[6],
     
     G[4],
     C[8];

unsigned long  time;
unsigned long oldtime;
unsigned long newtime;



//SETUP====================================================================================

void setup() {
  Serial1.begin(9600);
  Serial.begin(9600);
  
  
  pinMode(BUTTON_SELECT, INPUT_PULLUP);


  InitI2C();
  InitScreen();
  
  
pinMode(MY_LEDV, OUTPUT);
  
for(i = 0; i < BUF_SIZE; i++){
   buff[i]  = 0;
}

Puis_Inst = 0;
compteur = 0;
delay(1);

compteur = 0;
digitalWrite(MY_LEDV, LOW);


  //Display(motif);                           
  DisplayString(0,6,"======================");           
  DisplayString(0,1,"======================");            


  delay(3000);
  Fill(0);


  
  oldtime = millis();
}

void loop() {
  

  buttonSelectState = digitalRead(BUTTON_SELECT);

  
  if(buttonSelectState == 0){
    switch(screenID){
      case 0:
        screenID=1;
        break;
      case 1:
        screenID = 2;
        break;
      case 2:
         screenID = 3;
         break;
      case 3:
         screenID=0;
         break; 
  }
  }
  
  
  

  //On effectue une lecture chaque INTERVAL_LECTURE ms
  newtime = millis();
  if ((newtime - oldtime) > INTERVAL_LECTURE){ 
     readMicro(M);
     readTemp(T);
     readHumidite(H);
   //  readCardiaque (C);

      shouldUpdateScreen = true;
      
      oldtime = millis();

  }

  

  //Si on charge une nouvelle "page"  
  if( oldScreenID != screenID){

      switch(  screenID  ){

        case 0:
            printMessage( 0, "La temperature", "est de : ");
            break;

        case 1:
            printMessage( 1, "L'humidite", " est de : ");      
            break;
             
        case 2:
            printMessage( 2, "Le niveau de bruit", " est de : ");         
            break;
     /*   case 3:
            printMessage( 2, "La frecq cardiaque", " est de : ");         
            break;
       */     
        default:
            break;
        
      }

      oldScreenID = screenID;

  }



  //Si on doit afficher la nouvelle value recue  
  if( shouldUpdateScreen ){

      switch(  screenID  ){

        case 0:
            printSensorValue( T, 7); 
            break;

        case 1:
            printSensorValue( H, 6);     
            break;
             
        case 2:
            printSensorValue( M, 5);             
            break;
  /*      case 3:
            printSensorValue( C, 8);             
            break;
*/
        default:

          break;

        
      }

      shouldUpdateScreen = false;
  }


detect_bruit();
  

}


void printMessage(int numero, char* chaine, char* chaineSuite){

  
    Fill(0);
    DisplayString(8,6,"====================");           
    DisplayString(8,1,"===================="); 

    //Bar scrolling laterale
    /*DisplayCarac(0, numero, '>');     //     '‡'
    for(int i = 0; i < 8; i++){
         DisplayCarac(4, i, '|');  
    } 
        */ 
    

    DisplayString(20, 3, chaine);
    if ( chaineSuite != NULL ){
      DisplayString(22, 4, chaineSuite);
    }
  
}



void printSensorValue(char* s, int taille){

    int pos_x = 128 - (taille)*8;

    DisplayString(pos_x, 5, s);
  
}
