int password[4];
int readPassword[4];
void setup() {
  // put your setup code here, to run once: 
  for(int i=0;i<4;i++){
    password[i]=i;
  }
  for(int i=0;i<4;i++){
    pinMode(password[i],INPUT);
  }
  Serial.begin(9600);
}

void loop() {
  // put your main code here, to run repeatedly:
  for(int i=0;i<4;i++){
    readPassword=digitalRead(password[i]);
  }
  if(passwordIsCorrect(readPassword)==1){
    //Do something for security
  }
}

int passwordIsCorrect(int readPassword[]){
  int k=0;
  for(int i=0;i<4;i++){
    k+=readPassword[i];
  }
  if(k==4){
    return 1;
  }
  return 0;
}

