# Fast Templater
Fast php template class

# 1 Метод

Содержимое файла index.php :
```php

// Инклудим класс шаблонизатора
include __DIR__ .'/Templater.php';

// Обьявляем класс
$tpl = new Templater('/templates/', '.tpl');

// Компилируем и выводим в браузер
echo $tpl->set("index", array(
  '{test-output}' => 'Test-output',
  '{test-output2}' => 'Test-output2',
  '{test-output3}' => 'Test-output3',
));
```

Содержимое файла /templates/index.tpl :
```html
<DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
 </head>
 <body>
   <p>{test-output}</p>
   <p>{test-output2}</p>
   <p>{test-output3}</p>
 </body>
</html>
```

# Браузер
<p>Test-output</p>
<p>Test-output2</p>
<p>Test-output3</p>

# 2 Метод

Содержимое файла index.php :
```php

// Обратите внимание что переменная равна true
$admin = true;

// Инклудим класс шаблонизатора
include __DIR__ .'/Templater.php';

// Обьявляем класс
$tpl = new Templater('/templates/', '.tpl');

// Компилируем и выводим в браузер
echo $tpl->set("index", array(
  '{test-output}' => 'Test-output',
  '{test-output2}' => 'Test-output2',
  '{test-output3}' => 'Test-output3',
), array(
    'admin' => $admin //  [admin]Я админ[/admin]
));
```

Содержимое файла /templates/index.tpl :
```html
<DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
 </head>
 <body>
   [admin]<p>Я админ</p>[/admin]
   <p>{test-output}</p>
   <p>{test-output2}</p>
   <p>{test-output3}</p>
 </body>
</html>
```

# Браузер
<p>Я админ</p>
<p>Test-output</p>
<p>Test-output2</p>
<p>Test-output3</p>
