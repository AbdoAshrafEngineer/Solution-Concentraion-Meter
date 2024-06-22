#include "GetConcentration.h"
static double GetConcentration(double concentration);


void GetSolConcentration(String *con)
{
  int l = analogRead(34);
  float len = (l / 4095.0) * 3.3;
  len += LinearizeInternalADCOutputVoltage(len);
  float conc = GetConcentration(len);
  *con = "sol %= ";
  *con += String(conc);
  return;
}

static double GetConcentration(double concentration)
{
    return 1.0317871458245943e+002
         + -1.7160798611000297e+002 * pow(concentration, 1)
         + 6.6093355571818370e+002  * pow(concentration, 2)
         + -1.3967634765604460e+003 * pow(concentration, 3)
         + 1.6206525901962004e+003  * pow(concentration, 4)
         + -1.0789220896320658e+003 * pow(concentration, 5)
         + 4.0376287338749660e+002  * pow(concentration, 6)
         + -7.6075909876774091e+001 * pow(concentration, 7)
         + 4.5862775715561739e+000  * pow(concentration, 8)
         + 2.5539208312724909e-001  * pow(concentration, 9);
}


