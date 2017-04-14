# nette-databaseLayer
Database layer for easy work with data

## How its work?
You create class manager with extends of BaseManager and then you only add database depency.
For example i have in database table Devices where i save devices whitch connect to my app. (you can see example in testManager.php)

#### Debug code:
```php
$AM = (new ApiManager($this->database)); (testManager)
$data = $AM->loadDevices(); (load function)

Dumper::dump($data);
Dumper::dump($data->getName());
Dumper::dump($data->getRows());
Dumper::dump($data->getRow(1)->get('data'));
Dumper::dump($data->getRow(1)->data);
```

#### What you will see?
##### $data
![alt text](http://image.prntscr.com/image/afd6497daf0c4cf79593e8e94f5e75be.png "debug $data")
##### $data->getRows()
![alt text](http://image.prntscr.com/image/d090533a5e774c489575ca10cbfefce5.png "debug $data")
##### $data->getRow(1)->get('data')
![alt text](http://image.prntscr.com/image/aeb81b8fe11343258667017033f7a91c.png "debug $data")
##### $data->getRow(1)->data
![alt text](http://image.prntscr.com/image/5b0b176ce54449ec88f6330c7ed029a3.png "debug $data")
