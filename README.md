PHP to ExtJS Types Builder
==========================

The ExtJS-Types-Builder is a OOP-PHP-Framework and creates JSON suitable strings for the communication
with your ExtJS-GUI. Due an fluent interface you can easily build and prepare the types.

Build a textfield
-----------------
<code>
<pre>
    $item = new ExtjsTypes_TextField('email', 'Ihre E-Mail:');

    $data = $item->setValue('meine-email@web.de')
                 ->setVtype(new ExtjsTypes_VTypes_Email())
                 ->prepare();

    print_r(json_encode($data));
</pre>
</code>

Output will be:
<code>
<pre>
{
  "xtype": "textfield",
  "name": "email",
  "fieldLabel": "Ihre E-Mail:",
  "allowBlank": false,
  "value": "meine-email@web.de",
  "vtype": "email"
}
</pre>
</code>

Build a combobox (selectbox)
----------------------------
<code>
<pre>
    $comboBox = new ExtJsTypes_ComboBox('My friends as combo-box');
    $comboBox->setDisplayField('name')
             ->setValueField('name-value')
             ->addData('freunde', 'Miki')
             ->addData('freunde', 'Joe')
             ->addData('freunde2', 'Miki')
             ->addData('freunde2', 'Joe');

    $data = $comboBox->prepare();

    print_r(json_encode($data));
</pre>
</code>

Output will be:
<code>
<pre>
{
  "xtype": "combo",
  "mode": "static",
  "editable": false,
  "triggerAction": "all",
  "fieldLabel": "My friends as combo-box",
  "displayField": "name",
  "valueField": "name-value",
  "store": [
    [
      "freunde",
      "Miki"
    ],
    [
      "freunde",
      "Joe"
    ],
    [
      "freunde2",
      "Miki"
    ],
    [
      "freunde2",
      "Joe"
    ]
  ]
}
</pre>
</code>

Build a form with textfield and combobox
----------------------------------------
<code>
<pre>
   $typeForm = new ExtJsTypes_Form(
    	'Node deatails',
    	'controller=extjstemplate&act=gettemplates'
    );

    $textFieldName = new ExtJsTypes_TextField('name', 'Ihr  Name');
    $textFieldEmail = new ExtJsTypes_TextField('email', 'Ihre  E-Mail');

    $comboBox = new ExtJsTypes_ComboBox('My friends as combo-box');
    $comboBox->setDisplayField('name')
             ->setValueField('name-value')
             ->addData('freunde', 'Miki')
             ->addData('freunde', 'Joe');

    $data = $typeForm->addItem($textFieldName)
                     ->addItem($textFieldEmail)
                     ->addItem($comboBox)
                     ->prepare();

    print_r(json_encode($data));

</pre>
</code>

Output will be:
<code>
<pre>
{
  "xtype": "form",
  "config": {
    "title": "Node deatails",
    "url": "controller=extjstemplate&act=gettemplates",
    "items": [
      {
        "xtype": "textfield",
        "name": "name",
        "fieldLabel": "Ihr  Name",
        "allowBlank": false
      },
      {
        "xtype": "textfield",
        "name": "email",
        "fieldLabel": "Ihre  E-Mail",
        "allowBlank": false
      },
      {
        "xtype": "combo",
        "mode": "static",
        "editable": false,
        "triggerAction": "all",
        "fieldLabel": "My friends as combo-box",
        "displayField": "name",
        "valueField": "name-value",
        "store": [
          [
            "freunde",
            "Miki"
          ],
          [
            "freunde",
            "Joe"
          ]
        ]
      }
    ]
  }
}
</pre>
</code>

Build a grid
------------
<code>
<pre>
    $fields = new ExtJsTypes_Fields();
    $fields->add('name')
           ->add('vorname')
           ->add('email');

    $columns = new ExtJsTypes_Columns();
    $columns->add('Name', 'name')
            ->add('Vorname', 'vorname')
            ->add('E-Mail', 'email', true);

    $data = new ExtJsTypes_Data();
    $data->put(array('name' => 'Miki',  'vorname' => 'Maus',    'email' => 'miki@maus.de'))
         ->put(array('name' => 'Olie',  'vorname' => 'Otto',    'email' => 'olie@maus.de'));

    $grid = new ExtJsTypes_Grid('My friends');
    $grid->setFields($fields)
         ->setColumns($columns)
         ->setData($data);

    $data = $grid->prepare();

   print_r(json_encode($data));
</pre>
</code>

Output will be:
<code>
<pre>
{
  "xtype": "gridpanel",
  "config": {
    "title": "My friends",
    "fields": [
      "name",
      "vorname",
      "email"
    ],
    "columns": [
      {
        "header": "Name",
        "dataIndex": "name",
        "flex": false
      },
      {
        "header": "Vorname",
        "dataIndex": "vorname",
        "flex": false
      },
      {
        "header": "E-Mail",
        "dataIndex": "email",
        "flex": true
      }
    ],
    "data": [
      {
        "name": "Miki",
        "vorname": "Maus",
        "email": "miki@maus.de"
      },
      {
        "name": "Olie",
        "vorname": "Otto",
        "email": "olie@maus.de"
      }
    ]
  }
}
</pre>
</code>

Build a grid with docked textfield
----------------------------------
<code>
<pre>
$fields = new ExtJsTypes_Fields();
    $fields->add('name')
           ->add('vorname');

    $columns = new ExtJsTypes_Columns();
    $columns->add('Name', 'name')
            ->add('Vorname', 'vorname', true);

    $data = new ExtJsTypes_Data();
    $data->put(array('name' => 'Miki',  'vorname' => 'Maus'))
         ->put(array('name' => 'Olie',  'vorname' => 'Otto'));

    $grid = new ExtJsTypes_Grid('My friends');
    $grid->setFields($fields)
         ->setColumns($columns)
         ->setData($data)
          ->dockItem(
            new ExtJsTypes_ItemsDocker(
              new ExtJsTypes_Textfield('new-scale', 'Add Scale')
            )
          );

    $data = $grid->prepare();

    print_r(json_encode($data));
</pre>
</code>

Output will be:
<code>
<pre>
{
  "xtype": "gridpanel",
  "config": {
    "title": "My friends",
    "fields": [
      "name",
      "vorname"
    ],
    "columns": [
      {
        "header": "Name",
        "dataIndex": "name",
        "flex": false
      },
      {
        "header": "Vorname",
        "dataIndex": "vorname",
        "flex": true
      }
    ],
    "data": [
      {
        "name": "Miki",
        "vorname": "Maus"
      },
      {
        "name": "Olie",
        "vorname": "Otto"
      }
    ],
    "dockeditems": [
      {
        "xtype": "textfield",
        "buttonLabel": "Add Scale"
      }
    ]
  }
}
</pre>
</code>
