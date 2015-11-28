# Fast Templater
Fast php template class

# 1 Метод
<hr>
<b>Содержимое файла index.php :</b>
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

<b>Содержимое файла /templates/index.tpl :</b>
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

<b>Браузер</b>
<p>Test-output</p>
<p>Test-output2</p>
<p>Test-output3</p>

# 2 Метод
<hr>
<b>Содержимое файла index.php :</b>
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

<b>Содержимое файла /templates/index.tpl :</b>
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

<b>Браузер</b>
<p>Я админ</p>
<p>Test-output</p>
<p>Test-output2</p>
<p>Test-output3</p>

# 3 Метод
<hr>
<b>Содержимое файла index.php :</b>
```php

// Обратите внимание что переменная равна true
$admin = true;

// Инклудим класс шаблонизатора
include __DIR__ .'/Templater.php';

// Обьявляем класс
$tpl = new Templater('/templates/', '.tpl');

// Компилируем шаблон page
$tpl->set("page", array(
  '{test}' => 'Скомпилирована',
), false, 'page');

// Компилируем и выводим в браузер
echo $tpl->set("index", array(
  '{test-output}' => 'Test-output',
  '{test-output2}' => 'Test-output2',
  '{test-output3}' => 'Test-output3',
  '{page}' => $tpl->get['page'] // Ранее скомпилированный шаблон page
), array(
    'admin' => $admin //  [admin]Я админ[/admin]
));
```

<b>Содержимое файла /templates/page.tpl :</b>
```html
Подстраница {test}
```

<b>Содержимое файла /templates/index.tpl :</b>
```html
<DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
 </head>
 <body>
   <p>{page}</p>
   [admin]<p>Я админ</p>[/admin]
   <p>{test-output}</p>
   <p>{test-output2}</p>
   <p>{test-output3}</p>
 </body>
</html>
```

<b>Браузер</b>
<p>Подстраница Скомпилирована</p>
<p>Я админ</p>
<p>Test-output</p>
<p>Test-output2</p>
<p>Test-output3</p>
