<h1>vue 2 http vue-resourc library</h1>
<button class="btn uk-button-primary" @click="fetchData">获取数据</button>
<div class="uk-grid">
	<div class="uk-width-1-3">
		<h1>豆瓣电影排行榜</h1>
		{{count}}
		{{message}}
		<div v-for="article in datas" class="uk-article">
        	{{article.title}}
        	<img :src="article.images.small" />
      	</div>
	</div>
</div>
<?php
$js = <<< JS
	var apiURL = 'https://api.douban.com/v2/movie/top250?count=10';
	var vm = new Vue({
		el: '#app',
		data : {
			datas: [],
			count: 0,
			message: 'message'
		},
		// created: function() {
		// 	this.fetchData()
		// },
		methods: {
			fetchData: function() {
				var vm = this
			    $.ajax({
					url: 'https://api.douban.com/v2/movie/top250?count=10',
					type: 'get',
					dataType: 'jsonp',
					success: function(data){
						vm.count = 11
						vm.message = 'liner.xie'
						vm.datas = data.subjects
					},
					complete: function(res) {
						console.log(res);
					},
					error: function(res) {
						console.log(res);
					}
				});
			}
		}
	});
JS;
$this->registerJs($js);

?>