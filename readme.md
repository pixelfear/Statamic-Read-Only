# Read-only Fieldtype
A fieldtype for Statamic.

This fieldtype could be useful for any entries that are generated outside of the control panel, and you'd like to give your clients an easy way to view them inside the control panel.

## Usage
* Drop `_add-ons/readonly` to  your `_add-ons` directory.
* Configure your fieldset.

### Simple text

    fields:
      my_field:
        type: readonly

### Simple array
When your data is formatted as a simple array, like Bison saves `customer_data` fields:

    custom_data:
      phone: bar
      newsletter: yes

Set your field up like so:

    fields:
      my_field:
        type: readonly
        fields:
          phone: Phone Number
          newsletter: Signed up for newsletter

`fields` will allow you define specific row headers, if the defaults aren't to your liking.


### Grid / multidimensional array
When your data is formatted in a multidimensional array, like Grid saves its data, or how Bison saves `items` in order details:

    my_field:
      -
        title: Thing one
        url: /thing-one
        id: 3424112415432
        foo: bar
      -
        title: Another thing
        url: /another-thing
        id: 65466244
        foo: baz

Set your field up like so:

    fields:
      my_field:
        type: readonly
        fields:
          url: URL
        exclude: [id, foo]

All fields will be displayed by default. `exclude` will allow you to remove fields from the table.  
The `fields` option is also available here.