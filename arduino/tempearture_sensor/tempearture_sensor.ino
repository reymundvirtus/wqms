#include "Arduino.h"
#include <Ethernet.h>
// #include <SPI.h>
#include "DS18B20.h"

// Pin Definitions
#define DS18B20WP_PIN_DQ	2
// rain sensor 
#define sensorPin A1
// salinity sensor
int analogPin = 2;
int dtime = 500;
int raw = 0;
int Vin = 5;
float Vout = 0;
float R1 = 1000;
float R2 = 0;
float buff = 0;
float avg = 0;
int samples = 5000;
float CalibrationTemp = 21.0;	//This is the temperature from which calibration is done. Change if needed
float CorrectionFactor = 1.02;	//Correction factor found by us. Change if needed

// object initialization
DS18B20 ds18b20wp(DS18B20WP_PIN_DQ);//148132

float calibration_value = 28.00; //21.34
int phval = 0; 
unsigned long int avgval; 
int buffer_arr[10],temp;

// replace the MAC address below by the MAC address printed on a sticker on the Arduino Shield 2
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

void setup() 
{
  // for salinity
  pinMode(8,OUTPUT); // define ports 8 and 7 for AC 
  pinMode(7,OUTPUT);
  // defualts
  Serial.begin(9600);
  Serial.print("   Welcome to      ");
  Serial.print(" Circuit Digest    ");
  delay(2000);
}

void loop() {
  EthernetClient client;   

  int    HTTP_PORT   = 80;
  String HTTP_METHOD = "GET";
  char   HOST_NAME[] = "192.168.100.17"; // change to your PC's IP address // 192.168.254.114 // 192.168.100.17 // 192.168.100.10
  String PATH_NAME   = "/water_quality_ms/arduino/api.php"; //rfid_insert_user.php
  String val = "?tempc=";
  String val1 = "&tempf=";
  String val2 = "&temppH=";
  String val3 = "&tempmoist=";
  String val4 = "&salanity=";

  // initialize the Ethernet shield using DHCP:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to obtaining an IP address using DHCP");
    while(true);
  }

  // connect to web server on port 80:
  if(client.connect(HOST_NAME, HTTP_PORT)) {
    // if connected:
    Serial.println("Connected to server");
    // make a HTTP request:
    // send HTTP header

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
    

    // for rain sensor
    Serial.print("rain sensor: ");
    int sensorValue = analogRead(sensorPin);  // Read the analog value from sensor
    int rain = map(sensorValue, 0, 1023, 255, 0); // map the 10-bit data to 8-bit data
    Serial.println(rain);

    // for salinity sensor
    float tot = 0;
    for (int i =0; i<samples; i++) {
      digitalWrite(7,HIGH);
      digitalWrite(8,LOW);
      delayMicroseconds(dtime);
      digitalWrite(7,LOW);
      digitalWrite(8,HIGH);
      delayMicroseconds(dtime);
      raw = analogRead(analogPin);
      if(raw){
        buff = raw * Vin;
        Vout = (buff)/1024.0;
        buff = (Vin/Vout) - 1;
        R2= R1 * buff;
        tot = tot + R2;
      }
    }
    avg = tot/samples;
    Serial.print("Average resistance: " + String(avg));

    // float dTemp = ds18b20wpTempC - CalibrationTemp;
    // avg = avg * pow(CorrectionFactor, dTemp);
    // // float sal = avg / 1000;
    // Serial.print("Corrected resistance is: " + String(avg)); // 122162 // 

    String tempc = String(ds18b20wpTempC);
    String tempf = String(ds18b20wpTempF);
    String temppH = String(ph_act);
    String tempmoist = String(rain);
    String salanity = String(avg);
  
    client.println(HTTP_METHOD + " " + PATH_NAME + val + tempc + val1 + tempf + val2 + temppH + val3 + tempmoist + val4 + salanity + " HTTP/1.1");
    
    client.println("Host: " + String(HOST_NAME));
    client.println("Connection: close");
    client.println(); // end HTTP header

    while(client.connected()) {
      if(client.available()){
        // read an incoming byte from the server and print it to serial monitor:
        char c = client.read();
        Serial.print(c);
      }
    }

    // the server's disconnected, stop the client:
    client.stop();
    Serial.println();
    //Serial.println("disconnected");
  } else {// if not connected:
    Serial.println("connection failed");
    // Serial.println(Ethernet.localIP());
}  

  
  delay(1000);
}