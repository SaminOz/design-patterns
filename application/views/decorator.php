<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Design Patterns</title>

  <style type="text/css">

  ::selection{ background-color: #E13300; color: white; }
  ::moz-selection{ background-color: #E13300; color: white; }
  ::webkit-selection{ background-color: #E13300; color: white; }

  body {
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }

  a {
    color: #003399;
    background-color: transparent;
    font-weight: normal;
  }

  h1 {
    color: #444;
    background-color: transparent;
    border-bottom: 1px solid #D0D0D0;
    font-size: 19px;
    font-weight: normal;
    margin: 0 0 14px 0;
    padding: 14px 15px 10px 15px;
  }

  code {
    font-family: Consolas, Monaco, Courier New, Courier, monospace;
    font-size: 12px;
    background-color: #f9f9f9;
    border: 1px solid #D0D0D0;
    color: #002166;
    display: block;
    margin: 14px 0 14px 0;
    padding: 12px 10px 12px 10px;
  }

  #body{
    margin: 0 15px 0 15px;
  }
  
  p.footer{
    text-align: right;
    font-size: 11px;
    border-top: 1px solid #D0D0D0;
    line-height: 32px;
    padding: 0 10px 0 10px;
    margin: 20px 0 0 0;
  }
  
  #container{
    margin: 10px;
    border: 1px solid #D0D0D0;
    -webkit-box-shadow: 0 0 8px #D0D0D0;
  }

  .current {
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }
  </style>
</head>
<body>

<div id="container">
  <h1>Design Patterns! 
    <span class="current">
      Current topic and design pattern is: <i><b>Decorator Pattern</b></i>. 
    </span>
  </h1>

  <div id="body">
    <p>Primary PHP Input (choose from <i>Espresso, House Blend, Dark Roast or Decaf</i>):</p>
    <p>
      <?=form_open('decorator')?>
      <?=form_input('data', '', 'autocomplete="off"')?>
      <?=form_submit('submit' ,'submit')?>
      <?=form_close()?>
    </p>
    <p>Primary PHP Output:</p>
    <code>
      <?=var_dump($php_output['beverage'])?>
    </code>

    <p>Secondary PHP Output:</p>
    <code>
      <?=$php_output['beverage']->getDescription()?>
      <?=$php_output['beverage']->cost()?>
    </code>

    <p>JavaScript Output:</p>
    <div>
      <script>
      <?=$js_output?>
      </script>

    </div>
    <div id="hidden">

    </div>
  </div>

  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>