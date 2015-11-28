# Fast Templater
Быстрый легкий, шаблонизатор

<h3>Конструктор:</h3>
<p>1 Аргумент: Дериктория шаблона <b>(Необязательный)</b></p>
<p>2 Аргумент: расширение файлов шаблона <b>(необязательный)</b></p>
<h3>Метод compile:</h3>
<p>1 Аргумент: ссылка на файл шаблона без дериктории шаблона и расширения файла если оно присвено ранее</p>
<p>2 Аргумент: Массив с данными где key будет заменен на value</p>
<p>3 Аргумент: Массив с Блоками <b>[admin]Я админ[/admin]</b> где key это идентификатор блока а value это определение показывать содержимое блока или нет <b>(По умолчанию false)</b></p>
<p>4 Аргумент: ключ массива с данными шаблона <b>(По умолчанию main)</b></p>
<p>5 Аргумент: не читать файл повторно если он был прочитан ранее</p>


# 1 Пример
<b>Содержимое файла index.php :</b>
```php

// Инклудим класс шаблонизатора
include __DIR__ .'/Templater.php';

// Обьявляем класс
$tpl = new Templater('/templates/', '.tpl');

// Компилируем и выводим в браузер
echo $tpl->compile("index", array(
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

# 2 Пример
<b>Содержимое файла index.php :</b>
```php

// Обратите внимание что переменная равна true
$admin = true;

// Инклудим класс шаблонизатора
include __DIR__ .'/Templater.php';

// Обьявляем класс
$tpl = new Templater('/templates/', '.tpl');

// Компилируем и выводим в браузер
echo $tpl->compile("index", array(
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

# 3 Пример
<b>Содержимое файла index.php :</b>
```php

// Обратите внимание что переменная равна true
$admin = true;

// Инклудим класс шаблонизатора
include __DIR__ .'/Templater.php';

// Обьявляем класс
$tpl = new Templater('/templates/', '.tpl');

// Компилируем шаблон page
$tpl->compile("page", array(
  '{test}' => 'Скомпилирована',
), false, 'page');

// Компилируем и выводим в браузер
echo $tpl->compile("index", array(
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
