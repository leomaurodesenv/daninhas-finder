const int pinoAnalogico = A0;
int valorSensor = 0;
int calibracao = 0;
int contador = 0;
int taxaatualizacao=5000;

void setup() {
  Serial.begin(9600);
  pinMode(A0,INPUT);
  pinMode(A2, INPUT);
  pinMode(4,OUTPUT);
  pinMode(13,OUTPUT);
}

void loop() {
  valorSensor = analogRead(pinoAnalogico);   
  calibracao = analogRead(A2);
  //Serial.print(calibracao);
  //Serial.print('\n');
  if(valorSensor<=calibracao)
  {
    digitalWrite(13,HIGH);
  }
  else
  {
    digitalWrite(13,LOW);
  }
  if(contador==taxaatualizacao)
  {
    if(valorSensor<400)
    {
      Serial.println(valorSensor);
    }
    else
    {
      //Serial.print('\n');
    }
    contador = 0;
  }
  else
  {
   // Serial.print('\n');
  }
  digitalWrite(4,HIGH);  
  contador++;
  delay(1);                     
}

