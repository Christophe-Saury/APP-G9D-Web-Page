

void readMicro(char d[5]){
  int A = analogRead(micPin);
  //A= (A*3.3)/4095.0;
  String(A).toCharArray(d,5);


DebTrame();
TrameMic(A);
}

