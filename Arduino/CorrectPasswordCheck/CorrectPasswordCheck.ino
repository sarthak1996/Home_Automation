// How to Make an Arduino Keypad Lock
// Jlaservideo.com
#include <Keypad.h>
char* password = "159";  // change the password here, just pick any 3 numbers
int position = 0;
const byte numRows= 4; //number of rows on the keypad
const byte numCols= 4; //number of columns on the keypad
char keymap[numRows][numCols]=
{
{'1', '2', '3', 'A'},
{'4', '5', '6', 'B'},
{'7', '8', '9', 'C'},
{'*', '0', '#', 'D'}
};

//Code that shows the the keypad connections to the arduino terminals
byte rowPins[numRows] = {9,8,7,6}; //Rows 0 to 3
byte colPins[numCols]= {5,4,3,2}; //Columns 0 to 3
int tries=0;
Keypad myKeypad= Keypad(makeKeymap(keymap), rowPins, colPins, numRows, numCols);

int RedpinLock = 12;
int GreenpinUnlock = 13;
int n=0;
int count=0;
char* a="$$$$";
void setup()
{
  
pinMode(RedpinLock, OUTPUT);
pinMode(GreenpinUnlock, OUTPUT);
LockedPosition(true);
Serial.begin(9600);

}

void loop()
{
  
  char key = myKeypad.getKey();
 
  if(key=='1' || key=='2' || key=='3' || key=='4' || key=='5' || key=='6' || key=='7' || key=='8' || key=='9' || key=='0' || key =='#' || key=='*'){
    Serial.println(key);
    a[count]=key;
    count++;
    if(key=='*'){
      count=0;
      LockedPosition(1);
    }
    if(a[3]=='#' && count==4){
  
      int i=0;
      int flag=1;
      for(;i<3;i++){
        if(a[i]!=password[i]){
          flag=0;
        }
      }
      if(flag==1){
   
        tries=0;
        count=0;
        LockedPosition(0);
      }else{
        tries++;
        count=0;
        LockedPosition(1);
      }
    }else if (count==4){
     
      count=0;
      tries++;
      LockedPosition(1);
    }
   }
   if(tries>=3){
    //Trying to break in
    count=0;
    Serial.println("Trying to break in");
   }
   delay(90);
}


void LockedPosition(int locked)
{
if (locked==1)
{
digitalWrite(RedpinLock, HIGH);
digitalWrite(GreenpinUnlock, LOW);
n=0;
Serial.println("no");
}
else
{  
digitalWrite(RedpinLock, LOW);
digitalWrite(GreenpinUnlock, HIGH);
n=1;
Serial.println("yes");
}
}
