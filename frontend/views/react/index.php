<h1>react javascript library</h1>
<div id="container"></div>
<?php
//需要重写registerBabel,改成<script type="text/babel">
// $this->beginBlock('js');

?>


<?php 
// $this->endBlock();
// $this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>

<?php $this->beginBlock('babel'); ?>
	<script type="text/babel">
      var Counter = React.createClass({
        getInitialState: function () {
          return { count: 0 };
        },
        handleClick: function () {
          this.setState({
            count: this.state.count + 1,
          });
        },
        render: function () {
          return (
            <button onClick={this.handleClick} className="btn btn-primary">
              Click me! Number of clicks: {this.state.count}
            </button>
          );
        }
      });
      ReactDOM.render(
        <Counter />,
        document.getElementById('container')
      );
    </script>
<?php $this->endBlock(); ?>