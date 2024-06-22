#include "PowerSupplyCheck.h"

void PowerSupplyCheck_3v3(String *check) {
  int n_3v = analogRead(35);
  float sense_3v = (n_3v / 4095.0) * 3.3;
  *check = "3.3v check= ";
  *check += String(sense_3v) + 'v';
}

void PowerSupplyCheck_5v(String *check)
{
  int n_5v = analogRead(32);
  float sense_5v = (n_5v / 4095.0) * 5;
  *check = "5v check = ";
  *check += String(sense_5v) + "v";
}

void PowerSupplyCheck_24v(String *check)
{
  int n_24v = analogRead(33);
  float sense_24v = (n_24v / 4095.0) * 24;
  *check = "24v check= ";
  *check += String(sense_24v) + "v";
}


