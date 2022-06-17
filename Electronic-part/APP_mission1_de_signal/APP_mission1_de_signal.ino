
#define  RCV_TIM_LIMIT  10000000
#define MY_LEDV  PF_1
#define micPin  A10


#define BUF_SIZE  50     // size of the buffer containing the input samples. Must be greater than the order of the filters + K

#define KP 50            // number of samples for the estimation of the signal power

#define S -- to define          // Threshold applied to the signal power  for the signal detection

float buff[BUF_SIZE];  
float Puis_Inst;                // input power
float puis_moy;                 // puis moy
int noise_cond=110000;
float liste_autocorrelation[BUF_SIZE];  

unsigned long current_time = 0;
unsigned long current_time0 = 0;
unsigned long next_sample_time = 0;
unsigned long delta[20];
unsigned int  Ts = 500;

int compteur;


/*
int16_t[] tab_puis_inst;
int noise_cond = 80;
int puis_moy=0;
int16_t j =0;
int16_t k = 0;
boolean Bruit=0;
int DerniereLecture =0;
int duree_bruit=0;
int DernierBruit=0;
boolean Silence =1;
boolean Dt=1;
int16_t dt=0,5;
int Fe ;                      // Donner une fréquence d'échantillonage
int16_t[] List_autocorr;
*/




void setup() {
  // put your setup code here, to run once:
 int i;

  // initialize  serial ports:

  Serial.begin(9600);
  Serial1.begin(9600);

  pinMode(MY_LEDV, OUTPUT);


  
  for (i = 0; i < BUF_SIZE; i++)
  {
    buff[i]  = 0;
  }
  Puis_Inst = 0;
  compteur = 0;
  delay(1);

  compteur = 0;
  digitalWrite(MY_LEDV, LOW);
}

void loop() {
  // put your main code here, to run repeatedly: 
   for (int i = BUF_SIZE - 2; i >= 0; i--)          // Go through list, next element = current element, to make room in first few elements
  {
    buff[i+1] = buff[i];  
  }
  // ... and acquire the new sample
  current_time = micros() ;
  while (current_time < next_sample_time){

 current_time = micros();

  }
  buff[0] = (float) analogRead(micPin);     // Fill first element with new value // Gotta change My_input with entry/read port
// Define the next sampling time
  next_sample_time += (unsigned long)Ts;

  //Serial.println(buff[0]);
/*

int16_t tab_puis_inst[BUF_SIZE];
for(int i=0; i<BUF_SIZE; i++){
  Puis_Inst = buff[i]^2;                 // Calcul de la puiss instantanée
  tab_puis_inst[i]= Puis_Inst;  
  puis_moy += Puis_Inst;              // probably unneccessary cause doing puis_moy only for bruit
  j+=1;                               // probably unneccessary
}
puis_moy = puis_moy/j;                // probably unneccessary
*/

Puis_Inst = 0;
for(int i=1; i< BUF_SIZE - 2; i++){
  Puis_Inst += (buff[i]*buff[i] + buff[i-1]*buff[i-1] + buff[i+1]*buff[i+1])/3;
}
puis_moy = Puis_Inst/50;
Serial.println("La puissance est de :" );
Serial.println(puis_moy);


if(puis_moy > noise_cond){
  digitalWrite(MY_LEDV,HIGH);
} else {
    digitalWrite(MY_LEDV,LOW);
}

// Détermination de l'autocorrélation

int autocor = 0;
int max_autocor = 0;
int delai_max_autocor=0;

Serial.println("L'autocorrélation est de :");

for(int T=0; T < BUF_SIZE-1; T++){
  autocor = 0;
  for(int i=0; i < BUF_SIZE -1-T; i++){
    autocor += buff[i]*buff[i+T]; 
  }
  if(max_autocor < autocor){
    max_autocor = autocor;
    delai_max_autocor = T;
  }    
/*  Serial.print(autocor);
  Serial.print( " pour un delai de ");
  Serial.print(T);
  Serial.println(" echantillons");*/
}
Serial.println("Le maximum pour l'autocorrelation est de : ");
Serial.println(max_autocor);
Serial.println("  -  obtenue pour un delai de : ");
Serial.println(delai_max_autocor);
}


// ......................... Detection de bruit ....................
/*
for(int i =0; i<BUF_SIZE;i++){
  if((tab_puis_inst[i]>noise_cond) && (DerniereLecture ==0)){
    DerniereLecture=i;
  }
  if((tab_puis_inst[i]>noise_cond) && (DerniereLecture>0) && ((i-DerniereLecture)/Fe)>Dt){
    if(Bruit ==1){
      Serial.print("Bruit");
                                  // ne sait pas encore comment traduire cette ligne (calcul puissance moy pour un bruit, ca comprend cb d'éléments d'éléments de l'échantillon
      Serial.print(puis_moy);
                                   //calculate duree_bruit
      Serial.print(duree_bruit);
                                    // dunno if t = DerniereLecture:i; is neccessary nor how to convert it
                                    // dunno how to get voltage from signal
                                    
    }
    DerniereLecture = 0;
    DernierBruit=0;
    Bruit=0;
    Silence=1;
  }

  if(tab_puis_inst[i]<noise_cond && DernierBruit==0){
    DernierBruit =i;
  }
  if(tab_puis_inst[i]<noise_cond && DernierBruit>0 && ((i-DernierBruit/Fe))>dt){
    if(Silence == 1){
      Serial.print("Silence");
    }
    DernierBruit=0;
    DerniereLecture=0; 
    Silence =0;
    Bruit =1;
  }

}


// ................... Passage à la partie d'autocorrélation
// k représente le décalage temporel entre les deux signaux de l'autocorrélation

int16_t max_autocorr = buff[0].^2;
int16_t delai=0;

Serial.print("L'autocorrélation est de : ");

  for (int i = 0; i < BUF-SIZE; i++){      
    List_autocorr[i]= buff[0]*buff[i];         // Make list of autocorr value for every delay
    Serial.print(List_autocorr[i]);
    if(max_autocorr < List_autocorr[i]){
      max_autocorr = List_autocorr[i];        // Get max autocorr value
      delai = i;                              // get delai for max autocorr, (can improve by converting to seconds
    }
  }
  
Serial.print("Le max d'autocorrélation est de : " + max_autocorr);
Serial.print("Delai du max d'autocorrélation est de : " + delai);*/
