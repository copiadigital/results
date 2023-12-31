# How to use

1. ### Initialize field by using wp-cli

   _Run from your local machine, in a new terminal tab_
   ```sh
   wp results results_init
   ```

---
2. ### Enabling results in page builder

  To enable results builder layout, go to `Builder.php` under to your sage theme. Search Results and uncomment it.
  
  _Uncomment this line of code:_
  ```sh
  // ->addLayout($this->get(Results::class), [
  //     'label' => 'Results',
  //     'display' => 'block',
  // ])
  ```

---
3. ### Enabling results in views template

  To enable results in views template, go to `resources/views/partials/builder` directory & edit `layout_container.blade.php`.
  
  _replace this line of code:_
  ```sh
  @includeFirst([
    'partials.builder.' . $build['acf_fc_layout'],
  ], $build)
  ```

  _with this line of code:_
  ```sh
  @includeFirst([
    'partials.builder.' . $build['acf_fc_layout'],
    'Results::partials.builder.' . $build['acf_fc_layout']
  ], $build)
  ```

---
4. ### Overriding templates by using wp-cli
   
  Before proceeding with this step it is important to note there are two options to choose from. It will import the template to the sage theme.
   * Option 1: Use `wp results results_default` or `php wp-cli.phar results results_default --allow-root` to import the template without type.
   * Option 2: Use `wp results results_with_type` or `php wp-cli.phar results results_with_type --allow-root` to import the template with type.

   #### Option 1:

   _Run from your local machine, in a new terminal tab_
   ```sh
   wp results results_default
   ```

   #### Option 2:

   _Run from your local machine, in a new terminal tab_
   ```sh
   wp results results_with_type
   ```

---
5. ### Altering taxonomies

  We can use `results_tax_before_insert` hook in the filter.php to alter taxonomy. For example we want to remove taxonomy type

   _For removing type taxonomy. Paste this inside the filter.php_
   ```sh
    add_filter( 'results_tax_before_insert', function ( $types ) {
      unset($types[1]);
      return $types;
    });
   ```

