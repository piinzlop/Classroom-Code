const int ledPin1 =  LED_BUILTIN;
int ledState1 = 1;

const int ledPin2 =  LED_BUILTIN;
int ledState2 = 1;

void setup() {
  Serial.begin(115200);
  pinMode(ledPin1, OUTPUT);
  pinMode(ledPin2, OUTPUT);
  unsigned long timer1 = millis();
}

void loop() {
if (millis() - last2 >= 5000 && C>=0 && C<=1) {
    last2 = millis();
    digitalWrite(relay, 1);
    digitalWrite(relayt, 0);
    Serial.println("C1");
    Serial.print(C);
      lcd.setCursor(14,2);
      lcd.print("       ");
      lcd.setCursor(14,2);
      lcd.print("--->>");
      C++;
 }   
 if (millis() - last1 >= 1500 && C>=2 && C<=3) {
    last1 = millis();
    digitalWrite(relayt, 1);
    digitalWrite(relay, 1);
    Serial.println("C2");
    Serial.print(C);
      lcd.setCursor(14,2);
      lcd.print("       ");
      lcd.setCursor(14,2);
      lcd.print(">__<");
      C++;
 }
 if (millis() - last0 >= 5000 && C>=4 && C<=5) {
    last0 = millis();
    digitalWrite(relay, 0);
    digitalWrite(relayt, 1);
    Serial.println("C3");
    Serial.print(C);
      lcd.setCursor(14,2);
      lcd.print("       ");
      lcd.setCursor(14,2);
      lcd.print("<<---");
      C++;
 }
if (millis() - last3 >= 1500 && C>=6 && C<=7) {
    last3 = millis();
    digitalWrite(relay, 1);
    digitalWrite(relayt, 1);
    Serial.println("C3");
    Serial.print(C);
      lcd.setCursor(14,2);
      lcd.print("       ");
      lcd.setCursor(14,2);
      lcd.print(">___.<");
      C++;
      if(C==7)C=0;
 }
}
