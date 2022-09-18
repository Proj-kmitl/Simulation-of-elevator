#include "SPI.h"
#include <WiFi.h>

const char* ssid     = "Secret";
const char* password = "21212121";
const char* host = "192.168.43.60";

void setup() {
    Serial.begin(115200);
    SPI.begin();

    Serial.println();
    Serial.println();
    Serial.print("Connecting to ");
    Serial.println(ssid);

    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());
}