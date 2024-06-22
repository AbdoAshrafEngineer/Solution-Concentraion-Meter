#ifndef WIFI_SETUP_H
#define WIFI_SETUP_H

#include <Arduino.h>
#include <WiFi.h>
#include <AsyncTCP.h>
#include <ESPAsyncWebServer.h>
#include "SPIFFS.h"
#include "../POWER_SUPPLY_CHECK/PowerSupplyCheck.h"
#include "../SOLUTION_CONCENTRATION/GetConcentration.h"

extern const char* ssid;
extern const char* password;
extern AsyncWebSocket ws;
extern AsyncWebServer server;
extern String message;
extern String direction;
extern String steps;
extern String chickmotor;
extern bool newRequest;
extern String sen_5v, ln, sen_24v, con, sen_3v;
extern String sense_state_24, sense_state_5, sense_state_sol1;
extern String SolConc;


// Function prototypes
void initSPIFFS();
void initWiFi();
void notifyClients(String state);
void handleWebSocketMessage(void *arg, uint8_t *data, size_t len);
void onEvent(AsyncWebSocket *server, AsyncWebSocketClient *client, AwsEventType type, void *arg, uint8_t *data, size_t len);
void initWebSocket();
String processor(const String& var);


#endif // IOT_PROJECT_H
