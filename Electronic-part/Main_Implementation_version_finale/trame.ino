  float ValTemp, Valmic, ValCapt, ValHum;
   String strTimer, strValCapt;
  char grade ='0';
  String trame;
  
void DebTrame() {  

  trame = "1G9-D1";
}
   
  //..........................................................................................
  /*  int ValCard = analogRead();
    int ValCO2 = analogRead();*/
    //................................................
    
    void TrameTemp(int C){
    trame = trame + "101";
    ValCapt = C;
    EndTrame();}
    
 /*  void readCardiaque(int freq){
    trame = trame + "201";
    ValCapt = freq;
    EndTrame();
  }    */

   void TrameHum(int B){
    trame = trame + "102";
    ValCapt = B;
    EndTrame();
  }

  void TrameMic(int A){
    trame = trame + "301";  
    ValCapt = A;
    EndTrame();
  }

/*void TrameCO2(){ 
    CO2();
    trame = trame + "401";
    ValCapt = ppm;
    endTrame();
    trame = "100011402";
      ValCapt = autrevaleur;
}*/

  void EndTrame(){
//.....................................................................................
    strValCapt = String(ValCapt, HEX);
    char first_digit;
    
    if(ValCapt<16){  //first digit
      trame = trame + "000";
      first_digit = (char) strValCapt[0];
          trame = trame + first_digit;
    }
 else if(ValCapt < 256){ //second digit
      trame = trame + "00";
       first_digit =  (char)strValCapt[0];
      char sec_digit = strValCapt[1];
      trame = trame + first_digit + sec_digit;
    } 
    else if(ValCapt<4096){  //three digits
      trame = trame + "0";
       first_digit = strValCapt[0];
      char sec_digit = strValCapt[1];
      char third_digit = strValCapt[2];
      trame = trame + first_digit + sec_digit + third_digit;
    } 
    else { 
       first_digit = strValCapt[0];
      char sec_digit = strValCapt[1];
      char third_digit = strValCapt[2];
      char fourth_digit = strValCapt[3];
           trame = trame + first_digit + sec_digit + third_digit + fourth_digit;
    }

//...................................................................................
    int Timer = millis()/1000;
    strTimer = "0000";
    trame = trame + strTimer;
//.......................................................................................
   char checksum = 0;
   for ( int i = 0; i < 17; i ++ ){
    checksum = checksum + (char)trame[i];
  }
  char a1_check = (checksum & 0x0F);
  char a2_check = (checksum & 0xF0)>>4;
  grade = a2_check;
  DoSwitch();
  grade = a1_check;
  DoSwitch();
   Serial.print(trame);

 
  Serial1.print(trame);

  
}

void DoSwitch(){
   switch(grade) {
         case 0 :
            trame = trame + "0";
            break;
         case 1 :
            trame = trame + "1";
            break;
         case 2 :
            trame = trame + "2";
            break;
         case 3 :
            trame = trame + "3";
            break;
         case 4 :
            trame = trame + "4";
            break;
         case 5 :
            trame = trame + "5";
            break;
         case 6 :
            trame = trame + "6"; 
            break;
         case 7 :
            trame = trame + "7";
            break;
         case 8 :
            trame = trame + "8";
            break;
         case 9 :
            trame = trame + "9";
            break;
         case 10 :
            trame = trame + "A";
            break;
         case 11 :
            trame = trame + "B"; 
            break;
         case 12 :
            trame = trame + "C";
            break;
         case 13 :
            trame = trame + "D";
            break;
         case 14 :
            trame = trame + "E";
            break;
         case 15 :
            trame = trame + "F";
            break;
 }   
}
