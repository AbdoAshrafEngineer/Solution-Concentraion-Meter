#include "Wifi_Setup.h"

void initSPIFFS() {
    if (!SPIFFS.begin(true)) {
        Serial.println("An error has occurred while mounting SPIFFS");
    } else {
        Serial.println("SPIFFS mounted successfully");
    }
}

void initWiFi() {
    Serial.print("Setting AP (Access Point)…");
    WiFi.softAP(ssid, password, 1, 0, 1);

    IPAddress IP = WiFi.softAPIP();
    Serial.print("AP IP address: ");
    Serial.println(IP);
}

void notifyClients(String state) {
    ws.textAll(state);
}

void handleWebSocketMessage(void *arg, uint8_t *data, size_t len) {
    AwsFrameInfo *info = (AwsFrameInfo*)arg;
    if (info->final && info->index == 0 && info->len == len && info->opcode == WS_TEXT) {
        data[len] = 0;
        message = (char*)data;
        steps = message.substring(0, message.indexOf("&"));
        direction = message.substring(message.indexOf("&") + 1, message.indexOf("&&"));
        chickmotor = message.substring(message.indexOf("&&") + 2, message.length());

        Serial.print("steps  ");
        Serial.println(steps);
        Serial.print("direction  ");
        Serial.println(direction);
        Serial.print("chickmotor  ");
        Serial.println(chickmotor);

        notifyClients(direction);
        newRequest = true;
    }
}

void onEvent(AsyncWebSocket *server, AsyncWebSocketClient *client, AwsEventType type, void *arg, uint8_t *data, size_t len) {
    switch (type) {
        case WS_EVT_CONNECT:
            Serial.printf("WebSocket client #%u connected from %s\n", client->id(), client->remoteIP().toString().c_str());
            notifyClients(direction);
            PowerSupplyCheck_5v(&sen_5v);
            notifyClients(sen_5v);
            break;
        case WS_EVT_DISCONNECT:
            Serial.printf("WebSocket client #%u disconnected\n", client->id());
            break;
        case WS_EVT_DATA:
            handleWebSocketMessage(arg, data, len);
            //String temp = *sense_5v;
            break;
        case WS_EVT_PONG:
        case WS_EVT_ERROR:
            break;
    }
}

void initWebSocket() {
    ws.onEvent(onEvent);
    server.addHandler(&ws);
}

String processor(const String& var) {
    Serial.println(var);
    Serial.println(sen_5v);

    if (var == "STATE_5") {
        PowerSupplyCheck_5v(&sen_5v);
        return sen_5v;
    }

    if (var == "STATE_24") {
        PowerSupplyCheck_24v(&sen_24v);
        return sen_24v;
    }

    if (var == "STATE_sol1") {
        GetSolConcentration(&SolConc);
        return SolConc;
    }

    return String();
}
