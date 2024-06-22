#include "Ldr.h"


double LinearizeInternalADCOutputVoltage(double internalADCOutputVoltage)
{
    return 1.9797073746014478e-002 + 
           1.8393528260227294e+000 * internalADCOutputVoltage - 
           7.2180498969680524e+000 * pow(internalADCOutputVoltage, 2) + 
           1.1750987376966094e+001 * pow(internalADCOutputVoltage, 3) + 
           2.4374805177828307e-001 * pow(internalADCOutputVoltage, 4) - 
           3.1448747433061925e+001 * pow(internalADCOutputVoltage, 5) + 
           5.3281605264179291e+001 * pow(internalADCOutputVoltage, 6) - 
           4.4089414888134570e+001 * pow(internalADCOutputVoltage, 7) + 
           1.9828416412589252e+001 * pow(internalADCOutputVoltage, 8) - 
           3.9460944648654399e+000 * pow(internalADCOutputVoltage, 9) - 
           3.9902835044845286e-001 * pow(internalADCOutputVoltage, 10) + 
           3.8743552873596565e-001 * pow(internalADCOutputVoltage, 11) - 
           7.7685104905477045e-002 * pow(internalADCOutputVoltage, 12) + 
           5.4799068241376927e-003 * pow(internalADCOutputVoltage, 13);
}
