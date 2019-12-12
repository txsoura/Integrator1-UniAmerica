#include <Adafruit_Fingerprint.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <Wire.h>
#include <Adafruit_Sensor.h>
  
/*Red: 3v3
 *Black: GND 
 *White: D1
 *Green: D2
*/
SoftwareSerial mySerial(4, 5);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
uint8_t id;


// Replace with your network credentials
const char* ssid     = "Campus Boulevard";
const char* password = "";

// REPLACE with your Domain name and URL path or IP address with path
const char* serverName = "http://integrador01.000webhostapp.com/sensor.php";

// If you change the apiKeyValue value, the PHP file /post-esp-data.php also needs to have the same key 
String apiKeyValue = "tPmAT5Ab3j7F9";
int d=0,a=0;


void setup() {
  Serial.begin(57600);

  //ESP8266 initialization
  WiFi.begin(ssid, password);
  Serial.println("Ligando o WiFi");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Conetado a rede WiFi network com o IP: ");
  Serial.println(WiFi.localIP());

  //Adafruit fingerprint initialization
  while (!Serial);  
  delay(100);
  Serial.println("\n\nAdafruit Sensor de digitais");

  // set the data rate for the sensor serial port
  finger.begin(57600);
  
  if (finger.verifyPassword()) {
    Serial.println("Sensor de digitais encontrado!");
  } else {
    Serial.println("Sensor de digitais nao encontrado :(");
    while (1) { delay(1); }
  }

  finger.getTemplateCount();
  Serial.print("O sensor contem "); Serial.print(finger.templateCount); Serial.println(" digitais");
  Serial.println("Escolha a opcao do menu...");
}

uint8_t readnumber(void) {
  uint8_t num = 0;
  
  while (num == 0) {
    while (! Serial.available());
    num = Serial.parseInt();
  }
  return num;
}


void loop() {
    a=0,d=0;
    Serial.println("1. Requisitar");
    Serial.println("2. Cadastrar");
    
    int opc=readnumber();
    
    if(opc==1){
      if(WiFi.status()== WL_CONNECTED){
        Serial.println("Digite o codigo do dispositivo");
        d=readnumber();
//        a=readnumber();
        while(a==0 || a==-1){
          a= getFingerprintIDez();
          delay(50);  
        }
        send();
      
      }else{
        Serial.println("WiFi desconetado");
      }
    }
    
    if(opc==2){
      Serial.println("Pronto para cadastrar!");
      Serial.println("Escreva o ID # (de 1 a 127) do aluno que queres salvar a digital ...");
      id = readnumber();
      
      if (id == 0) {// ID #0 not allowed, try again!
        return;
      }
      
      Serial.print("Scannando ID #");
      Serial.println(id);
        
        while (!  getFingerprintEnroll() );
    }
}

uint8_t getFingerprintEnroll() {

  int p = -1;
  Serial.print("A espera de uma digital valida #"); Serial.println(id);
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Digital lida");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro na comunicacao");
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Erro na digital");
      break;
    default:
      Serial.println("Erro desconhecido");
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Digital convertida");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Digital nao esta clara");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro na comunicacao");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Digital nao encontrada");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Digital nao encontrada");
      return p;
    default:
      Serial.println("Erro desconhecido");
      return p;
  }
  
  Serial.println("Remova o dedo");
  delay(2000);
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }
  Serial.print("ID "); Serial.println(id);
  p = -1;
  Serial.println("Coloco o mesmo dedo novamente");
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Digital lida");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.print(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro na Comunicacao");
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Erro ao tirar digital");
      break;
    default:
      Serial.println("Erro desconhecido");
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Digital convertida");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Digital nao esta clara");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro na Comunicacao");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Digital nao encontrada");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Digital nao encontrada");
      return p;
    default:
      Serial.println("Erro desconhecido");
      return p;
  }
  
  // OK converted!
  Serial.print("Criando modelo para #");  Serial.println(id);
  
  p = finger.createModel();
  if (p == FINGERPRINT_OK) {
    Serial.println("Digital encontrada!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Erro de comunicacao");
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    Serial.println("Digital nao encontrada");
    return p;
  } else {
    Serial.println("Erro desconhecido");
    return p;
  }   
  
  Serial.print("ID "); Serial.println(id);
  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    Serial.println("Gravado!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Erro de comunicacao");
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    Serial.println("Nao foi possivel salvar nessa localizacao");
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    Serial.println("Erro ao escrever no flash");
    return p;
  } else {
    Serial.println("Erro desconhecido");
    return p;
  }   
}

uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Digital convertida");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("Nenhum dedo detetado");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro de comunicacao");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Erro ao tirar imagem");
      return p;
    default:
      Serial.println("Erro desconhecido");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Digital convertida");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Digital nao esta clara");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro na communicacao");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Digital nao encontrada");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Digital nao encontrada");
      return p;
    default:
      Serial.println("Erro desconhecido");
      return p;
  }
  
  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Encontrou correspondecia da digital!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Erro na Comunicacao");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("Nao encontrou correspondecia");
    return p;
  } else {
    Serial.println("Erro desconhecido");
    return p;
  }   
  
  // found a match!
  Serial.print("Encontrou o ID #"); Serial.print(finger.fingerID); 
  Serial.print(" com confidencia de "); Serial.println(finger.confidence); 

  return finger.fingerID;
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;
  
  // found a match!
  Serial.print("Encontrou o ID #"); Serial.print(finger.fingerID); 
  Serial.print(" com confidencia de "); Serial.println(finger.confidence);
  
  return finger.fingerID; 
}

uint8_t send(){
  
  HTTPClient http;
    
    // Your Domain name with URL path or IP address with path
    http.begin(serverName);
    
    // Specify content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP POST request data
    String httpRequestData = "k=tPmAT5Ab3j7F9&d="+ String(d) +"&a="+String(a);
    Serial.print("Dados enviados: ");
    Serial.println(httpRequestData);

    // Send HTTP POST request
    int httpResponseCode = http.POST(httpRequestData);

    if (httpResponseCode>0) {
      Serial.print("Resposta HTTP: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Erro codigo: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
  
}
