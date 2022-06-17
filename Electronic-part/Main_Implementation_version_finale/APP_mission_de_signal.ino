
#define  RCV_TIM_LIMIT  10000000
#define MY_LEDV  PF_1

#define  RCV_TIM_LIMIT  10000000



#define KP 50            // number of samples for the estimation of the signal power

#define S -- to define          // Threshold applied to the signal power  for the signal detection



float puis_moy;                 // puis moy
int noise_cond=550;
float liste_autocorrelation[BUF_SIZE];  
int tension;

unsigned long current_time = 0;
unsigned long current_time0 = 0;
unsigned long next_sample_time = 0;
unsigned long delta[20];
unsigned int  Ts = 500;









void detect_bruit() {
  // put your main code here, to run repeatedly: 
  tension = (float) analogRead(micPin);

  Serial.println(tension);

  if(tension > noise_cond){
    digitalWrite(MY_LEDV,HIGH);
  } 
  else {
      digitalWrite(MY_LEDV,LOW);
  }
  
  
 }
