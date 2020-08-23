@extends('layouts.app')

@section('page')
<ul>
	<?php foreach ($products as $product) { ?>
		<li><?= $product['name'] ?></li>
	<?php } ?>
</ul>
@endsection

