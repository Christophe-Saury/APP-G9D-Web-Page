int DHpin = A0;
byte dat [5];
byte read_data () {
byte data;
for (int i = 0; i < 8; i ++) {
if (digitalRead (DHpin) == LOW) {
while (digitalRead (DHpin) == LOW);
delayMicroseconds (30);
if (digitalRead (DHpin) == HIGH)
data |= (1 << (7-i));
while (digitalRead (DHpin) == HIGH);
}
 }
return data;
}

void start_test () {
pinMode (DHpin, OUTPUT);
digitalWrite (DHpin, LOW);
delay (30);
digitalWrite (DHpin, HIGH);
delayMicroseconds (40);
pinMode (DHpin, INPUT);
while (digitalRead (DHpin) == HIGH);
delayMicroseconds (80);
if (digitalRead (DHpin) == LOW);
delayMicroseconds (80);
for (int i = 0; i < 4; i ++)
dat[i] = read_data ();
pinMode (DHpin, OUTPUT);
digitalWrite (DHpin, HIGH);
}

void readHumidite(char d[6]){
 // start_test ();
float B =dat[0] + dat[1]*0.01;
(String(dat[0])+ "," + String (dat[1])).toCharArray(d,6);
DebTrame();
TrameHum(B);
}

void readTemp(char d[8]){
// start_test ();
float C =dat[2] + dat[3]*0.01;
(String(dat[2])+ "," + String (dat[3])).toCharArray(d,6);
  DebTrame();
  TrameTemp(C);

}
