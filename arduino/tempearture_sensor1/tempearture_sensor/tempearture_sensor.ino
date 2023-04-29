#include "Arduino.h"
#include "DS18B20.h"

// Pin Definitions
#define DS18B20WP_PIN_DQ	2

// object initialization
DS18B20 ds18b20wp(DS18B20WP_PIN_DQ);

float calibration_value = 28.00; //21.34
int phval = 0; 
unsigned long int avgval; 
int buffer_arr[10],temp;

void setup() 
{
  Serial.begin(9600);
  Serial.print("   Welcome to      ");
  Serial.print(" Circuit Digest    ");
  delay(2000);
}

void loop() {
  // DS18B20 1-Wire Temperature Sensor - Waterproof
  // Read DS18B20 temp sensor value in degrees celsius. for degrees fahrenheit use ds18b20wp.ReadTempF()
  float ds18b20wpTempC = ds18b20wp.readTempC();
  float ds18b20wpTempF = ds18b20wp.readTempF();
  Serial.print(F("Temp Celsius: ")); Serial.print(ds18b20wpTempC); Serial.println(F(" [C]"));
  Serial.print(F("Temp Fahrenheit: ")); Serial.print(ds18b20wpTempF); Serial.println(F(" [F]"));

  // For pH Sensor
  for(int i=0;i<10;i++) { 
    buffer_arr[i]=analogRead(A0);
    delay(30);
  }

  for(int i=0;i<9;i++){
    for(int j=i+1;j<10;j++){
      if(buffer_arr[i]>buffer_arr[j]){
        temp=buffer_arr[i];
        buffer_arr[i]=buffer_arr[j];
        buffer_arr[j]=temp;
      }
    }
  }

  avgval=0;
  for(int i=2;i<8;i++)
  avgval+=buffer_arr[i];
  float volt=(float)avgval*5.0/1024/6;
  float ph_act = -5.70 * volt + calibration_value; //3.5*volt  -5.70 * volt + calibration_value
  Serial.println("pH Val: ");
  Serial.println(ph_act);
  delay(1000);
}