<img class="wireframe" src="/assets/images/wireframe/media-paragraph.png">
<img class="wireframe" src="/assets/images/wireframe/paragraph.png">
<img class="wireframe" src="/assets/images/wireframe/paragraph.png">
<img class="wireframe" src="/assets/images/wireframe/paragraph.png">
<img class="wireframe" src="/assets/images/wireframe/paragraph.png">
<img class="wireframe" src="/assets/images/wireframe/paragraph.png">
<img class="wireframe" src="/assets/images/wireframe/paragraph.png">

<?php
$css = <<< CSS
	body {
		background-color: #FFFFFF;
	}
	.ui.menu .item img.logo {
		margin-right: 1.5em;
	}
	.main.container {
		margin-top: 7em;
	}
	.wireframe {
		margin-top: 2em;
	}
	.ui.footer.segment {
		margin: 5em 0em 0em;
		padding: 5em 0em;
	}
CSS;
$this->registerCss($css);