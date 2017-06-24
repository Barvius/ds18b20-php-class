# ds18b20-php-class
php class from reading ds18b20 sensors from RPI/BPI/OPI__
Example
``` php
$ds = new DS18B20;

for ($i=0; $i < count($ds->Ids); $i++) {
  echo $ds->GetData($ds->Ids[$i])." || ";
  echo $ds->Ids[$i];
}
```
