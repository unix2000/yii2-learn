<?php
use kartik\tree\TreeView;
use frontend\models\Tree;
echo TreeView::widget([
    // single query fetch to render the tree
    'query'             => Tree::find()->addOrderBy('root, lft'),
    'headingOptions'    => ['label' => 'Categories'],
    'isAdmin'           => false,                       // optional (toggle to enable admin mode)
    'displayValue'      => 1,                           // initial display value
    //'softDelete'      => true,                        // normally not needed to change
    //'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
]);

// use kartik\tree\TreeViewInput;
// use frontend\models\Tree;
// echo TreeViewInput::widget([
//     // single query fetch to render the tree
//     'query'             => Tree::find()->addOrderBy('root, lft'),
//     'headingOptions'    => ['label' => 'Categories'],
//     'name'              => 'kv-product',    // input name
//     'value'             => '1,2,3',         // values selected (comma separated for multiple select)
//     'asDropdown'        => true,            // will render the tree input widget as a dropdown.
//     'multiple'          => true,            // set to false if you do not need multiple selection
//     'fontAwesome'       => true,            // render font awesome icons
//     'rootOptions'       => [
//         'label' => '<i class="fa fa-tree"></i>',
//         'class'=>'text-success'
//     ],                                      // custom root label
//     //'options'         => ['disabled' => true],
// ]);