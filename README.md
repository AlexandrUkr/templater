# Fast Templater
Fast php template class

Example of use:

```php
// declare class
$tpl = new Templater;

// Directory template
$tpl->dir = '/template/';

// Add template
$tpl->set("index", [
  '{test-output}' => 'Test-output',
  '{test-output2}' => 'Test-output2',
  '{test-output3}' => 'Test-output3',
], 'main');

// Output pattern
$tpl->get['main'];
```
