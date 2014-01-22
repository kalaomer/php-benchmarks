# Judy Array vs Array
Judy array ile array arasındaki Memory kullanım farkını gösteren test.

## Testi Çalıştırma
Testi terminal üzerinden veya browser üstünden çalıştırabilirsiniz.

## Teste argüman yollama
Teste terminal üstünden argüman yollanabilmektedir.

```php judy-vs-array.php iterator data judy-type```

* ```iterator```: Kaç adet ```data``` ekleneceğini belirler. Standart değeri: ```100000```
* ```data```: İşleme alınamsı istenen ```data```. İstenen tür yollanabilir. Standart değeri: ```rand()*rand()```
* ```judy-type```: Judy Array'ın tipi. Standart değeri: ```INT_TO_INT```

Örnek: ```data```'ı array olarak yollamak
```
php judy-vs-array.php 100000 "[1,2,3]" INT_TO_MIXED
```

Çıktısı:
```
==================

>Options

Iterations: 100000
Data: array (
  0 => 1,
  1 => 2,
  2 => 3,
)
Judy Type: INT_TO_MIXED

==================

>Judy

Time to fill: 0.041723966599.
Time to check: 0.029554843903.
Memory: 841464


==================

>Array

Time to fill: 0.035956144333.
Time to check: 0.028581857681.
Memory: 9848976
```